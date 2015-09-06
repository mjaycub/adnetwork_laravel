@extends('layouts.restricted')

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <h1>Login</h1>
            @if(Session::has('message'))
                <div>
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                </div>
            @endif
            
            {!! Form::open(['route' => 'sessions.store']) !!}

                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('email', '<span class=error>:message</span>') !!}
                </div> 

                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', array('placeholder'=>'', 'class'=>'form-control', 'required' => 'required' )) !!}
                    {!! $errors->first('password') !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}

            <div>
                <a href="http://bluence.com/password/email">Forgot Password?</a>
            </div>

        </div>

        <div class="col-lg-6" style="margin-top: 100px;">
            <p>This is the log-in page for registered users.</p>
            <br>
            <p>Registration is currently non-public. If you would like to be one of the first to access our platform please enter your email in the form <b><a href="http://bluence.com">located here</a></b>.</p>
        </div>

@stop
