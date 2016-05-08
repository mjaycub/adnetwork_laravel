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
    <div class="col-md-6">
        <h1>Offer Details</h1>

        @if(!$offer)
            <h3>Currently no offer.</h3>
            <p>When you have talked with the recipient and feel you are ready to make an offer,
                press the button below and fill out the details for the proposal.</p>

            <p>We recommend agreeing on a deal using the conversation box to the left. Once you have agreed on a deal,
                use the 'Offer' form below to enter the offer into our system.</p>

            <p> <b>The other recipient must confirm the
                deal offer before it is entered into our system for processing.</b></p>
        
        <!-- -->

        <!-- <button type="button" id="offer_btn" class="btn btn-info btn-md" disabled="true">Propose an Offer</button> -->



         <!-- TODO: FIX FORM MODEL STUFF -->
        <div id="offer_form">
            {!! Form::open(['route' => ['offers.store', $thread->id], 'method' => 'PUT']) !!}


            <!-- Title Field -->
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Description -->
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Currency Field -->
            <div class="form-group">
                {!! Form::label('currency', 'Currency:') !!}
                {!! Form::select('currency', array('USD' => '$ USD', 'EUR' => '€ EUR'), 'USD') !!}
            </div>

            <!-- Amount -->
            <div class="form-group">
                {!! Form::label('amount', 'Amount:') !!}
                {!! Form::input('number', 'amount', null, $options = array()) !!}
            </div>

            <h4>Select any tags that are appropriate.</h4>
             <!-- Tags -->
            <div class="form-group">
                <ul>
                    <li>{!! Form::label('YouTube', 'YouTube:') !!}
                         {!! Form::checkbox('YouTube', 'YouTube') !!} </li>
                    <li>{!! Form::label('Facebook', 'Facebook:') !!}
                {!! Form::checkbox('Facebook', 'Facebook') !!} </li>
                </ul>
            </div>

            <!-- Submit -->
            <div class="form-group">
                {!! Form::submit('Send Offer', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

        @else
            <h3>You have an offer.....</h3>
            <h5 class="media-heading">{!! $offer->title !!}</h5>
            <h5 class="media-heading">{!! $offer->description !!}</h5>
            <h5 class="media-heading">{!! $offer->currency !!}</h5>
            <h5 class="media-heading">{!! $offer->amount !!}</h5>
            <h5 class="media-heading">{!! Auth::user()->where('id', $offer->advertiser_id)->select('username')->get() !!}</h5> 
        @endif


    </div>
@stop

