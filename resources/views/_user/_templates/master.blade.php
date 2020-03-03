<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('user/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ URL::asset('user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('user/css/aos.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('user/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('user/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ URL::asset('user/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/style.css') }}">
  </head>
  <body class="goto-here">
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/">BMS Event</a>

	    </div>
	  </nav>
    <!-- END nav -->

    @yield('header')
    
    @yield('body')
    

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">BMS Global</h2>
              <p>BMS Global bergerak dalam bidang Pengembangan Sumber Daya Manusia dengan pengalaman lebih dari 11 tahun di bidang pelatihan dan pendidikan tingkat Regional dan Nasional. Kami dipercaya oleh puluhan lembaga pendidikan, pemerintahan dan perusahaan nasional tersebar di seluruh indonesia dengan ratusan ribu alumni pelatihan.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://www.facebook.com/bmsglobaltrainingconsulting/"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/bmsglobal_training_consulting/"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Contact Us</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jalan PHH. Mustofa No.39, KP Surapati Core Blok F17, Pasirlayung, Cibeunying Kidul, Kota Bandung, Jawa Bart 40192</span></li>
	                <li><span class="icon icon-phone"></span><span class="text">0822-1415-6822 (Sitha) // 0822-1415-6798 // 0812-2196-253 // 08127913223 // (022) 71520511</span></li>
	                <li><span class="icon icon-envelope"></span><span class="text">info@bmsglobal.co.id</span></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ URL::asset('user/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('user/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ URL::asset('user/js/popper.min.js') }}"></script>
  <script src="{{ URL::asset('user/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('user/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ URL::asset('user/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ URL::asset('user/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ URL::asset('user/js/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('user/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ URL::asset('user/js/aos.js') }}"></script>
  <script src="{{ URL::asset('user/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ URL::asset('user/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('user/js/scrollax.min.js') }}"></script>
  <script src="{{ URL::asset('user/js/main.js?').uniqid() }}"></script>

  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendors/css/extensions/toastr.css')}}">
  <script src="{{URL::asset('admin/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('js/additional/leftToastr.js')}}" type="text/javascript"></script> 

  @yield('additionalScripts')
    
  </body>
</html>