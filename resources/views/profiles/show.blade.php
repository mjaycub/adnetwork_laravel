@extends('layouts.default')

@section('content')
	@if(Session::has('message'))
		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	@else

		@if ($user->username == NULL )
			<h3>ADVERTISER PROFILE DETECTED</h3>
		@else
			<h3>CREATOR PROFILE DETECTED</h3>
		@endif

			<h1>Profile</h1>
			<h2>{{ $user->username }} <small>{{ $user->fname }}</small></h2>

			@if (Auth::check())
				@if( Auth::user()->id == $user->id)
					@if ($user->username == NULL )
						<h3> {!! link_to_route('ad_profile.edit', 'Edit Your Profile', $user->company) !!} </h3>
					@else
						<h3> {!! link_to_route('profile.edit', 'Edit Your Profile', $user->username) !!} </h3>
					@endif
					
				@endif
			@endif


			@if ($user->username == NULL )
				<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal2" data-backdrop="false">Propose an Offer</button>
			@else
				<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal1" data-backdrop="false">Make an Offer</button>
			@endif

			<!-- Modal --> 
			  <div class="modal fade" id="myModal1" role="dialog">
			    <div class="modal-dialog">
			    
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">×</button>
			          <h4 class="modal-title">Offer Message</h4>
			        </div>
			        <div class="modal-body">
			         
			        	<!-- start message form -->
						{!! Form::open(['route' => 'messages.store']) !!}
						<div class="col-md-6">
						    <!-- Subject Form Input -->
						    <div class="form-group">
						        {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
						        {!! Form::text('subject', null, ['class' => 'form-control']) !!}
						    </div>

						    <!-- Message Form Input -->
						    <div class="form-group">
						        {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
						        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
						    </div>
						    
						    
						    <h4>Sending to:</h4>
						    <div class="radio">
							  <label>
							    <input type="radio" name="recipients[]" id="optionsRadios1" value="{!!$user->id!!}" checked>
							    {!!$user->fname!!}
							  </label>
							</div>			 
						    
						    <!-- Submit Form Input -->
						    <div class="form-group">
						        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
						    </div>
						</div>
						{!! Form::close() !!}

						<!-- end message form -->

			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>
			 <!-- end Modal -->

			 <!-- Modal --> 
			  <div class="modal fade" id="myModal2" role="dialog">
			    <div class="modal-dialog">
			    
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">×</button>
			          <h4 class="modal-title">Proposal Message</h4>
			        </div>
			        <div class="modal-body">
			         
			        	<!-- start message form -->
						{!! Form::open(['route' => 'messages.store']) !!}
						<div class="col-md-6">
						    <!-- Subject Form Input -->
						    <div class="form-group">
						        {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
						        {!! Form::text('subject', null, ['class' => 'form-control']) !!}
						    </div>

						    <!-- Message Form Input -->
						    <div class="form-group">
						        {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
						        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
						    </div>
						    
						    
						    <h4>Sending to:</h4>
						    <div class="radio">
							  <label>
							    <input type="radio" name="recipients[]" id="optionsRadios1" value="{!!$user->id!!}" checked>
							    {!!$user->fname!!}
							  </label>
							</div>			 
						    
						    <!-- Submit Form Input -->
						    <div class="form-group">
						        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
						    </div>
						</div>
						{!! Form::close() !!}

						<!-- end message form -->

			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>
			 <!-- end Modal -->

			  

			<div class="bio">
				<p>
					<h3>Bio</h3>
					{{ $user->Profile->bio }} 
					<h3>Location</h3>
					{{ $user->Profile->location }} 
					
				</p>

			</div>

			<div class="links">
				<h3>Social Media</h3>
				@if($user->Profile->youtube_username)
					<li>{!! link_to('http://youtube.com/' . $user->Profile->youtube_username, 'YouTube') !!}</li>
				@endif
				@if($user->Profile->twitter_username)
					<li>{!! link_to('http://twitter.com/' . $user->Profile->twitter_username, 'Twitter') !!}</li>
				@endif
				@if($user->Profile->facebook_page_name)
					<li>{!! link_to('http://facebook.com/' . $user->Profile->facebook_page_name, 'Facebook') !!}</li>
				@endif
				@if($user->Profile->vine_username)
					<li>{!! link_to('http://vine.com/' . $user->Profile->vine_username, 'Vine') !!}</li>
				@endif
				@if($user->Profile->instagram_username)
					<li>{!! link_to('http://instagram.com/' . $user->Profile->instagram_username, 'Instagram') !!}</li>
				@endif
			</div>
		
	@endif

	

@stop