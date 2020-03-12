var _URL = [];
_URL['events'] = $("#url-api-event-list").text();
_URL['participant'] = $("#url-api-participant-index").text();
_URL['delete'] = $("#url-api-participant-delete").text();
_URL['show_nametag'] = $("#url-nametag-show").text();
_URL['send_certificate'] = $("#url-api-certicicate-send").text();
_URL['participant_report'] = $("#url-report-participant").text();
_URL['participant_attendance_report'] = $("#url-report-participant-attendance").text();
$(".rm").remove();

var selectizes = $('.selectizes').selectize();
var s = selectizes[0].selectize;

var Table = null;
var statuses = [];
var event_statuses = ['Berlangsung', 'Cooming Soon', 'Selesai'];

function getOptions(status, id){
	$("#event-status-caption").text( event_statuses[ Number(status)-1 ] );
	let colomnDefs = [{ targets : 5, className : 'text-center' }];
	if(Number(status) == 2)
		colomnDefs.push({targets : [5], visible : false});
	return {
	    processing: true,
	    serverSide: true,
	    ajax: _URL.participant.replace('/0', '/'+id),
	    columns: [
	        {data: 'full_name', name: 'full_name'},
	        {data: 'phone', name: 'phone'},
	        {data: 'email', name: 'email'},
	        {data: 'job.agency', name: 'job.agency'},
	        {data: 'job.position', name: 'job.position'},
	        {data: 'status', name: 'status', orderable: false, searchable: false},
	        {data: 'action', name: 'action', orderable: false, searchable: false}
	    ],    
	    columnDefs : colomnDefs,
	    "fnDrawCallback": function( oSettings ) {
	     	$(".dropdown-trigger").dropdown();
			$('[data-toggle="tooltip"]').tooltip({
			    container:'body'
			});	      
	    }     			
	};
}

$.ajax({url : _URL.events, 
	success : function(data){
		for(let i = 0; i < data.length; i++){
			s.addOption({value : data[i].id, text : data[i].name});
			statuses['s_'+data[i].id] = data[i].status;
		}
		$("#table-loader").hide();
	}
});

s.on('change', function(){
	if(s.items.length == 0) return;


	if( Table != null ){
		Table.destroy();
	} else {
		$("#removed-info").remove();
	}

	Table = $('#datatable').DataTable(getOptions( statuses['s_'+s.items[0]], s.items[0] ));

	$("#participant_list_report_btn").attr({'href' : _URL.participant_report.replace('/0', '/'+s.items[0])});
	$("#participant_attendance_report_btn").attr({'href' : _URL.participant_attendance_report.replace('/0', '/'+s.items[0])});
	
	$("#table-card").css('opacity', '1');
});

function _delete(e){
	let data = Table.row($(e).parents('tr')).data();
	_confirm(0, function(){
		$.post(_URL.delete,{
			id : data.id
		}
		,function(data){
			if(data.success){
				_leftAlert('Berhasil', 'Data Peserta berhasil dihapus', 'info');
				Table.ajax.reload();
			} else {
				_leftAlert('Mohon maaf', 'Silahkan muat ulang, terjadi kesalahan sistem', 'error');
			}
		});			
	});	
}

function generate_id(e){
	let data = Table.row($(e).parents('tr')).data();
	window.open(_URL.show_nametag.replace('/0', '/'+data.id) , '_blank')
}

var on_send_mail = false;
function send_certificate(e){
	on_send_mail = true;
	 _leftAlert('Info', 'Sedang memproses ...', 'info');
	 	setTimeout(function(){
	 		if(on_send_mail)
	 			_leftAlert('Info', 'Mohon tunggu ...', 'info', false);
	 }, 5000);

	let data = Table.row($(e).parents('tr')).data();
	$.ajax({url : _URL.send_certificate.replace('/0', '/' + data.id), 
		success : function(data){
			on_send_mail = false;
			if(data.success){
				_leftAlert('Berhasil', 'E-Sertifikat berhasil dikirim', 'success');
				Table.ajax.reload();
			} else {
				_leftAlert('Mohon maaf', 'Silahkan muat ulang, terjadi kesalahan sistem', 'error');
			}
		}
	});	
}

function get_normal_date(date){
	let z = date.split('-');
	let mn = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	return z[2]+' '+mn[ Number(z[1]) -1 ]+' '+z[0];
}

function get_unknown_index_data(data, index){
	if( data == null )
		return '-';
	if( data[index] == null )
		return '-';
	return data[index];
}

function _detail(e){
	let data = Table.row($(e).parents('tr')).data();

	$("#detail-peserta").find("[name=full_name]").val( data.full_name );
	$("#detail-peserta").find("[name=nick_name]").val( data.nick_name );
	$("#detail-peserta").find("[name=address]").val( data.address );
	$("#detail-peserta").find("[name=place_of_birth]").val( data.place_of_birth );
	$("#detail-peserta").find("[name=date_of_birth]").val( get_normal_date(data.date_of_birth) );
	$("#detail-peserta").find("[name=phone]").val( data.phone );
	$("#detail-peserta").find("[name=email]").val( data.email );
	$("#detail-peserta").find("[name=instagram]").val( data.instagram );
	$("#detail-peserta").find("[name=twitter]").val( data.twitter );
	$("#detail-peserta").find("[name=facebook]").val( data.facebook );

	$("#detail-peserta").find("[name=agency]").val( get_unknown_index_data(data.job, 'agency') );
	$("#detail-peserta").find("[name=position]").val( get_unknown_index_data(data.job, 'position') );
	$("#detail-peserta").find("[name=years_of_service]").val( get_unknown_index_data(data.job, 'years_of_service') );

	$("#detail-peserta").find("[name=university]").val( get_unknown_index_data(data.education, 'university') );
	$("#detail-peserta").find("[name=faculty]").val( get_unknown_index_data(data.education, 'faculty') );
	$("#detail-peserta").find("[name=study_program]").val( get_unknown_index_data(data.education, 'study_program') );
	$("#detail-peserta").find("[name=generation]").val( get_unknown_index_data(data.education, 'generation') );
	$("#detail-peserta").find("[name=level]").val( get_unknown_index_data(data.education, 'level') );


	$("#detail-peserta").find("[name=strength]").val( data.personality.strength );
	$("#detail-peserta").find("[name=weakness]").val( data.personality.weakness );
	$("#detail-peserta").find("[name=opportunity]").val( data.personality.opportunity );
	$("#detail-peserta").find("[name=challenge]").val( data.personality.challenge );
	$("#detail-peserta").find("[name=short_story]").val( data.personality.short_story );
	$("#detail-peserta").find("[name=hope_in_life]").val( data.personality.hope_in_life );
	$("#detail-peserta").find("[name=hope_in_training]").val( data.personality.hope_in_training );


	$("#detail-peserta").modal({show : true});		
}