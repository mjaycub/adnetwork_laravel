
@extends('layouts.default')

@section('content')
		<h1>Create New User</h1>
		
		@if(Session::has('message'))
			<div>
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			</div>
		@endif
		
		{!! Form::open(['route' => 'users.store']) !!}
		
		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			<p>You will log in with this email address & this address will be used for any communication between parties, so please use a suitable address.</p>
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
			{!! $errors->first('email', '<span class=error>:message</span>') !!}
		</div>

		<div class="form-group">
			{!! Form::label('username', 'Username:') !!}
			<p>This will be used for your profile page. For example: the URL for username <i>'AnnesBakery'</i> would be <i>'bluence.com/users/AnnesBakery'</i> .</p>
			{!! Form::text('username', null, ['class' => 'form-control']) !!}
			{!! $errors->first('username') !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password: ') !!}
			<p>Choose a strong password to protect your account.</p>
			{!! Form::password('password', array('placeholder'=>'', 'class'=>'form-control' ) ) !!}
			{!! $errors->first('password') !!}
		</div>

		<div>
			{!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}

@stop
