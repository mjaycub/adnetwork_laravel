@extends('layouts.default')

@section('content')
	@if(Session::has('message'))
		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	@else
		<h1>Profile</h1>
	@endif

	

@stop
