<?php namespace App\Http\Controllers;
use \App\User;
use Auth;
use Session;


class PagesController extends Controller {
	
	public function home()
	{
		$name = 'You';

		return view('index')->with('name', $name);
	}

	public function about()
	{
		if (!Auth::user()->hasRole('owner'))
		{
			Session::flash('message', 'Your account does not have permission to view that page. If you believe this is a mistake please contact support immediately.'); 
			Session::flash('alert-class', 'alert-danger'); 
        	return redirect('/');
		}
		
		return view('about');
	}

	public function error()
	{
		abort(404);
	}

	public function admin()
	{
		return view('admin');
	}
}