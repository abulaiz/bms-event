<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
<style>
	body{
		font-family: "Roboto", Arial, Helvetica, sans-serif;	
		font-size: 12px;
	}
	#customers {
	  border-collapse: collapse;
	  width: 100%;
	}

	#customers td, #customers th {
	  border: 1px solid #ddd;
	  padding: 8px;
	}

	#customers tr:nth-child(even){background-color: #f2f2f2;}

	#customers tr:hover {background-color: #ddd;}

	#customers th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align: left;
	  background-color: #31adbc;
	  color: white;
	}
</style>
</head>
<body>
<h2 style="text-align: center;">Laporan Kehadiran Acara {{ $event->name }}</h2>

@php
	$name_length = 25;
	if($event->attendance_count > 4)
		$name_length = 20;
	elseif($event->attendance_count == 1)
		$name_length = 50;
	
@endphp

@if($event->attendance_count > 0)
<table id="customers">
	<thead>
	  <tr>
	    <th style="text-align: center;" rowspan="2" width="{{ $name_length }}%">Nama</th>
	    <th style="text-align: center;" colspan="{{ $event->attendance_count }}" >Tanggal</th>
	  </tr>	
	  <tr>
	  	@for($x = $event->attendance_count-1; $x >= 0; $x--)
	  	<th style="text-align: center;">{{ date('j M', strtotime($event->last_attendance."-$x day")) }}</th>
	  	@endfor
	  </tr>
	</thead>	
	<tbody>
		@foreach($data as $item)
			<tr>
				<td>{{ $item->full_name }}</td>
			  	@for($x = $event->attendance_count-1; $x >= 0; $x--)
			  	<td style="text-align: center;">
			  		@if( count($item->attendances) > 0 )
			  		{{ substr($item->attendances[0]->created_at, 11, 5) }} 
			  		@endif
			  		- 
			  		@if( count($item->attendances) > 1 )
			  		{{ substr($item->attendances[1]->created_at, 11, 5) }}
			  		@endif
			  	</td>
			  	@endfor				
			</tr>
		@endforeach
	</tbody>
</table>
@endif
</body>