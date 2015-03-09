
@extends('layouts.default')

@section('content')
		<h1>Create New User</h1>
		<div>
		{!! Form::open(['route' => 'users.store']) !!}
		
		<div>
			{!! Form::label('email', 'Email: ') !!}
			{!! Form::email('email') !!}
			{!! $errors->first('email', '<span class=error>:message</span>') !!}
		</div>

		<div>
			{!! Form::label('username', 'Username: ') !!}
			{!! Form::text('username') !!}
			{!! $errors->first('username') !!}
		</div>

		<div>
			{!! Form::label('password', 'Password: ') !!}
			{!! Form::password('password') !!}
			{!! $errors->first('password') !!}
		</div>

		<div>
			{!! Form::submit('Create User') !!}
		</div>

		{!! Form::close() !!}
	</div>
@stop
