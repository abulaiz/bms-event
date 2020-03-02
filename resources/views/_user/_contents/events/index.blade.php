@extends('_user._templates.master')
@section('title', 'Event | BMS')

@section('header')
<section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<div class="horizontal" >
				            <h1 class="mb-4 mt-3" style="color: #fff;">BMS Online Registration</h1>
				            <p class="mb-4" style="color: #fff;">Daftar event BMS secara praktis melalui BMS Online Registration.</p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>
@endsection

@section('body')
<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Event Kami</h2>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="#" class="img-prod"><img class="img-fluid" src="{{ URL::asset('user/images/tes.jpg') }}" alt="Poster">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span>Bandung Creative Hub</span>
		    					</div>
	    					</div>
    						<h3><a href="#">Save Water Save Life</a></h3>
    						<div class="pricing">
	    						<p class="price"><span>BPBD Kota Bandung</span></p>
	    					</div>
							<div class="d-flex">
    							<div class="cat">
		    						<span>1 - 2 Januari 2020</span>
		    					</div>
	    					</div>
	    					<p class="bottom-area d-flex px-3">
    							<a href="{{ route('register') }}" class="add-to-cart text-center py-2 mr-1"><span>Daftar</span></a>
    							<a href="{{ route('detail-event') }}" class="buy-now text-center py-2">Detail</a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="#" class="img-prod"><img class="img-fluid" src="{{ URL::asset('user/images/tes.jpg') }}" alt="Poster">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span>Bandung Creative Hub</span>
		    					</div>
	    					</div>
    						<h3><a href="#">Save Water Save Life</a></h3>
    						<div class="pricing">
	    						<p class="price"><span>BPBD Kota Bandung</span></p>
	    					</div>
							<div class="d-flex">
    							<div class="cat">
		    						<span>1 - 2 Januari 2020</span>
		    					</div>
	    					</div>
	    					<p class="bottom-area d-flex px-3">
								<a href="{{ route('register') }}" class="add-to-cart text-center py-2 mr-1"><span>Daftar</span></a>
    							<a href="{{ route('detail-event') }}" class="buy-now text-center py-2">Detail</a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="#" class="img-prod"><img class="img-fluid" src="{{ URL::asset('user/images/tes.jpg') }}" alt="Poster">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span>Bandung Creative Hub</span>
		    					</div>
	    					</div>
    						<h3><a href="#">Save Water Save Life</a></h3>
    						<div class="pricing">
	    						<p class="price"><span>BPBD Kota Bandung</span></p>
	    					</div>
							<div class="d-flex">
    							<div class="cat">
		    						<span>1 - 2 Januari 2020</span>
		    					</div>
	    					</div>
	    					<p class="bottom-area d-flex px-3">
								<a href="{{ route('register') }}" class="add-to-cart text-center py-2 mr-1"><span>Daftar</span></a>
    							<a href="{{ route('detail-event') }}" class="buy-now text-center py-2">Detail</a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="#" class="img-prod"><img class="img-fluid" src="{{ URL::asset('user/images/tes.jpg') }}" alt="Poster">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span>Bandung Creative Hub</span>
		    					</div>
	    					</div>
    						<h3><a href="#">Save Water Save Life</a></h3>
    						<div class="pricing">
	    						<p class="price"><span>BPBD Kota Bandung</span></p>
	    					</div>
							<div class="d-flex">
    							<div class="cat">
		    						<span>1 - 2 Januari 2020</span>
		    					</div>
	    					</div>
	    					<p class="bottom-area d-flex px-3">
								<a href="{{ route('register') }}" class="add-to-cart text-center py-2 mr-1"><span>Daftar</span></a>
    							<a href="{{ route('detail-event') }}" class="buy-now text-center py-2">Detail</a>
    						</p>
    					</div>
    				</div>
    			</div>

				<div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		        </div>
    		</div>
    	</div>
    </section>
@endsection