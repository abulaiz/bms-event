@if( $row->attendance_at == null  )
	@if((int)$status == 1)
	<!-- Tidak Hadir -->
	<i data-toggle="tooltip" data-placement="top" data-original-title="Tidak hadir" class="fa fa-lg fa-times danger"></i>
	@else
	<!-- Belum Hadir -->
	<i data-toggle="tooltip" data-placement="top" data-original-title="Belum hadir" class="fa fa-lg fa-clock-o primary"></i>
	@endif
@else
<!-- Hadir -->
<i data-toggle="tooltip" data-placement="top" data-original-title="Hadir" class="fa fa-lg fa-check success"></i>
@endif