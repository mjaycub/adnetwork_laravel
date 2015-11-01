<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Profile;
use Session;
use \App\User;
use View;
use Hash;
use Input;
use Redirect;
use Validator;
use Log;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfilesController extends Controller {

	

	/**
	 * Display the specified resource.
	 *
	 * @param  $username
	 * @return Response
	 */
	
	/* public function show($username)
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
			//abort(404);
			return Redirect::to('/404');
			//Session::flash('message', 'No user registered under the name: ' . $username); 
			//Session::flash('alert-class', 'alert-danger'); 
		}
		
		return View::make('profiles.show');
	} */

	public function edit($username)
	{
		$user = User::whereUsername($username)->firstOrFail();

		if(Auth::user()->id == $user->id)
		{
			return View::make('profiles.edit')->withUser($user);
		}
		else
		{
			Session::flash('message', 'You may only edit your own profile silly.'); 
			Session::flash('alert-class', 'alert-warning'); 

		return Redirect::back();
		}

	}

	public function ad_edit($brand)
	{
		//user::whereBRAND($brand)->firstOrFail();
		
		//$user = User::whereUsername($username)->firstOrFail();
		$user = User::whereCompany($brand)->firstOrFail();

		if(Auth::user()->id == $user->id)
		{
			return View::make('profiles.edit')->withUser($user);
		}
		else
		{
			Session::flash('message', 'You may only edit your own profile silly.'); 
			Session::flash('alert-class', 'alert-warning'); 

		return Redirect::back();
		}

	}

	public function update($username)
	{
		$user = User::whereUsername($username)->firstOrFail();

		if(!Auth::user()->id == $user->id)
		{
			Session::flash('message', 'You may only edit your own profile silly.'); 
			Session::flash('alert-class', 'alert-warning'); 

			return Redirect::back();
		}

		if (Input::has('fname'))
		{
			$fnameIn = Input::get('fname');
		    $user->fname = $fnameIn;
		}
		if (Input::has('lname'))
		{
			$lnameIn = Input::get('lname');
		    $user->lname = $lnameIn;
		}

		
		$input = Input::only('bio', 'location', 'youtube_username', 'twitter_username', 'instagram_username', 'facebook_page_name', 'vine_username');

		Session::flash('message', 'Your profile has been updated! '); 
		Session::flash('alert-class', 'alert-info'); 

		if (count($user->profile))
		{   
		    $user->profile->fill($input)->save();
		}
		else
		{
		    $profile = Profile::create($input);

		    $user->profile()->save($profile);
		}

		return redirect()->back();
	}

	

}
