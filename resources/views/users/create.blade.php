
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
			{!! Form::label('fname', ' First Name:') !!}
			{!! Form::text('fname', null, ['class' => 'form-control', 'required' => 'required']) !!}
			{!! $errors->first('fname', '<span class=error>:message</span>') !!}
		</div> 

		<div class="form-group">
			{!! Form::label('lname', 'Last Name:') !!}
			<p><i>Your last name is kept private.</i></p>
			{!! Form::text('lname', null, ['class' => 'form-control', 'required' => 'required']) !!}
			{!! $errors->first('lname', '<span class=error>:message</span>') !!}
		</div> 
		
		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			<p>You will log in with this email address & this address will be used for any communication between parties, so please use a suitable address.</p>
			<p>We will not disclose your email address without your permission.</p>
			{!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
			{!! $errors->first('email', '<span class=error>:message</span>') !!}
		</div>

		<div class="form-group">
			{!! Form::label('username', 'Username:') !!}
			<p>This will be used for your profile page. For example: the URL for username <i>'AnnesBakery'</i> would be <i>'bluence.com/users/AnnesBakery'</i> .</p>
			<p>Your profile page is private, it will only be viewable by you and users with access to our platform.</p>
			{!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
			{!! $errors->first('username', '<span class=error>:message</span>') !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password: ') !!}
			<p>Choose a strong password to protect your account.</p>
			{!! Form::password('password', array('placeholder'=>'', 'class'=>'form-control', 'required' => 'required' ) ) !!}
			{!! $errors->first('password', '<span class=error>:message</span>') !!}
		</div>

		<div class="form-group">
			{!! Form::label('password_confirmation', 'Password Confirmation: ') !!}
			{!! Form::password('password_confirmation', array('placeholder'=>'', 'class'=>'form-control', 'required' => 'required' ) ) !!}
			{!! $errors->first('password', '<span class=error>:message</span>') !!}
		</div>

		<div>
			{!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}

@stop
