<link rel="apple-touch-icon" href="apple-icon.png">
<link rel="shortcut icon" href="favicon.ico">

<link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/scss/style.css') }}">

{{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> --}}

@stack('css')
<style>
	*, a, .navbar .navbar-brand {
		font-family: sans-serif;
	}
	.navbar .navbar-nav li > a {
		font-family: sans-serif !important;
	}
</style>