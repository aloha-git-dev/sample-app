<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	
	<title>Sample Test App - @yield('title')</title>
	<!-- set page title  -->

	<!-- Bootstrape CSS -->
	<link href="{{ asset('/css/bootstrap/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/bootstrap/bootstrap-theme.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/layout.css') }}" rel="stylesheet">

	<!-- Jquery UI CSS -->
	<link href="{{ asset('/DataTables/css/jquery.dataTables.css') }}" rel="stylesheet">
	<link href="{{ asset('/jquery/jquery-ui.min.css') }}" rel="stylesheet">
	
	<script src="{{ asset('/jquery/jquery-1.10.2.min.js') }}"></script>
	<script src="{{ asset('/jquery/jquery-ui.min.js') }}"></script>
	<!-- Bootstrap Scripts -->
	<script src="{{ asset('/js/bootstrap/bootstrap.js') }}"></script>
	
	<!-- Common js files -->
	<script src="{{ asset('/js/common.js') }}"></script>
	<script src="{{ asset('/js/address.js') }}"></script>

	<script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/jquery.dataTables.min.js') }}"></script> 

	@yield('css-content')
</head>

<body>
	<!-- Header Section -->
	<header>
		<div class="header text-left">Sample Test App</div>
	</header>

	<!-- Container-->	
	<div class="container">
			<div class="col-md-12 no-padding">
				<div class="col-md-12 sub-container">
						<!-- Content -->
						@yield('content')
						<!--/content -->
				</div>
			</div>		
	</div>
	
	<!-- Footer -->
	<footer class="col-md-12">
		<!-- <span >©{{date('Y')}} - Laravel 5 Groups, Inc.</span> -->
	</footer>

</body>
</html>