<?php namespace App\Http\Controllers;
use \App\User;
use View;
use Auth;
use Hash;
use Input;
use Redirect;
use Validator;

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
		if(Auth::attempt(Input::only('email', 'password')))
		{
			return Redirect::to('/admin');
		}

		return Redirect::back()->withInput();
	}

	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/login');
	}
}