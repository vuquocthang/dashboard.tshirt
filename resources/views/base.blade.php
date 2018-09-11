<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Admin | Trang Chủ</title>
    <link rel="apple-touch-icon" href="{{ asset('assets') }}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/assets/css/style.css">
    <!-- END Custom CSS-->
	
	@yield('css')
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- fixed-top-->
    
	@include('components.header')
	
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    
	@include('components.menu')
	
	@yield('app')
	
    
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="#"
        target="_blank">King Clothes </a>, All rights reserved. </span>
            <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
        </p>
    </footer>
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets') }}/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('assets') }}/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('assets') }}/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('assets') }}/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
	
	@yield('js')
	
</body>

</html>