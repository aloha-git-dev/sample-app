/**
* Javascript File to use for common functions which are used in all files
*/
jQuery(document).ready(function($){  
	
	/**
	* Function to display the message on screen
	* @param -
	* strElementId - object of Element Id
	* strMessage - string message
	* @return - null
	*/
	displayMessage = function( strElementId, strMessage) {
		var strDisplayMessage = '';
		strDisplayMessage     += strMessage;
		$('#'+strElementId).html(strDisplayMessage);
		$('#'+strElementId).removeClass('hide');

		/* set timeout ot show message on screen for seconds */
		window.setTimeout(function(){ 
	 		$(".alert-warning , .alert-success").addClass('hide',3000); 
		}, 3000);		
	}

	/**
	* Function to clear message
	* @param 	strElementId   - Element Id
	* @return - null
	*/
	clearMessage = function(strElementId) {
		$('#'+strElementId).html('');
		$('#'+strElementId).addClass('hide');
	}    
}); 
