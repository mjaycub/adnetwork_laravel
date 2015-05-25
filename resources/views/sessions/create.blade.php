@extends('layouts.default')

@section('content')
		<h1>Login</h1>
		@if(Session::has('message'))
			<div>
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			</div>
		@endif
		
		{!! Form::open(['route' => 'sessions.store']) !!}
			<div class="form-group">
				{!! Form::label('email', 'Email:') !!}
				{!! Form::email('email', null, ['class' => 'form-control']) !!}
				{!! $errors->first('email', '<span class=error>:message</span>') !!}
			</div> 

			<div class="form-group">
				{!! Form::label('password', 'Password:') !!}
				{!! Form::password('password', array('placeholder'=>'', 'class'=>'form-control' )) !!}
				{!! $errors->first('password') !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}
		
@stop
