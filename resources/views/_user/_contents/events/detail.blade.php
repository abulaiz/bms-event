@extends('_user._templates.master')
@section('title', 'Event | BMS')

@section('header')
    <div class="hero-wrap hero-bread" style="background-image: url({{URL::asset('user/images/bg_6.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Events</span></p>
            <h1 class="mb-0 bread">{{ $event->name }}</h1>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('body')

@php

  function get_day($arr){
    $s = $arr[2];
    if( (int)$s < 10 )
      $s = $s[1];
    return $s;
  }

  $started_dates = explode('-', $event->started_date);
  $ended_dates = explode('-', $event->ended_date);
  $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

  $sd = [
    'D' => get_day($started_dates), 'M' => $months[ (int)$started_dates[1] - 1], 'Y' => $started_dates[0]
  ];

  $ed = [
    'D' => get_day($ended_dates), 'M' => $months[ (int)$ended_dates[1] - 1], 'Y' => $ended_dates[0]
  ];

  $sds = '';
  if( $sd['Y'] != $ed['Y'] ){
    $sds = $sd['D'].' '.$sd['M'].' '.$sd['Y'].' - ';
  } elseif( $sd['M'] != $ed['M'] ){
    $sds = $sd['D'].' '.$sd['M'].' - ';
  } elseif( $sd['D'] != $ed['D'] ){
    $sds = $sd['D'].' - ';
  }

  $eds = $ed['D'].' '.$ed['M'].' '.$ed['Y'];
@endphp

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="{{ URL::asset('user/images/tes.jpg') }}" class="image-popup prod-img-bg"><img src="{{ URL::asset('user/images/tes.jpg') }}" class="img-fluid" alt="Poster"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{ $event->name }}</h3>
    				<div class="rating d-flex">
						<p class="text-left mr-4">
							<a href="#" class="mr-2">{{ $event->agency }}</a>
						</p>
						<p class="text-left">
							<a href="#" class="mr-2" style="color: #000;">{{ $event->place }}</a>
						</p>
					</div>
    				<p class="price"><span>{{ $sds }}{{ $eds }}</span></p>
    				<p>{{ $event->description }}</p>
					<div class="row mt-4">
          	            <p><a href="{{ route('event.register', $event->id) }}" class="btn btn-black py-3 px-5 mr-2">Register</a></p>
    			    </div>
    		    </div>
    	    </div>
    	</div>
    </section>
@endsection