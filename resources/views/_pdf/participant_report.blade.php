<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 

@php 
	$i = 1;
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
<h2 style="text-align: center;">Laporan Peserta Acara {{ $event_name }}</h2>

<table id="customers">
	<thead>
	  <tr>
	    <th>No</th>
	    <th>Nama Lengkap</th>
	    <th>No Tlp</th>
	    <th>Email</th>
	    <th>Instansi</th>
	    <th>Kehadiran</th>
	  </tr>	
	</thead>	
	<tbody>
		@foreach($data as $item)
			<tr>
				<td style="text-align: center;">{{ $i++ }}</td>
				<td>{{ $item->full_name }}</td>
				<td>{{ $item->phone }}</td>
				<td>{{ $item->email }}</td>
				<td>{{ $item->job->agency }}</td>
				<td style="text-align: center;">{{ $item->attendances()->count() > 0 ? "Hadir" : "Tidak Hadir" }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

</body>