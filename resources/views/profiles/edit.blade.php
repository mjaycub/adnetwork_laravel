@extends('layouts.default')

@section('content')
	<h1>Edit Profile</h1>
	@if(Session::has('message'))
			<div>
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			</div>
	@endif

	{!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->username]]) !!}

		<!-- Bio Field -->
		<div class="form-group">
			{!! Form::label('bio', 'Bio:') !!}
			{!! Form::text('bio', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Location Field -->
		<div class="form-group">
			{!! Form::label('location', 'Location:') !!}
			{!! Form::text('location', null, ['class' => 'form-control']) !!}
		</div>

		<!-- YT Username -->
		<div class="form-group">
			{!! Form::label('youtube_username', 'YouTube Username:') !!}
			{!! Form::text('youtube_username', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Twitter Username -->
		<div class="form-group">
			{!! Form::label('twitter_username', 'Twitter Username:') !!}
			{!! Form::text('twitter_username', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Instagram Username -->
		<div class="form-group">
			{!! Form::label('instagram_username', 'Instagram Username:') !!}
			{!! Form::text('instagram_username', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Facebook Page Username -->
		<div class="form-group">
			{!! Form::label('facebook_page_name', 'Facebook Username:') !!}
			{!! Form::text('facebook_page_name', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Vine Username -->
		<div class="form-group">
			{!! Form::label('vine_username', 'Vine Username:') !!}
			{!! Form::text('vine_username', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Submit -->
		<div class="form-group">
			{!! Form::submit('Update Profile', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@stop
