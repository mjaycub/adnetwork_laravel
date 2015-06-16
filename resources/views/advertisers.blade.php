@extends('layouts.default')

@section('content')
	<h1>All Advertisers</h1>
	@if($advertisers->count())
		@foreach ($advertisers as $advertiser)
			@if ($advertiser->company == NULL )
			   	<li>error - mark doing something with this</li>
			@else
			    <li> {!! link_to("/advertisers/{$advertiser->company}", $advertiser->company) !!} </li>
			@endif
		@endforeach
	@else
		<p>Unfortunately, there are no users.</p>
	@endif	
@stop
