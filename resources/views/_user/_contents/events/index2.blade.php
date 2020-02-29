@extends('_user._templates.master')
@section('title', 'Event | BMS')

@section('header')
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
			<div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	            	<ol class="carousel-indicators">
	            		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	            		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	            		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	            	</ol>
	            	<div class="carousel-inner">
	            		<div class="carousel-item active">
	            			<div class="banner_content text-center">
	            				<div class="date">
	            					<a class="gad_btn" href="#">Gadgets</a>
	            					<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
	            					<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
	            				</div>
	            				<h3>Nest Protect: 2nd Gen Smoke + CO Alarm</h3>
	            				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
	            			</div>
	            		</div>
	            		<div class="carousel-item">
	            			<div class="banner_content text-center">
	            				<div class="date">
	            					<a class="gad_btn" href="#">Gadgets</a>
	            					<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
	            					<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
	            				</div>
	            				<h3>Nest Protect: 2nd Gen Smoke + CO Alarm</h3>
	            				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
	            			</div>
	            		</div>
	            		<div class="carousel-item">
	            			<div class="banner_content text-center">
	            				<div class="date">
	            					<a class="gad_btn" href="#">Gadgets</a>
	            					<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
	            					<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
	            				</div>
	            				<h3>Nest Protect: 2nd Gen Smoke + CO Alarm</h3>
	            				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
        </div>
    </section>
@endsection

@section('body')
    <!--================Choice Area =================-->
    <section class="choice_area p_120">
        	<div class="container">
        		<div class="main_title2">
        			<h2>Event Kami</h2>
        		</div>
        		<div class="row choice_inner">
        			<div class="col-lg-3 col-md-6">
        				<div class="choice_item">
        					<img class="img-fluid" src="{{ URL::asset('user/img/blog/choice/choice-1.jpg') }}" alt="">
        					<div class="choice_text">
        						<div class="date">
        							<!-- <a class="gad_btn" href="#">Gadgets</a> -->
									<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
									<a href="#" class="float-right"><i class="fa fa-map-pin" aria-hidden="true"></i>Bandung</a>
        						</div>
        						<a href="news-details.html"><h4>Pelatihan Pernikahan</h4></a>
        						<p>KUA Kecamatan Banjaran</p>
                                <a href="{{ route('register') }}" class="gad_btn float-right" href="#">Daftar</a>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6">
        				<div class="choice_item">
        					<img class="img-fluid" src="{{ URL::asset('user/img/blog/choice/choice-1.jpg') }}" alt="">
        					<div class="choice_text">
        						<div class="date">
									<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
									<a href="#" class="float-right"><i class="fa fa-map-pin" aria-hidden="true"></i>Bandung</a>
        						</div>
        						<a href="news-details.html"><h4>Pelatihan Pernikahan</h4></a>
        						<p>KUA Kecamatan Banjaran</p>
                                <a href="{{ route('register') }}" class="gad_btn float-right" href="#">Daftar</a>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6">
        				<div class="choice_item">
        					<img class="img-fluid" src="{{ URL::asset('user/img/blog/choice/choice-1.jpg') }}" alt="">
        					<div class="choice_text">
        						<div class="date">
									<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
									<a href="#" class="float-right"><i class="fa fa-map-pin" aria-hidden="true"></i>Bandung</a>
        						</div>
        						<a href="news-details.html"><h4>Pelatihan Pernikahan</h4></a>
        						<p>KUA Kecamatan Banjaran</p>
                                <a href="{{ route('register') }}" class="gad_btn float-right" href="#">Daftar</a>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6">
        				<div class="choice_item">
        					<img class="img-fluid" src="{{ URL::asset('user/img/blog/choice/choice-1.jpg') }}" alt="">
        					<div class="choice_text">
        						<div class="date">
									<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
									<a href="#" class="float-right"><i class="fa fa-map-pin" aria-hidden="true"></i>Bandung</a>
        						</div>
        						<a href="news-details.html"><h4>Pelatihan Pernikahan</h4></a>
        						<p>KUA Kecamatan Banjaran</p>
                                <a href="{{ route('register') }}" class="gad_btn float-right" href="#">Daftar</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Choice Area =================-->
@endsection