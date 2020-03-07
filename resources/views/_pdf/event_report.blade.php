<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 

@php
	$i = 1;
    function get_day($arr){
        $s = $arr[2];
        if( (int)$s < 10 )
            $s = $s[1];
        return $s;
    }

    function get_date($event){
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
        return $sds.$eds;
    }

@endphp

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
<h2 style="text-align: center;">Laporan Data Event</h2>
<table id="customers">
	<thead>
	  <tr>
	    <th>No</th>
	    <th>Nama Acara</th>
	    <th>Tanggal</th>
	    <th>Tempat</th>
	    <th>Jumlah Pendaftar</th>
	    <th>Jumlah Peserta yang hadir</th>
	  </tr>	
	</thead>	
	<tbody>
		@foreach($data as $item)
			<tr>
				<td style="text-align: center;">{{ $i++ }}</td>
				<td>{{ $item->name }}</td>
				<td>{{ get_date($item) }}</td>
				<td>{{ $item->place }}</td>
				<td style="text-align: center;">{{ count($item->participants) }}</td>
				<td style="text-align: center;">{{ $item->participants()->whereHas('attendances')->count() }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

</body>