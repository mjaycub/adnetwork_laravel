
@extends('layouts.default')

@section('content')
		<h1>Login</h1>
		@if(Session::has('message'))
			<div>
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			</div>
		@endif
		<div>
		{!! Form::open(['route' => 'sessions.store']) !!}
		<div>
			{!! Form::label('email', 'Email: ') !!}
			{!! Form::email('email') !!}
			{!! $errors->first('email', '<span class=error>:message</span>') !!}
		</div> 

		<div>
			{!! Form::label('password', 'Password: ') !!}
			{!! Form::password('password') !!}
			{!! $errors->first('password') !!}
		</div>

		<div>
			{!! Form::submit('Login') !!}
		</div>

		{!! Form::close() !!}
	</div>
@stop
