var has_response = false;

$('#form-register').ajaxForm(
{
	 beforeSubmit : function(arr, $form, options){
	 	has_response = false;
	 	_leftAlert('Info', 'Sedang memproses ...', 'info');
	 	setTimeout(function(){
	 		if(!has_response)
	 			_leftAlert('Info', 'Mohon tunggu ...', 'info', false);
	 	}, 3000);

	 },
	success: function(data) {
		if(data.success){
			has_response = true;
			_leftAlert('Berhasil', 'Registrasi telah berhasil', 'success');
			$("#form-container").remove();
			$("#alert-container").show();

			setTimeout(function(){
				let x = document.getElementById('alert-container');
				window.scroll({
				  top: x.offsetTop - 100, 
				  left: 0, 
				  behavior: 'smooth'
				});							
			}, 200);
		} else {
			for(let i = 0; i < data.errors.length; i++){
				_leftAlert('Perhatian !', data.errors[i], 'warning', false);
			}
		}

	}
});

