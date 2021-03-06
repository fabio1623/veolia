<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contributor;
use App\Subsidiary;
use App\Zone;
use App\Country;
use App\Funding;
use App\ContributorReference;

use Auth;

class ContributorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // If user logged
        if(Auth::user())
        {
          $this->middleware('profile:'.Auth::user()->profile_id);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subsidiary_id, $zone_id)
    {
        $contributors = Contributor::orderBy('name', 'asc')->paginate(100);
        $view = view('contributors.index', ['subsidiary_id'=>$subsidiary_id, 'contributors'=>$contributors]);
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subsidiary_id, $zone_id)
    {
        // $subsidiary = Subsidiary::find($subsidiary_id);

        $view = view('contributors.create', ['subsidiary_id'=>$subsidiary_id, 'zone_id'=>$zone_id]);
        return $view;
    }

    public function custom_create($subsidiary_id)
    {
        $view = view('contributors.custom_create', ['subsidiary_id'=>$subsidiary_id]);
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $subsidiary_id, $zone_id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:contributors',
        ]);

        $new_manager = new Contributor;
        $new_manager->name = $request->name;
        $new_manager->profile = 'In-house';

        $new_manager->save();

        $zone = Zone::find($zone_id);
        $zone->manager = $new_manager->id;

        $zone->save();

        return redirect()->action('ZoneController@edit', [$subsidiary_id, $zone_id]);
    }

    public function custom_store(Request $request, $subsidiary_id, $zone_id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:contributors',
        ]);

        $new_manager = new Contributor;
        $new_manager->name = $request->name;
        $new_manager->profile = 'In-house';

        $new_manager->save();

        return redirect()->action('ContributorController@index', [$subsidiary_id, $zone_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($subsidiary_id, $zone_id, $contributor_id)
    {
        $contributor = Contributor::find($contributor_id);
        $references = $contributor->references()->get();

        $contributor_reference_join = ContributorReference::where('contributor_id', $contributor_id)->get();

        $zones = Zone::where('manager', $contributor_id)->get();

        return view('contributors.edit', ['contributor'=>$contributor, 'contributor_reference_join'=>$contributor_reference_join, 'references'=>$references, 'subsidiary_id'=>$subsidiary_id, 'zone_id'=>$zone_id, 'zones'=>$zones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subsidiary_id, $zone_id, $contributor_id)
    {
        // dd($_POST);
        $this->validate($request, [
            'name' => 'required|max:255|unique:contributors,name,'.$contributor_id,
        ]);

        $contributor = Contributor::find($contributor_id);
        $contributor->name = $request->name;
        $contributor->save();

        return redirect()->action('ContributorController@edit', [$subsidiary_id, $zone_id, $contributor_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subsidiary_id, $zone_id, $contributor_id)
    {
        // dd($_POST);
        $contributor = Contributor::find($contributor_id);
        $zones = Zone::where('manager', $contributor_id)->get();

        foreach ($zones as $zone) {
            $zone->manager = null;
            $zone->save();
        }

        foreach ($contributor->references as $reference) {
            $reference->contributors()->detach($contributor_id);
        }

        Contributor::destroy($contributor_id);

        return redirect()->action('ContributorController@index', [$subsidiary_id, $zone_id]);
    }

    public function destroy_contributor($id)
    {
      $contributor = Contributor::find($id);

      if (count($contributor->zones) > 0) {
        foreach ($contributor->zones as $zone) {
          $zone->manager()->dissociate();
          $zone->save();
        }
      }
      $contributor->references()->detach();

      Contributor::destroy($id);
    }

    public function destroyMultiple(Request $request, $subsidiary_id, $zone_id)
    {
        // dd($_POST);

        foreach ($request->ids as $id) {
            $zones = Zone::where('manager', $id)->get();
            foreach ($zones as $zone) {
                $zone->manager = null;
                $zone->save();
            }
        }

        Contributor::destroy($id);

        return redirect()->action('ContributorController@index', [$subsidiary_id, $zone_id]);
    }

    public function destroy_unsigned()
    {
      $unsigned_contr = Contributor::has('references', '<', 1)->orWhere('name', '')->get();

      if ($unsigned_contr->count() > 0) {
        foreach ($unsigned_contr as $contr) {
          ContributorController::destroy_contributor($contr->id);
        }
        return redirect()->action('ReferenceController@management_page')->with('status', 'Unsigned contributors removed!');
      }
      else {
        return redirect()->action('ReferenceController@management_page')->with('caution', 'Nothing to remove..');
      }
    }

    public function trim()
    {
      $contributors = Contributor::all();
      foreach ($contributors as $cont) {
        $cont->name = trim($cont->name, ' <>');
        $cont->save();
      }
      $responsabilities = ContributorReference::all();
      foreach ($responsabilities as $resp) {
        $resp->responsability_on_project = trim($resp->responsability_on_project, ' <>');
        $resp->responsability_on_project_fr = trim($resp->responsability_on_project_fr, ' <>');
        $resp->save();
      }
      $zones = Zone::all();
      foreach ($zones as $zone) {
        $zone->name = trim($zone->name, ' <>');
        $zone->save();
      }
      $countries = Country::all();
      foreach ($countries as $country) {
        $country->name = trim($country->name, ' <>');
        $country->save();
      }
      $fundings = Funding::all();
      foreach ($fundings as $funding) {
        $funding->name = trim($funding->name, ' <>');
        $funding->name_fr = trim($funding->name_fr, ' <>');
        $funding->save();
      }

      return redirect()->action('ReferenceController@management_page')->with('status', 'Objects trimed!');
    }
}
