<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="{{ URL::asset('user/image/png') }}">
        <title>@yield('title')</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ URL::asset('user/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/vendors/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/vendors/animate-css/animate.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/vendors/jquery-ui/jquery-ui.css') }}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ URL::asset('user/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/css/responsive.css') }}">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="logo_part">
            	<div class="container">
            		<div class="float-left">
						<a class="logo" href="#"><img src="{{ URL::asset('user/img/logo.png') }}" alt=""></a>
					</div>
            	</div>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->

        @yield('header')

        <!--================End Home Banner Area =================-->
        
        @yield('body')
        
        <!--================ start footer Area  =================-->	
        <footer class="footer-area">
            <div class="container">
                <div class="row f_widgets_inner">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget ab_widgets">
                           <img src="img/footer-logo.png" alt=""> 
                           <p>Technology and gadgets Adapter (MPA) is our favorite iPhone solution, since it lets you use the headphones you’re most comfortable with. It has an iPhone-compatible jack at one end and a microphone module with an Answer/End/Pause button and a female 3.5mm audio jack for connectingheadphones</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <div class="f_title">
                            	<h3>Quick Links</h3>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <ul class="list">
                                        <li><a href="#">Sitemaps</a></li>
                                        <li><a href="#">Categories</a></li>
                                        <li><a href="#">Archives</a></li>
                                        <li><a href="#">Advertise</a></li>
                                        <li><a href="#">Ad Choice</a></li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="list">
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms of Use</a></li>
                                        <li><a href="#">Help Center</a></li>
                                        <li><a href="#">Newsletters</a></li>
                                        <li><a href="#">Feedback</a></li>
                                    </ul>
                                </div>										
                            </div>							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget m_news_widgets">
                            <div class="f_title">
                            	<h3>Most Viewed News</h3>
                            </div>
                            <div class="m_news">
                            	<div class="media">
                            		<div class="d-flex">
                            			<img src="img/product/product-13.jpg" alt="">
                            		</div>
                            		<div class="media-body">
                            			<a href="#"><h4>Converter Ipod Video Taking Portable Video Viewing To A Whole Level</h4></a>
                            			<div class="date">
											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
										</div>
                            		</div>
                            	</div>
                            	<div class="media">
                            		<div class="d-flex">
                            			<img src="img/product/product-14.jpg" alt="">
                            		</div>
                            		<div class="media-body">
                            			<a href="#"><h4>Sony Laptops Are Still Part Of The Sony Family</h4></a>
                            			<div class="date">
											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
										</div>
                            		</div>
                            	</div>
                            </div>
                        </div>
                    </div>	
                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                   	<div class="col-lg-12">
                   		<div class="f_boder"></div>
                   	</div>
                    <p class="col-lg-8 col-md-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-md-4 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ URL::asset('user/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ URL::asset('user/js/popper.js') }}"></script>
        <script src="{{ URL::asset('user/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('user/js/stellar.js') }}"></script>
        <script src="{{ URL::asset('user/vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ URL::asset('user/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ URL::asset('user/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ URL::asset('user/vendors/isotope/isotope-min.js') }}"></script>
        <script src="{{ URL::asset('user/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ URL::asset('user/vendors/jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ URL::asset('user/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ URL::asset('user/js/mail-script.js') }}"></script>
        <script src="{{ URL::asset('user/js/theme.js') }}"></script>



        @yield('additionalScripts')

    </body>
</html>