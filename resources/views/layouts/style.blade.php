<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="/img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">



	<!-- Stylesheets -->
	<link rel="stylesheet" href=" {{asset('css/bootstrap.min.css')}} "/>
	<link rel="stylesheet" href=" {{asset('css/bootstrap.css')}} "/>
	<link rel="stylesheet" href=" {{asset('css/font-awesome.min.css')}} "/>
	<link rel="stylesheet" href=" {{asset('css/flaticon.css') }}"/>
	<link rel="stylesheet" href=" {{asset('css/slicknav.min.css')}}"/>
	<link rel="stylesheet" href=" {{asset('css/jquery-ui.min.css')}} "/>
	<link rel="stylesheet" href=" {{asset('css/owl.carousel.min.css')}} "/>
	<link rel="stylesheet" href=" {{asset('css/animate.css')}} "/>
	<link rel="stylesheet" href=" {{asset('css/style.css')}} "/>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
	@yield('css')


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
    @yield('scripts')
		<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
		<script src="{{asset('js/Popper.js')}}"></script>
		<script src="{{asset('js/Popper.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
