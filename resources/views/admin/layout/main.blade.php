<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>YouthOA - 青春在线办公系统</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css")}}">
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css")}}">
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}">
	@yield('page-css')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<!-- Main Header -->
		@include('admin.layout.header')
		<!-- Left side column. contains the logo and sidebar -->
		@include('admin.layout.sidebar')
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			@yield('content-header')
			<!-- Main content -->
			@yield('content')
		</div>
		<!-- Main Footer -->
		@include('admin.layout.footer')
		<!-- Control Sidebar -->
		@include('admin.layout.control')
	</div>
	<!-- ./wrapper -->
	@yield('page-modal')
	<!-- REQUIRED JS SCRIPTS -->
	<script src="{{ asset("bower_components/jquery/dist/jquery.min.js")}}"></script>
	<script src="{{ asset("bower_components/jquery-ui/jquery-ui.min.js")}}"></script>
	<script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
	<script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>
	<script src="{{ asset("js/admin/main.js")}}"></script>
	@yield('page-js')
	<!-- Optionally, you can add Slimscroll and FastClick plugins.
		Both of these plugins are recommended to enhance the
		user experience. -->
</body>
</html>