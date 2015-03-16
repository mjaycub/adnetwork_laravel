<?php namespace App\Http\Controllers;
use \App\User;
use View;
use Auth;
use Hash;
use Input;
use Redirect;
use Validator;
use Session;

class SessionsController extends Controller{
	
	public function create()
	{
		if(Auth::check())
		{
			return Redirect::to('/admin');
		}
		return View::make('sessions.create');
	}

	public function store()
	{
		$rules = array(
			'email' => 'required|email',
			'password' => 'required|alphanum'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('/login')
				->withErrors($validator)
				->withInput();
		}
		else
		{
			if(Auth::attempt(Input::only('email', 'password')))
			{
				return Redirect::to('/admin');
			}
			Session::flash('message', 'Incorrect username/password combination. Please try again.'); 
			Session::flash('alert-class', 'alert-danger'); 
			return Redirect::back()->withInput();
		}

		
	}

	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/login');
	}
}