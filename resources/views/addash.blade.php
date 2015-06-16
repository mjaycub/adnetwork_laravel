@extends('layouts.default')

@section('content')
	@if(Session::has('message'))
		<div>
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		</div>
	@endif

	<h1>ADVERTISER Page</h1>
	<p>This page is only accessible by users who have the 'Advertiser' role.</p>
@stop
