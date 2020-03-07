<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 

<style type="text/css">
	body{
		font-family: "Roboto", Arial, Helvetica, sans-serif;
	}
</style>

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
		$sds = $sd['D'].' '.$sd['M'].' '.$sd['Y'].'-';
	} elseif( $sd['M'] != $ed['M'] ){
		$sds = $sd['D'].' '.$sd['M'].'-';
	} elseif( $sd['D'] != $ed['D'] ){
		$sds = $sd['D'].'-';
	}

	$eds = $ed['D'].' '.$ed['M'].' '.$ed['Y'];
@endphp

<body>
	<img src="{{ URL::asset('img/logo_bms.png') }}" style="height: 160px; margin-top: 10px;">
	<div style="text-align: center; font-weight: bold; max-width: 650px; position: absolute; top: 1px; left: 200px;">
	<p style="font-size: 30px; font-family: 'latobold';">{{ $event->name }}</p>
	<small style="font-size: 20px;">{{ $event->place }} {{ $sds }}{{ $eds }}</small>	
	</div>

	<div style="position: absolute; top: 240px; left: 0px; text-align: center; ">
		<h1 style="font-size: 68px;">{{ $participant->full_name }}</h1>	
	</div>

	<div style="text-align: center; font-weight: bold; position: absolute; top: 500px; left: 0px;">
	<p style="font-size: 30px; font-family: 'latobold';">BMS GLOBAL TRAINING & CONSULTING</p>
	<small style="font-size: 20px;">www.bmsglobal.co.id</small>	
	</div>	
</body>