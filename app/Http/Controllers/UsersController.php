<?php namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use \App\User;
use \App\Role as Role;
use \App\Profile;
use View;
use Hash;
use Input;
use Redirect;
use Validator;
use Log;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsersController extends Controller {

	
	public function index()
	{
		if (!Auth::check())
		{
			Session::flash('message', 'You need to log-in to view the User page.'); 
			Session::flash('alert-class', 'alert-danger'); 
        	return redirect('/login');
		}

		$users = User::all();

		return View::make('users/index')->withUsers($users);
	}

	/*public function show($username)
	{
		$user = User::whereUsername($username)->first();

		return View::make('users/show', ['user' => $user]);
	} */

	public function create()
	{
		return View::make('users.create');
	}

	public function store()
	{		
	
		if(! User::isValid(Input::all()))
		{
			Session::flash('message', 'There were problems with your inputs. Please correct and re-submit.'); 
			Session::flash('alert-class', 'alert-danger'); 
			return Redirect::back()->withInput()->withErrors(User::$errors);
			#return Redirect::back()->withInput();
		}

		$user = new User;
		$user->fname = Input::get('fname');
		$user->lname = Input::get('lname');
		$user->email = Input::get('email');
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->save();

		$profileInfo = ['user_id' => '$user->id', 'bio' => ''];
		$user->profile()->save(new Profile($profileInfo));

		$user->assignRole(1); // assigned member role by default

		$user->save();

		

		return Redirect::route('users.index');
		
	}

	public function show($username)
	{
		//taken from ProfilesController, which is now retired
		try
		{
			$user = User::whereUsername($username)->firstOrFail();
		}
		catch(ModelNotFoundException $e)
		{
			//return Redirect::to('/users/')->withErrors('No user registered under the name: ' . $username);
			// Log 404 error with requested URL. URL is /{$username}
			Log::warning('404 caught in UsersController.', ['context' => 'Requested username,URL: /users/' . $username]);	
			//abort(404);
			return Redirect::to('/404');
			//Session::flash('message', 'No user registered under the name: ' . $username); 
			//Session::flash('alert-class', 'alert-danger'); 
		}
		
		return View::make('profiles.show')->withUser($user);
	}

}
