var Table;
var _URL = [];
_URL['index'] = $("#url-api-events").text();
_URL['generate_nametag'] = $("#url-api-nametags-generate").text();
_URL['generate_certificate'] = $("#url-api-certificates-generate").text();
_URL['delete'] = $("#form-delete").attr('action');
_URL['update'] = $("#form-update").attr('action');
_URL['print'] = $("#print_date").attr('href');

var current_id = null;

$("#print_date").attr({'href' : '#'});
$("#print_date").attr({'target' : ''});
$(".rm").remove();

var SimpleCrypt = require('../../plugin/crypto');

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
        {data: 'status', name: 'status', searchable: false},
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

window._delete = function(e){
	let data = Table.row($(e).parents('tr')).data();
	_confirm(0, function(){
		$("#form-delete").attr({'action' : _URL.delete.replace('/0', '/'+data.id)});
		$("#button-delete").click();
	});
}
window._edit = function(e){
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

window._triger = function(e){
	$( e.parentNode.parentNode ).find("[type=file]").click();
}
window.previewFile = function(e) {
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

			if(participants.length == 0){
				_leftAlert('Info', 'Belum ada peserta yang terdaftar', 'info');
				$("#generate-nametag").modal('toggle');
				return;
			}

			s_count = 0;
			$("#fetch-init").hide();
			$("#fetch-progress").show();

			let download = participants.length == 1 ;
			$("#generate-nametag-caption-from").text("1");
			$("#generate-nametag-caption-to").text(participants.length);
			generate_nametags({event_id : params.event_id, participant_id : participants[s_count], download : download});
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

window._nametags = function(){
	$("#detail-event").modal('toggle');
	$("#proses-caption").text("Generate Name Tag Progress");
	$("#generate-nametag").modal({
		show : true, backdrop: 'static', keyboard: false
	});	
	$("#fetch-init").show();
	$("#fetch-progress").hide();

	generate_nametags({event_id : current_id, get_participants : true});
}

function generate_certificates(params){
	$.post(_URL.generate_certificate,params
	,function(data){
		if(data.flag == '1'){
			participants = data.participants;

			if(participants.length == 0){
				_leftAlert('Info', 'Belum ada peserta yang terdaftar', 'info');
				$("#generate-nametag").modal('toggle');
				return;
			}

			s_count = 0;
			$("#fetch-init").hide();
			$("#fetch-progress").show();

			$("#generate-nametag-caption-from").text("1");
			$("#generate-nametag-caption-to").text(participants.length);
			generate_certificates({event_id : params.event_id, participant_id : participants[s_count]});
		} else {
			s_count++;
			$("#generate-nametag-caption-from").text(s_count+1);

			if(s_count == participants.length) {
				$("#generate-nametag").modal('toggle');	
				_leftAlert('Berhasil', 'E-Sertifikat berhasil dikirim ke peserta pada acara terpilih.', 'success');			
				return;
			}

			generate_certificates({event_id : params.event_id, participant_id : participants[s_count]});
		}
	});	
}

window._certificates = function(){
	$("#detail-event").modal('toggle');
	$("#proses-caption").text("Sending E-Certificate Progress");
	$("#generate-nametag").modal({
		show : true, backdrop: 'static', keyboard: false
	});	
	$("#fetch-init").show();
	$("#fetch-progress").hide();

	generate_certificates({event_id : current_id, get_participants : true});
}

function get_normal_date(date){
	let z = date.split('-');
	let mn = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	return z[2]+' '+mn[ Number(z[1]) -1 ]+' '+z[0];
}

window._detail = function(e){
	let data = Table.row($(e).parents('tr')).data();
	current_id = data.id;

	$("#detail-event").find('[name=name]').val(data.name);
	$("#detail-event").find('[name=type]').val(data.type == '1' ? 'Umum' : 'In House');
	$("#detail-event").find('[name=started_date]').val(get_normal_date(data.started_date));
	$("#detail-event").find('[name=ended_date]').val(get_normal_date(data.ended_date));
	$("#detail-event").find('[name=place]').val(data.place);
	$("#detail-event").find('[name=description]').val(data.description);
	$("#detail-event").find('[name=agency]').val(data.agency);
	$("#detail-event").find("[name=participant]").val(data._participant_count);
	$("#detail-image").attr({'src' : data.image});
	$("#detail-event").attr({'action' : _URL.delete.replace('/0', '/'+data.id)});

	$("#detail-event").modal({show : true});	
}

window.setPreference = function(){
	// SimpleCrypt
	if( $('#started_date_d').val() == '' || $('#ended_date_d').val() == '' ){
		$("#print_date").attr({'href' : '#'});
		$("#print_date").attr({'target' : ''});		
	} else {
		let str = JSON.stringify({started_date : $('#started_date_d').val(), ended_date : $('#ended_date_d').val()});
		
		$("#print_date").attr({'href' : _URL.print+'/'+SimpleCrypt.cypt.encrypt(str)});
		
		$("#print_date").attr({'target' : 'blank'});	
	}
}