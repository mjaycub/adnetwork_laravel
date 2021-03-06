<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bluence</title>

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/bootstrap-table.css">

		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Bluence</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/">Home</a></li>
					<li><a href="/about">About</a></li>
					<li><a href="/admin">Admin</a></li>
					<li><a href="/creators">Creators</a></li>
					<li><a href="/brands">Brands</a></li>
					<li><a href="/dashboard">Dashboard</a></li>
					<li><a href="/addash">Ad Dash</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/login">Login</a></li>
						<li><a href="/register">Register</a></li>
					@elseif(Auth::user()->hasRole('creator')) <!-- Creator Menu -->
					<li>
						<button type="button" class="btn btn-default" aria-label="inbox" onclick="location.href='/inbox/'">
					 		<span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
						</button>

					</li>
					<li><a href="{{'/profile/'.Auth::user()->username}}">Your Profile</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/logout">Logout</a></li>
							</ul>
						</li>
					@elseif(Auth::user()->hasRole('brand')) <!-- Advertiser Menu -->
					<li>
						<button type="button" class="btn btn-default" aria-label="inbox" onclick="location.href='/inbox/'">
					 		<span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
						</button>

					</li>
					<li><a href="{{'/profile/'.Auth::user()->username}}">Your Profile</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/logout">Logout</a></li>
							</ul>
						</li>
					@elseif(Auth::user()->hasRole('administrator')) <!-- Admin Menu -->
					<li>
						<button type="button" class="btn btn-default" aria-label="inbox" onclick="location.href='/inbox/'">
					 		<span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
						</button>

					</li>
					<li><a href="/dashboard">Dashboard</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/logout">Logout</a></li>
							</ul>
						</li>
					@else
					<li><a href="{{'/profile/'.Auth::user()->username}}">No Type Found.</a></li>
					<li>
						<button type="button" class="btn btn-default" aria-label="inbox" onclick="location.href='/inbox/'">
					 		<span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
						</button>

					</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

		<div class="container">
			@yield('content')
		</div>

		@yield('footer')

		<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/bootstrap-table.js"></script>
	


	</body>
</html>
