@extends('_user._templates.master')
@section('title', 'Nama Acara | BMS')

@section('header')
    <div class="hero-wrap hero-bread" style="background-image: url('user/images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Events</span></p>
            <h1 class="mb-0 bread">Save Water Save Life</h1>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('body')
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="{{ URL::asset('user/images/tes.jpg') }}" class="image-popup prod-img-bg"><img src="{{ URL::asset('user/images/tes.jpg') }}" class="img-fluid" alt="Poster"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>Save Water Save Life</h3>
    				<div class="rating d-flex">
						<p class="text-left mr-4">
							<a href="#" class="mr-2">BPBD Kota Bandung</a>
						</p>
						<p class="text-left">
							<a href="#" class="mr-2" style="color: #000;">Bandung Creative Hub</a>
						</p>
					</div>
    				<p class="price"><span>1 - 3 Januari 2020</span></p>
    				<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
					<div class="row mt-4">
          	            <p><a href="{{ route('register') }}" class="btn btn-black py-3 px-5 mr-2">Register</a></p>
    			    </div>
    		    </div>
    	    </div>
    	</div>
    </section>
@endsection