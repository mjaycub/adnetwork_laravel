@extends('layouts.default')

@section('content')
	<h1>All Creators</h1>
	@if($users->count())
		@foreach ($users as $user)
		<li> {!! link_to("/creators/{$user->username}", $user->username) !!} </li>
		@endforeach
	@else
		<p>Unfortunately, there are no users.</p>
	@endif	
@stop
