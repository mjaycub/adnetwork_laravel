@extends('layouts.default')

@section('content')
<h1>Create a new message</h1>
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
</div>
{!! Form::close() !!}
@stop