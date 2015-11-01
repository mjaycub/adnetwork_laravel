@extends('layouts.default')

@section('content')
	<h1>All Brands</h1>
	@if($advertisers->count())
		@foreach ($advertisers as $advertiser)
			@if ($advertiser->company == NULL )
			   	<li>{!! link_to("/creators/{$advertiser->username}", $advertiser->username) !!} error - creator/brand mixup do something with this</li>
			@else
			    <li> {!! link_to("/brands/{$advertiser->company}", $advertiser->company) !!} </li>
			@endif
		@endforeach
	@else
		<p>Unfortunately, there are no users.</p>
	@endif	
@stop
