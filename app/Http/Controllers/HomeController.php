<?php 

namespace App\Http\Controllers;

use App\User;
Use Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		switch (Auth::user()->profile) {
			case 1:
				$view = view('home');
				break;

			case 2:
				$users = User::all();
        		$view = view('auth.index')->with('users', $users);
				break;

			case 3:
				$users = User::all();
        		$view = view('auth.index')->with('users', $users);
				break;

			default:
				# code...
				break;
		}
		return $view;
	}

}