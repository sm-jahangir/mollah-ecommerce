<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('assets/backend') }}/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('assets/backend') }}/dist/css/adminlte.min.css">

	{{-- Laravel iziToast --}}
	<link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">

	@stack('css')
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<x-backend.header-component />
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<x-backend.sidebar-component />

		<!-- Content Wrapper. Contains page content -->
		@yield('content')
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
			<div class="p-3">
				<h5>Title</h5>
				<p>Sidebar content</p>
			</div>
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<x-backend.footer-component />
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="{{ asset('assets/backend') }}/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('assets/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('assets/backend') }}/dist/js/adminlte.min.js"></script>
	{{-- Laravel iziToast js --}}
	<script src="{{ asset('js/iziToast.js') }}"></script>
	@include('vendor.lara-izitoast.toast')



	@stack('js')
</body>

</html>
