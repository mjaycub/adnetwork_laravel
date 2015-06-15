@extends('layouts.default')

@section('content')
	<h1>Register</h1>
	@if(Session::has('message'))
		<div>
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		</div>	
	@endif

	<div class="row">
	  <div class="col-md-6">
	  	<h3>Content Creators</h3>
	  	<p>Content creators are people who create content across various social media platforms such as YouTube, Vine, Facebook, Twitter, SnapChat and more! Register with Bluence for the opportunity to receive 
	  		advertising deals from companies around the world to help fund your content.</p>
	  		<a class="btn btn-primary btn-lg btn-block" href="/users/create" role="button">Content Creators</a>
	  </div>

	  <div class="col-md-6">
	  	<h3>Advertisers</h3>
	  	<p>Join the Bluence platform for free and have the opportunity to work and partner with some of the greatest content creators across the internet. With creators across various social media networks, 
	  		with audience demographics stretching far and wide.</p>
	  	<br>
	  	<a class="btn btn-success btn-lg btn-block" href="/advertisers/create" role="button">Advertisers</a>
	  </div>
	</div>
@stop
