@extends('layouts.default')

@section('content')
    <div class="col-md-6">
        <h1>{!! $thread->subject !!}</h1>
        @if(Session::has('message'))
            <div>
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            </div>
        @endif
        

        @foreach($thread->messages as $message)
            <div class="media">
               <!--  <a class="pull-left" href="#">
                    <img src="//www.gravatar.com/avatar/{!! md5($message->user->email) !!}?s=64" alt="{!! $message->user->fname !!}" class="img-circle">
                </a>-->
                <div class="media-body">
                    <h5 class="media-heading">{!! $message->user->fname !!} - 
                        @if ($message->user->username == NULL )
                        <i>{!! $message->user->company !!}</i> </small></p>
                        @else
                        <i>{!! $message->user->username !!}</i> </small></p>
                        @endif
                    </h5>    
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

        <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Reply', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop