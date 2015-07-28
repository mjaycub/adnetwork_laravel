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
Route::get('/register', 'PagesController@register');
Route::get('/users/', 'UsersController@oldUsers'); # redirect /users/ to /creators/
Route::get('/users/{profile}/', 'UsersController@oldUsers'); # redirect /users/{profile} to /creators/{profile}

# Confirm USER REG
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'UsersController@confirm'
]);

# MESSAGES
Route::group(['middleware' => 'auth', 'prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::get('/inbox', ['middleware' => 'auth', 'uses' => 'MessagesController@inbox']);

# Dashboards
Route::get('/addash', ['middleware' => 'auth', 'uses' => 'PagesController@addash']);
Route::get('/dashboard', ['middleware' => 'auth', 'uses' => 'PagesController@dashboard']);

# Advertisers
Route::get('/advertisers', ['middleware' => 'auth', 'uses' => 'PagesController@advertisers']);
Route::get('/advertisers/create', 'PagesController@adCreate');

# Creators
Route::get('/creators', ['as' => 'creators.index', 'middleware' => 'auth', 'uses' => 'UsersController@index']);
Route::get('/creators/create', 'UsersController@create');

# Creator Profile Edit
Route::resource('profile', 'ProfilesController', ['only' => ['edit', 'update']]);
Route::get('/creators/{profile}/', ['as' => 'users.show', 'uses' => 'UsersController@show']);
Route::get('/creators/{profile}/edit', ['as' => 'profile.edit', 'uses' => 'ProfilesController@edit']);

# Advetiser Profile Edit
Route::get('/advertisers/{profile}', 'PagesController@adProfile');
Route::get('/advertisers/{profile}/edit', ['as' => 'profile.edit', 'uses' => 'ProfilesController@edit']);

# Users
Route::resource('users', 'UsersController', ['only' => ['store']]);

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