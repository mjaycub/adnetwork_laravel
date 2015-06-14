<?php
use \App\User as User;
use \App\Http\Middleware;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

# Home
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/owner', ['middleware' => 'auth', 'uses' => 'PagesController@owner']);
Route::get('/404', 'PagesController@error');
Route::get('/addash', ['middleware' => 'auth', 'uses' => 'PagesController@addash']);
Route::get('/dashboard', ['middleware' => 'auth', 'uses' => 'PagesController@dashboard']);
Route::get('/advertisers', ['middleware' => 'auth', 'uses' => 'PagesController@advertisers']);


#Profile Edit
Route::resource('profile', 'ProfilesController', ['only' => ['edit', 'update']]);
Route::get('/users/{profile}/edit', ['as' => 'profile.edit', 'uses' => 'ProfilesController@edit']);

# Users
Route::resource('users', 'UsersController');

#Profile
# Route::get('/users/{profile}', ['as' => 'profile.show', 'uses' => 'ProfilesController@show']);


# Authentication
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');

# User-accessed page
Route::get('admin', ['middleware' => 'auth', 'uses' => 'PagesController@admin']);

#User Profiles
/*
|  User profiles handles by UsersController
|	- profiles now at /users/{profile} instead of /{profile}
*/
# Route::get('/{profile}', 'ProfilesController@show');

/* 
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/