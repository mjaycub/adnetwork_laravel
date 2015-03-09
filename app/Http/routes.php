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


Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::resource('users', 'UsersController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');



Route::get('admin', ['middleware' => 'auth', 'uses' => 'PagesController@admin']);

/* 
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/