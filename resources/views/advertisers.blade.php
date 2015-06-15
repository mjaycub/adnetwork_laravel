@extends('layouts.default')

@section('content')
	<h1>All Advertisers</h1>
	@if($advertisers->count())
		@foreach ($advertisers as $advertiser)
		<li> {!! link_to("/advertisers/{$advertiser->company}", $advertiser->company) !!} </li>
		@endforeach
	@else
		<p>Unfortunately, there are no users.</p>
	@endif	
@stop
