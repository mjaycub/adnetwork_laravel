<?php namespace App\Http\Controllers;

class PagesController extends Controller {
	
	public function home()
	{
		$name = 'Mark';

		return view('index')->with('name', $name);
	}

	public function about()
	{
		return view('about');
	}
}