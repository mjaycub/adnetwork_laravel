<?php namespace App\Http\Controllers;

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

	public function admin()
	{
		return view('admin');
	}
}