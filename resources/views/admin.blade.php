@extends('layouts.default')

@section('content')
	<h1>ADMIN Page</h1>
	<p>This page will be used by site admins to manage users and user details.</p>

	<h3>Table</h3>

	<!-- Save user data to json file for table below. -->
	<?php
		$json_string = json_encode($fetchedUsers, JSON_PRETTY_PRINT);
		$file = 'data.json';
		file_put_contents($file, $json_string);
  	?>


  <table data-toggle="table" data-url='data.json' data-cache="false">
    <thead>
        <tr>
            <th data-field="id" data-sortable="true">User ID</th>
            <th data-field="username" data-sortable="true">Username</th>
            <th data-field="name" data-sortable="true">Name</th>
            <th data-field="email" data-sortable="true">Email Address</th>
        </tr>
    </thead>
</table>

@stop
