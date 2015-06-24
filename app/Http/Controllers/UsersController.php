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
use DB;
use Mail;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidConfirmationCodeException;
use Exception;

class UsersController extends Controller {

	
	public function index()
	{
		if (!Auth::check())
		{
			Session::flash('message', 'You need to log-in to view the User page.'); 
			Session::flash('alert-class', 'alert-danger'); 
        	return redirect('/login');
		}

		#$users = User::all();

		#return View::make('users/index')->withUsers($users);

		$allUsers = DB::table('users')->get();
		$allRoles = DB::table('role_user')->get();

		$creators = User::whereHas('roles', function($q)
		{
        	$q->where('name', 'creator');
    	}
		)->get();

		return view('users.index')->with('users', $creators);

	}

	/*public function show($username)
	{
		$user = User::whereUsername($username)->first();

		return View::make('users/show', ['user' => $user]);
	} */

	public function oldUsers()
	{
		return Redirect::to('/creators/'); # /users/ redirects to /creators/ 
	}

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

		$confirmation_code = str_random(30);

		$user = new User;
		$user->confirmation_code = $confirmation_code;
		$user->fname = Input::get('fname');
		$user->lname = Input::get('lname');
		$user->email = Input::get('email');
		$user->username = Input::get('username');
		$user->company = Input::get('company');
		$user->password = Hash::make(Input::get('password'));
		$user->save();

		$profileInfo = ['user_id' => '$user->id', 'bio' => ''];
		$user->profile()->save(new Profile($profileInfo));


		/* Assuming if input has:
		* 	- USERNAME => content creator
		*	- COMPANY  => advertiser
		* 	- else	   => member
		*/
		if($user->username != NULL)
		{
			$user->assignRole(5); // assigned content creator role
		}
		else if($user->company != NULL)
		{
			$user->assignRole(4); // assigned advertiser role
		}
		else
		{
			$user->assignRole(1); // assigned member role by default
		}
		

		$user->save();

		
		Mail::send('email.verify', ['user' => $user], function($message) {
           	$message->from( 'info@bluence.com', 'Bluence Registration' );
            $message->to('themarkjacob@gmail.com')->subject('Verify your email address for Bluence!');
        });

        Session::flash('message', 'Thanks for signing up! Please check your email for your confirmation link.'); 
		Session::flash('alert-class', 'alert-warning'); 

		return Redirect::to('/login');
		
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

	public function confirm($confirmation_code)
    {
    	
        if( ! $confirmation_code)
        {
            Session::flash('message', 'This confirmation code does not exist.'); 
			Session::flash('alert-class', 'alert-warning'); 
			return Redirect::to('login');
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            Session::flash('message', 'This confirmation code does not exist.'); 
			Session::flash('alert-class', 'alert-warning'); 
			return Redirect::to('login');
        }

        
	    

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Session::flash('message', 'You have successfully verified your account.'); 
		Session::flash('alert-class', 'alert-info'); 

        return Redirect::to('/login');
    }


}
