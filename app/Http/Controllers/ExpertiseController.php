<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Expertise;
use App\Domain;
use App\Reference;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expertises = Expertise::paginate(2);
        // $domains->setPath('index');
        $view = view('expertises.index')->with('expertises', $expertises);
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($_POST);
        $domain = Domain::find($request->input('domain_id'));

        $view = view('expertises.create')->with('domain', $domain);
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($_POST);
        $this->validate($request, [
            'name'     => 'required|string|max:255|unique:expertises,name,NULL,id,domain_id,'.$request->domain_id,
        ]);

        $new_expertise = new Expertise;
        $new_expertise->name = $request->name;
        $new_expertise->domain_id = $request->domain_id;

        $new_expertise->save();

        // $expertise_in_db = Expertise::where('name', $request->name)->first();
        // $domain = Domain::find($request->domain_id);

        // if ($expertise_in_db) {
        //     // dd('Present');
        //     $expertise_in_db->domain_id = $domain->id;

        //     $expertise_in_db->save();
        //     // $domain->expertises()->attach($expertise_in_db->id);
        // }
        // else {
        //     dd('Non present');
        //     $expertise = new expertise;
        //     $expertise->name = $request->input('name');

        //     $expertise->save();    
        //     $domain->expertises()->attach($expertise->id);
        // }

        return redirect()->action('DomainController@edit', $request->domain_id);
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
    public function edit($domain_id, $expertise_id)
    {
        $expertise = Expertise::find($expertise_id);
        $domain = Domain::find($domain_id);

        // $view = view('expertises.edit', ['expertise'=>$expertise, 'domain'=>$domain]);
        $view = view('expertises.edit', ['domain'=>$domain, 'expertise'=>$expertise]);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $domain_id, $expertise_id)
    {
        $expertise = Expertise::find($expertise_id);
        $expertise->name = $request->input('name');

        $expertise->save();

        return redirect()->action('DomainController@edit', $domain_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $domain_id)
    {
        dd($_POST);
        $ids = $request->input('id');

        foreach ($ids as $id) {
            $expertise = Expertise::where('id',$id)->first();
            $expertise->domains()->detach();
        }

        Expertise::destroy($ids);

        return redirect()->action('DomainController@edit', $domain_id);
    }

    public function destroyOne(Request $request)
    {
        $references = Reference::whereHas('expertises', function ($query) use ($request) {
            $query->where('domain_id', $request->domain_id);
        })->get();

        foreach ($references as $reference) {
            $reference->expertises()->detach($request->expertise_id);
        }

        Expertise::destroy($request->expertise_id);

        return redirect()->action('DomainController@edit', $request->domain_id);
    }
}
