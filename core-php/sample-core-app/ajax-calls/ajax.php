<?php 
/*
* Created at 8/10/2015
* File Used to getting ajax call inforamtion
*/
  require_once '../includes/define_var.php';
  require_once('../classess/class.address.php');
  /**
  * function to save data
  */
	if(isset($_REQUEST)) {
		try {
			$s_street = isset($_REQUEST['txtStreet'])? $_REQUEST['txtStreet'] :'';
			$s_city   = isset($_REQUEST['txtCity'])? $_REQUEST['txtCity'] :'';
			$s_state  = isset($_REQUEST['txtState'])? $_REQUEST['txtState'] :'';
			$i_zip    = 0;
			
			$address            = new Address();
			$address->s_api_key = GOOGLE_API_KEY;
			$address->s_api_url = GOOGLE_API_URL;
			
			$address->s_street = $s_street;
			$address->s_city   = $s_city;
			$address->s_state  = $s_state;
			$a_response        = $address->getZipCode();
			if(!empty($a_response) && $a_response['status'] == 'success') {
				$address->i_zip = $a_response['data'];
			} else {
				throw new Exception("Invalid address", 1);
			}
			
			$a_result       = $address->save();
			
			/* Get all addresses */
			$a_addresses = $address->get();
			$a_response = array(
                'status' => 'success',
                'data'   => $a_addresses,
            );

		} catch (Exception $e) {
			$s_message = $e->getMessage();
			if (stristr($s_message, 'unique_index')) {
				$s_message = "Address already exist.";
			} else {
				$s_message = "Invalid address.";
			}
			
			$a_response = array(
				'status' => 'error',
				'data'   => $s_message,
			);
        }
        echo json_encode($a_response);die;
	}
  
?>
