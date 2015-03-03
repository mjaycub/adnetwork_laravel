<?php
use \App\User as User;
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


/*
Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');
*/

/* $user = new User;
	$user->username = 'NewUser';
	$user->password = Hash::make('password');
	$user->save(); 

	$user = User::find(2);
	$user->username = 'UpdatedName';
	$user->save();

	$user = User::find(2);
	$user->delete();*/
/*
Route::get('users', 'UsersController@index');

Route::get('users/{username}', 'UsersController@show');

Route::get('users/new', 'UsersController@create');*/

Route::resource('users', 'UsersController');


/* 
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/