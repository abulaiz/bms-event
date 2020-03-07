@if($event->status == '1')

	@if($row->attendances()->count() > 0)
		<i data-toggle="tooltip" data-placement="top" data-original-title="Hadir" class="fa fa-lg fa-check success"></i>
	@else
		<i data-toggle="tooltip" data-placement="top" data-original-title="Tidak hadir" class="fa fa-lg fa-times danger"></i>
	@endif

@elseif($event->status == '3')
	
	@if( ($row->attendances()->count() == (2*$event->attendance_count)) && $event->attendance_count != 0 )
		<i data-toggle="tooltip" data-placement="top" data-original-title="Hadir" class="fa fa-lg fa-check success"></i>
	@elseif($row->attendances()->count() == 0)
		<i data-toggle="tooltip" data-placement="top" data-original-title="Tidak hadir" class="fa fa-lg fa-times danger"></i>
	@else
		@php
			$percentage = $row->attendances()->count() / (2*$event->attendance_count);
			$percentage *= 100;
			$color_stat = ['danger', 'info', 'success'];
		@endphp
		<span class="text-{{ $color_stat[ floor($percentage / 30)-1 ] }}">{{ floor($percentage) }}%</span>
	@endif

@else
	-
@endif