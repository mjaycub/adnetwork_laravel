@extends('layouts.default')

@section('content')
    <div class="col-md-6">
        <h1>{!! $thread->subject !!}</h1>

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

        <h2>Add a new message</h2>
        {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
        <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>

       @if($users->count() > 0)
       <div class="checkbox">
        @foreach($users as $user)
            @if(Auth::user()->username) <!-- Creator Menu -->
             <label title="{!!$user->fname!!}"><input type="checkbox" name="recipients[]" value="{!!$user->id!!}">{!!$user->fname!!} - {!!$user->username!!}</label>
            @elseif(Auth::user()->company)
             <label title="{!!$user->fname!!}"><input type="checkbox" name="recipients[]" value="{!!$user->id!!}">{!!$user->fname!!} - {!!$user->company!!}</label>
            @else
             <label title="{!!$user->fname!!}"><input type="checkbox" name="recipients[]" value="{!!$user->id!!}">{!!$user->fname!!}</label>
            @endif
        @endforeach
    </div>
    @endif

        <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop