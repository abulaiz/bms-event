<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="BMS Global bergerak dalam bidang Pengembangan SDM ... lebih dari 11 tahun">
  <meta name="keywords" content="Training, Online Registration, BMS GLOBAL">
  <meta name="author" content="PIXINVENT">
  <title>@yield('title')</title>
  <link rel="apple-touch-icon" href="{{ URL::asset('img/logo_bms.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('img/logo_bms.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/vendors.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/forms/icheck/icheck.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/forms/icheck/custom.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/charts/morris.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/extensions/unslider.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/weather-icons/climacons.min.css') }}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/app.css') }}">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/core/menu/menu-types/vertical-compact-menu.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/core/colors/palette-gradient.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/core/colors/palette-climacon.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/pages/users.css') }}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/style.css') }}">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">
    
    @include('_admin._templates.header')
    @include('_admin._templates.sidebar')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                @yield('breadcrumbs')
            </div>
            <div class="content-body">
                @yield('body')
            </div>
        </div>
    </div>

    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; {{ date('Y') }} <a class="text-bold-800 grey darken-2" href="#"
        target="_blank">BEE TECH </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
    </footer>
    <!-- BEGIN VENDOR JS-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendors/css/extensions/toastr.css')}}">
    <script src="{{ URL::asset('admin/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{URL::asset('admin/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('admin/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/additional/confirmDialog.js')}}" type="text/javascript"></script> 
    <script src="{{URL::asset('js/additional/leftToastr.js')}}" type="text/javascript"></script> 
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ URL::asset('admin/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->

    @yield('additionalScripts')

</body>
</html>