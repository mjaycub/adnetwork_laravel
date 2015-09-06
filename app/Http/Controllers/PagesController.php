<?php namespace App\Http\Controllers;
use \App\User;
use Auth;
use Session;
use DB;
use View;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Log;
use Redirect;

class PagesController extends Controller {
	
	public function home()
	{
		$name = 'You';

		return view('index')->with('name', $name);
	}

	public function about()
	{
		return view('about');
	}

	public function dashboard()
	{
		if (!Auth::user()->hasRole('creator'))
		{
			if(Auth::user()->hasRole('advertiser'))
			{
				# RE-DIRECTING - If advertisers go to /dashboard/ this could also be a logged error instead of re-direct.
				# Advertiser users should NOT be following any links to /dashboard/ but instead /addash/ (or relevant URL)
				Session::flash('message', 'You were redirected to the advertiser dashboard, which is located at bluence.com/addash. If this is a mistake please contact support.'); # URL MOST LIKELY CHANGING
				Session::flash('alert-class', 'alert-warning'); 
				return Redirect::to('/addash');
			}

			Session::flash('message', 'Your account does not have permission to view that page. If you believe this is a mistake please contact support immediately.'); 
			Session::flash('alert-class', 'alert-danger'); 
        	return redirect('/login');
		}
	

		return view('dashboard');
	}

	public function adCreate()
	{
		return view('adCreate');
	}

	public function register()
	{
		return view('register');
	}

	public function adProfile($company)
	{


		//taken from ProfilesController, which is now retired
		try
		{
			$user = User::whereCompany($company)->firstOrFail();
		}
		catch(ModelNotFoundException $e)
		{

			//return Redirect::to('/users/')->withErrors('No user registered under the name: ' . $username);
			// Log 404 error with requested URL. URL is /{$username}
			Log::warning('404 caught in UsersController.', ['context' => 'Requested username,URL: /users/' . $company]);	
			//abort(404);
			return Redirect::to('/404');
			//Session::flash('message', 'No user registered under the name: ' . $username); 
			//Session::flash('alert-class', 'alert-danger'); 
		}
		
		return View::make('profiles.show')->withUser($user);
	}

	public function advertisers()
	{
		/* if (!Auth::check())
		{
			Session::flash('message', 'You need to log-in to view the User page.'); 
			Session::flash('alert-class', 'alert-danger'); 
        	return redirect('/login');
		} */

		//$advertisers = User::all();


		$allUsers = DB::table('users')->get();
		$allRoles = DB::table('role_user')->get();

		$advertisers = User::whereHas('roles', function($q)
		{
        	$q->where('name', 'advertiser');
    	}
		)->get();

		return view('advertisers')->with('advertisers', $advertisers);



		//return View::make('advertisers')->withAdvertisers($advertisers);
	}

	public function owner()
	{
		if (!Auth::user()->hasRole('owner'))
		{
			Session::flash('message', 'Your account does not have permission to view that page. If you believe this is a mistake please contact support immediately.'); 
			Session::flash('alert-class', 'alert-danger'); 
        	return redirect('/');
		}
		
		return view('owner');
	}

	public function error()
	{
		abort(404);
	}

	public function addash()
	{
		if (!Auth::user()->hasRole('advertiser'))
		{
			Session::flash('message', 'Your account does not have permission to view that page. If you believe this is a mistake please contact support immediately.'); 
			Session::flash('alert-class', 'alert-danger'); 
        	return redirect('/');
		}
		
		return view('addash');
	}

	public function admin()
	{
		if (!Auth::user()->hasRole('administrator'))
		{
			Session::flash('message', 'Your account does not have permission to view that page. If you believe this is a mistake please contact support immediately.'); 
			Session::flash('alert-class', 'alert-danger'); 
        	return redirect('/');
		}

		$allUsers = DB::table('users')->get();
		$allRoles = DB::table('role_user')->get();

		$advertisers = User::whereHas('roles', function($q)
		{
        	$q->where('name', 'advertiser');
    	}
		)->get();
		return view('admin')->with('fetchedRoles', $allRoles)->with('fetchedUsers', $allUsers)->with('advertisers', $advertisers);
	}
}