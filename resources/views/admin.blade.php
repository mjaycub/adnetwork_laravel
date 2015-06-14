@extends('layouts.default')

@section('content')
	<h1>ADMIN Page</h1>
	<p>This page will be used by site admins to manage users and user details.</p>

	<h3>Table</h3>

	<!-- Save user data to json file for table below. -->
	<?php
		$json_string = json_encode($fetchedRoles, JSON_PRETTY_PRINT);
		$file = 'data.json';
		file_put_contents($file, $json_string);
  	?>

    <?php
        $json_string2 = json_encode($fetchedUsers, JSON_PRETTY_PRINT);
        $file2 = 'data2.json';
        file_put_contents($file2, $json_string2);
    ?>

    <h3>Users</h3>
    <div>

      <table data-toggle="table" data-url='data2.json' data-cache="false">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">User ID</th>
                <th data-field="username" data-sortable="true" data-formatter="LinkFormatter">Username</th>
                <th data-field="name" data-sortable="true">Name</th>
                <th data-field="email" data-sortable="true">Email Address</th>
            </tr>
        </thead>
    </table>

    <p><b>Raw data:</b> <?php echo $json_string2; ?> </p>

</div>

<h3>Roles</h3>
<div>
    <ul>
        <li>1: member</li>
        <li>2: admin</li>
        <li>3: owner</li>
        <li>4: advertiser</li>
    </ul>

  <table data-toggle="table" data-url='data.json' data-cache="false">
    <thead>
        <tr>
            <th data-field="user_id" data-sortable="true">User ID</th>
            <th data-field="role_id" data-sortable="true">Role</th>
        </tr>
    </thead>
</table>

<p><b>Raw data:</b> <?php echo $json_string; ?> </p>
</div>

<script>
function LinkFormatter(value, row, index) {
    var userURL = '/users/' + value;
  return "<a href='"+userURL+"'>"+value+"</a>";
}
</script>
@stop
