var _URL = [];
_URL['events'] = $("#url-api-event-list").text();
_URL['participant'] = $("#url-api-participant-index").text();
$(".rm").remove();

var selectizes = $('.selectizes').selectize();
var s = selectizes[0].selectize;

var Table = null;
var statuses = [];

function getOptions(status, id){
	let colomnDefs = [{ targets : 5, className : 'text-center' }];
	if(Number(status) != 2)
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
	$("#table-card").css('opacity', '1');
});