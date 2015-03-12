<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use \App\User;
use View;
use Hash;
use Input;
use Redirect;
use Validator;
use Log;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfilesController extends Controller {

	

	/**
	 * Display the specified resource.
	 *
	 * @param  $username
	 * @return Response
	 */
	public function show($username)
	{
		try
		{
			$user = User::whereUsername($username)->firstOrFail();
		}
		catch(ModelNotFoundException $e)
		{
			//return Redirect::to('/users/')->withErrors('No user registered under the name: ' . $username);
			// Log 404 error with requested URL. URL is /{$username}
			Log::warning('404 caught in ProfilesController.', ['context' => 'Requested username,URL: /' . $username]);	
			abort(404);
			//Session::flash('message', 'No user registered under the name: ' . $username); 
			//Session::flash('alert-class', 'alert-danger'); 
		}
		
		return View::make('profiles.show');
	}

	

}
