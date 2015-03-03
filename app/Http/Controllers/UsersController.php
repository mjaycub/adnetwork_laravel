<?php namespace App\Http\Controllers;
use \App\User;
use View;
use Hash;
use Input;
use Redirect;
use Validator;

class UsersController extends Controller {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function index()
	{
		$users = $this->user->all();

		return View::make('users/index')->withUsers($users);
	}

	public function show($username)
	{
		$user = $this->user->whereUsername($username)->first();

		return View::make('users/show', ['user' => $user]);
	}

	public function create()
	{
		return View::make('users.create');
	}

	public function store()
	{
		if(! $this->user->isValid(Input::all()))
		{
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}

		/* 
		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->save();*/

		$this->user->create(Input::all());

		return Redirect::route('users.index');
	}

}
