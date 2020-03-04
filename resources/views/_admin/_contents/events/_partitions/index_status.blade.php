@if($row->status == 2)
	<div class="badge badge-warning"><a target="blank" href="{{ route('event.register', $row->type == 1 ? $row->id : $row->flag ) }}">Cooming Soon</a></div>
@elseif($row->status == 1)
	<div class="badge badge-success">Berlangsung</div>
@else 
	<div class="badge badge-secondary">Selesai</span>
@endif