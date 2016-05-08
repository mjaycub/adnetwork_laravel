@extends('layouts.default')

@section('content')
	<h1>MESSAGES TEST</h1>
	<p>/messages/ page</p>
	@if(Session::has('message'))
        <div>
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        </div>
    @endif
@stop
