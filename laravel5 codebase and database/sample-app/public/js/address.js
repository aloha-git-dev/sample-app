/* 
* Javascript File usefuel to get zip from address using ajax
*/
jQuery(document).ready(function($) {
	$("#formCreate").validate();

	/* dataTable initialze */	
	var table    = $('#table_info').DataTable();
	var strSearch = ' ';

	/* 
	* Function call after submitting the address form 
	* @params - null
	* @ returns - null
	*/
	$(document).on('submit','#formCreate',function(event){
		var arrPostedValues = $("#formCreate").serialize();
		$.ajax({
			type: 'GET',
			url: 'validate-address',
			dataType: 'json',
			data: arrPostedValues,
			success: function(response) {
				if(response.status == 'success') {
					table.clear();
					$.each(response.data, function(index, row) {
						table.row.add( [
							row.street,
							row.city,
							row.state,
							row.zip
						] );

					});
					table.draw();
					displayMessage('address_success_alert','Address successfully added.');
					$('#addForm').modal('hide');					
					$('#formCreate').trigger("reset");
				} else {
					displayMessage('address_error_alert',response.data);
				}
			},
			error: function() {
				// displayMessage('member_level_error_alert','Member Level not found');
			}
		});

		event.preventDefault();
	});
}); 
