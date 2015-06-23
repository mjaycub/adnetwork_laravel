@extends('layouts.default')

@section('content')
	<h1>Bluence Homepage</h1>
	@if(Session::has('message'))
		<div>
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		</div>
	@endif
	<p>Amazing home page with effective CTA's and amazing copy with the bestest images...</p>
@stop
