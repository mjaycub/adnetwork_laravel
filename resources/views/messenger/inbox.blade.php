@extends('layouts.default')

@section('content')
	<h1>Inbox</h1>

	<h4>temp descrip</h4>
	<p>
	Inbox for users.
	<ul>
		<li>Unique to each user</li>
		<li>Only viewable on log-in</li>
		<li>Show all past conversation threads</li>
		<li>Option to send new message? How would a user select a recipient in this case?</li>
	</ul>
	</p>

	<h4>end temp descrip</h4>
	
	<hr>
	
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {!! Session::get('error_message') !!}
        </div>
    @endif

    @if($threads->count() > 0)
        @foreach($threads as $thread)

        	<?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
	        <div class="media alert {!!$class!!}">
	            <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
	            <p>{!! $thread->getLatestMessageAttribute->first()->body !!}</p>
	            <p><small><strong>Creator:</strong> {!! $thread->creator()->fname !!} of
	            @if ($thread->creator()->username == NULL )
					<i>{!! $thread->creator()->company !!}</i> </small></p>
				@else
					<i>{!! $thread->creator()->username !!}</i> </small></p>
				@endif

	        </div>

	       

	        <hr>

        	<!-- All messages user is involved in 
	        @foreach($thread->messages as $message)
            <div class="media">
                <a class="pull-left" href="#">
                    <img src="//www.gravatar.com/avatar/{!! md5($message->user->email) !!}?s=64" alt="{!! $message->user->fname !!}" class="img-circle">
                </a>
                <div class="media-body">
                    <h5 class="media-heading">{!! $message->user->fname !!}</h5>
                    <p>{!! $message->body !!}</p>
                    <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
                </div>
            </div>
        	@endforeach
        	 -->

        @endforeach
    @else
        <p>Your inbox is empty :) </p>
    @endif
@stop