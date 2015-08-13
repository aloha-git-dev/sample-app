/* 
* Javascript File usefuel to get zip from address using ajax
*/
jQuery(document).ready(function($){  
	$("#formCreate").validate();

	/* dataTable initialze */	
	var table = $('#table_info').DataTable();
	var s_search = ' ';

	/* 
	* Function call after submitting the address form 
	* @params - null
	* @ returns - null
	*/
	$(document).on('submit','#formCreate',function(event){
		var s_site_url   = $('#site_url').val();
		var a_input      = $("#formCreate").serialize();
		var s_source_url = s_site_url + "/ajax-calls/ajax.php";
		$.ajax({
			type: 'GET',
			url: s_source_url,
			dataType: 'json',
			data: a_input,
			success: function(response) {
				if(response.status == 'success') {
					var s_rows = "";
					table.clear();
					$.each(response.data, function(index, row) {						
						table.row.add( [
				            row.s_street,
				            row.s_city,
				            row.s_state,
				            row.i_zip
				        ] );

					});
					table.draw();
					table.search(s_search).draw();
					displayMessage('address_success_alert','Record Addedd Successfully.');
					$('#addForm').modal('hide');
					$('#overlay').remove();
					

				} else {
					 displayMessage('address_error_alert',response.data);
					 $('#overlay').remove();
				} 

			},
			error: function() {
				// displayMessage('member_level_error_alert','Member Level not found');
			}
		});

		event.preventDefault();
	});

	$(document).keyup(function(e) {
        if (e.which === 27) {
            $('#overlay').remove();
        }
    });
}); 
