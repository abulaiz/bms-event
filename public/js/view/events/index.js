var Table;
var _URL = [];
_URL['index'] = $("#url-api-events").text();
_URL['generate_nametag'] = $("#url-api-nametags-generate").text();
_URL['delete'] = $("#form-delete").attr('action');
_URL['update'] = $("#form-update").attr('action');

$(".rm").remove();

$('#form-add').ajaxForm(
{
	success: function(data) {
		if(data.success){
			$("#add-event").modal('toggle');

			$("#form-add").find('[name=name]').val('');
			$("#form-add").find('[name=started_date]').val('');
			$("#form-add").find('[name=ended_date]').val('');
			$("#form-add").find('[name=place]').val('');
			$("#form-add").find('[name=description]').val('');
			$("#form-add").find('[name=agency]').val('');

			_leftAlert('Berhasil', 'Data Event berhasil ditambahkan', 'success');
			Table.ajax.reload();
		} else {
			for(let i = 0; i < data.errors.length; i++){
				_leftAlert('Perhatian !', data.errors[i], 'warning', false);
			}
		}

	}
});

$('#form-delete').ajaxForm(
{
	success: function(data) {
		if(data.success){
			_leftAlert('Berhasil', 'Data Event berhasil dihapus', 'info');
			Table.ajax.reload();
		} else {
			_leftAlert('Mohon maaf', 'Silahkan muat ulang, terjadi kesalahan sistem', 'error');
		}

	}
});

$("#form-update").ajaxForm({
	success: function(data){
		if(data.success){
			_leftAlert('Berhasil', 'Data Event berhasil diperbarui', 'info');
			$("#edit-event").modal('toggle');
			Table.ajax.reload();			
		} else {
			_leftAlert('Mohon maaf', 'Silahkan muat ulang, terjadi kesalahan sistem', 'error');
		}
	}
});

Table = $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: _URL.index,
    columns: [
        {data: 'name', name: 'name'},
        {data: 'place', name: 'place'},
        {data: 'agency', name: 'agency'},
        {data: '_status', name: '_status'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
        {data: 'started_date', name: 'started_date', searchable: false},
    ],    
    columnDefs : [
    	{orderData : [5], targets : [3]},
    	{targets : [5], visible : false}
    ],
    "fnDrawCallback": function( oSettings ) {
      $(".dropdown-trigger").dropdown();
    }     	
});

$('.skin-square input').iCheck({
    checkboxClass: 'icheckbox_square-red',
    radioClass: 'iradio_square-red',
});

function _delete(e){
	let data = Table.row($(e).parents('tr')).data();
	_confirm(0, function(){
		$("#form-delete").attr({'action' : _URL.delete.replace('/0', '/'+data.id)});
		$("#button-delete").click();
	});
}
function _edit(e){
	let data = Table.row($(e).parents('tr')).data();
	$("#form-update").find('[name=name]').val(data.name);
	$("#form-update").find('[name=started_date]').val(data.started_date);
	$("#form-update").find('[name=ended_date]').val(data.ended_date);
	$("#form-update").find('[name=place]').val(data.place);
	$("#form-update").find('[name=description]').val(data.description);
	$("#form-update").find('[name=agency]').val(data.agency);
	$("#edit-event-image").attr({'src' : data.image});
	$("#edit-type-" + (data.type == '1' ? 'umum' : 'private')).iCheck('check');
	$("#form-update").attr({'action' : _URL.delete.replace('/0', '/'+data.id)});

	$("#edit-event").modal({
		show : true, backdrop: 'static', keyboard: false
	});	
}

function _triger(e){
	$( e.parentNode.parentNode ).find("[type=file]").click();
}
function previewFile(e) {
  var preview = e.parentNode.children[0].children[0];
  var file    = e.files[0];

  var reader  = new FileReader();
  reader.onloadend = function () {
    preview.src = reader.result;
  }
  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}

var participants = [];
var s_count = 0;

function generate_nametags(params){
	$.post(_URL.generate_nametag,params
	,function(data){
		if(data.flag == '1'){
			participants = data.participants;
			s_count = 0;
			$("#generate-nametag-fetch").hide();
			$("#generate-nametag-progress").show();

			$("#generate-nametag-caption-from").text("1");
			$("#generate-nametag-caption-to").text(participants.length);
			generate_nametags({event_id : params.event_id, participant_id : participants[s_count]});
		} else if (data.flag == '2'){
			s_count++;
			$("#generate-nametag-caption-from").text(s_count+1);
			let download = s_count == participants.length-1;
			generate_nametags({event_id : params.event_id, participant_id : participants[s_count], download : download});
		} else if (data.flag == '3'){
			window.open(data.download_link, '_blank');
			$("#generate-nametag").modal('toggle');

		}
	});		
}

function _nametags(e){
	$("#generate-nametag").modal({
		show : true, backdrop: 'static', keyboard: false
	});	
	$("#generate-nametag-fetch").show();
	$("#generate-nametag-progress").hide();

	let data = Table.row($(e).parents('tr')).data();
	generate_nametags({event_id : data.id, get_participants : true});
}