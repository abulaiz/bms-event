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
<section class="ftco-section bg-light" id="event_list">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center">
            <h2 class="mb-4">Event Kami</h2>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 mb-4">
    				<input type="text" v-model="filter" class="form-control" placeholder="Cari nama acara" style="border-radius: 40px; padding-left: 20px;">
    			</div>
    			<div class="col-md-12" v-show="events.length == 0 && !onloading && !onkeyup">
    				<p><center>@{{ filter == '' ? 'Belum ada data event' : 'Event yang dicari tidak ditemukan' }}</center></p>
    			</div>
    			<div class="col-md-12" v-show="onloading">
    				<p><center>Sedang memproses ....</center></p>
    			</div>    			
    			<div v-show="!onloading" class="col-sm-12 col-md-6 col-lg-3 d-flex" v-for="item in events">
    				<div class="product d-flex flex-column">
    					<a href="javascript:void" class="img-prod"><img class="img-fluid" v-bind:src="item.image" alt="Poster">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span>@{{ item.place }}</span>
		    					</div>
	    					</div>
    						<h3><a href="#">@{{ item.name }}</a></h3>
    						<div class="pricing">
	    						<p class="price"><span>@{{ item.agency }}</span></p>
	    					</div>
							<div class="d-flex">
    							<div class="cat">
		    						<span>@{{ the_date(item.started_date, item.ended_date) }}</span>
		    					</div>
	    					</div>
	    					<p class="bottom-area d-flex px-3">
    							<a href="javascript:void(0);" @click="register(item.id)" class="add-to-cart text-center py-2 mr-1"><span>Daftar</span></a>
    							<a href="javascript:void(0);" @click="detail(item.id)" class="buy-now text-center py-2">Detail</a>
    						</p>
    					</div>
    				</div>
    			</div>
				<div v-show="!onloading" class="col-md-12 text-center" v-show="range.length > 1">
		            <div class="block-27">
		              <ul>
                        <li v-show="current_pos > pagination_div"><a @click="first_paginate_index()" href="#event_list">&lt;&lt;</a></li>
		                <li v-show="current_pos > 1"><a @click="decrease_index()" href="#event_list">&lt;</a></li>
                        <li v-bind:class="idx == current_pos ? 'active' : ''" v-for="idx in range"><a @click="select_pagination_index(idx)" href="#event_list">@{{ idx }}</a></li>
                        <li v-show="current_pos < pagination_count"><a @click="increase_index()" href="#event_list">&gt;</a></li>
		                <li v-show="current_pos < pagination_count - pagination_div"><a @click="last_paginate_index()" href="#event_list">&gt;&gt;</a></li>
		              </ul>
		            </div>
		        </div>
    		</div>
    	</div>
    </section>

    <div class="hidden rm">
        <p id="url-api-event">{{ route('api.event.paginated_list') }}</p>
        <p id="url-event-detail">{{ route('event.detail', '0') }}</p>
        <p id="url-event-register">{{ route('event.register', '0') }}</p>
        <p></p>
    </div>
@endsection

@section('additionalScripts')
    <script type="text/javascript" src="{{ URL::asset('js/view/landing_page/event.js?').uniqid() }}"></script>
@endsection