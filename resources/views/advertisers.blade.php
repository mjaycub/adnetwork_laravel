@extends('layouts.default')

@section('content')
	<h1>All Brands</h1>
	@if($advertisers->count())
		@foreach ($advertisers as $advertiser)
			<li> {!! link_to("/profile/{$advertiser->username}", $advertiser->username) !!} </li>
		@endforeach
	@else
		<p>Unfortunately, there are no users.</p>
	@endif	
@stop
