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

    <?php
        $json_string3 = json_encode($advertisers, JSON_PRETTY_PRINT);
        $file3 = 'data3.json';
        file_put_contents($file3, $json_string3);
    ?>

    <h3>Users</h3>
    <div>

      <table data-toggle="table" data-url='data2.json' data-cache="false">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">User ID</th>
                <th data-field="username" data-sortable="true" data-formatter="LinkFormatter">Username</th>
                <th data-field="fname" data-sortable="true">First Name</th>
                <th data-field="lname" data-sortable="true">Last Name</th>
                <th data-field="email" data-sortable="true">Email Address</th>
            </tr>
        </thead>
    </table>

        <h3>Advertisers</h3>
    <div>

      <table data-toggle="table" data-url='data3.json' data-cache="false">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">Advertiser ID</th>
                <th data-field="company" data-sortable="true" data-formatter="AdLinkFormatter">Company</th>
                <th data-field="fname" data-sortable="true">First Name</th>
                <th data-field="lname" data-sortable="true">Last Name</th>
                <th data-field="email" data-sortable="true">Email Address</th>
            </tr>
        </thead>
    </table>

   <!-- <p><b>Raw data:</b> <?php echo $json_string2; ?> </p> -->

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
            <th data-field="role_id" data-sortable="true" data-formatter="RoleFormatter">Role</th>
        </tr>
    </thead>
</table>

<!-- <p><b>Raw data:</b> <?php echo $json_string; ?> </p> -->
</div>

<script>
function RoleFormatter(value, row, index) {
    if(value==1) // member
    {
        return "Member";
    }
    else if(value==2) // admin
    {
        return "Admin";
    }
    else if(value==3) // owner
    {
        return "Owner";
    }
    else if(value==4) // advertiser
    {
        return "Advertiser";
    }

    return "Unknown - notify mark@bluence.com .";
}

function AdLinkFormatter(value, row, index) {
    var advertiserURL = '/advertisers/' + value;
  return "<a href='"+advertiserURL+"'>"+value+"</a>";
}

function LinkFormatter(value, row, index) {
    var userURL = '/users/' + value;
  return "<a href='"+userURL+"'>"+value+"</a>";
}
</script>
@stop
