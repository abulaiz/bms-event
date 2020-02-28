@if($status == 1)
	<div class="badge badge-warning"><a target="blank" href="">Cooming Soon</a></div>
@elseif($status == 2)
	<div class="badge badge-success">Berlangsung</div>
@else 
	<div class="badge badge-secondary">Selesai</span>
@endif