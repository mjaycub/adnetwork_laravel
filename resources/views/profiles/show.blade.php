@extends('layouts.default')

@section('content')
	@if(Session::has('message'))
		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	@else
		<h1>Profile</h1>
		<h2>{{ $user->username }} <small>{{ $user->fname }}</small></h2>

		@if (Auth::check())
			@if( Auth::user()->id == $user->id)
				<h3> {!! link_to_route('profile.edit', 'Edit Your Profile', $user->username) !!} </h3>
			@endif
		@endif

		<div class="bio">
			<p>
				<h3>Bio</h3>
				{{ $user->Profile->bio }} 
				<h3>Location</h3>
				{{ $user->Profile->location }} 
				
			</p>

		</div>

		<div class="links">
			<h3>Social Media</h3>
			@if($user->Profile->youtube_username)
				<li>{!! link_to('http://youtube.com/' . $user->Profile->youtube_username, 'YouTube') !!}</li>
			@endif
			@if($user->Profile->twitter_username)
				<li>{!! link_to('http://twitter.com/' . $user->Profile->twitter_username, 'Twitter') !!}</li>
			@endif
			@if($user->Profile->facebook_page_name)
				<li>{!! link_to('http://facebook.com/' . $user->Profile->facebook_page_name, 'Facebook') !!}</li>
			@endif
			@if($user->Profile->vine_username)
				<li>{!! link_to('http://vine.com/' . $user->Profile->vine_username, 'Vine') !!}</li>
			@endif
			@if($user->Profile->instagram_username)
				<li>{!! link_to('http://instagram.com/' . $user->Profile->instagram_username, 'Instagram') !!}</li>
			@endif
		</div>
		
	@endif

	

@stop