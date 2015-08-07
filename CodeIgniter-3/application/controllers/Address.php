<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {
	
	/**
	 * Function Name : index 
	 * Description   : Index Page for this controller to load Address form.
	 * Created on    : 05-Aug-2015
	 */

  	function __construct() {
  	  	parent :: __construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$this->load->model('Address_model','addressModel');
		$this->load->library('form_validation');
	}

	/**
	 * Function Name : index 
	 * Description   : Index Page for this controller to load Address form.
	 * Created on    : 05-Aug-2015
	 */
	public function index()
	{
		$this->loadCacheData();
		$arrAllAddresses['addressDetials'] = $this->addressModel->getAll();
		$this->load->view('address_grid',$arrAllAddresses);
	}

	/**
	 * Function Name : index 
	 * Description   : Index Page for this controller to load Address form.
	 * Created on    : 05-Aug-2015
	 */
	public function addNewAddress()
	{
		$this->load->view('address_detail');
	}

	/**
	 * Function Name : save 
	 * Description   : To save Address detials.
	 * Created on    : 05-Aug-2015
	 */

	public function save(){
		// Set all field required
		$this->form_validation->set_rules('street', 'Street', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');

	 	if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('address_detail');
            return;
        }

        // Get post parameters
		$arrPostDetials = $this->input->post();		
		$arrAddressDetails['street'] = isset($arrPostDetials['street']) ? $arrPostDetials['street'] : "";
		$arrAddressDetails['city'] = isset($arrPostDetials['city']) ? $arrPostDetials['city'] : "";
		$arrAddressDetails['state'] = isset($arrPostDetials['state']) ? $arrPostDetials['state'] : "" ;
		
		$arrAllAddresses = array();
		$strAddress = $arrAddressDetails['street'] .", ". $arrAddressDetails['city'] .", "	. $arrAddressDetails['state'];
		$intCacheZip = $this->findDetailsFromCache($strAddress);

		if(!$intCacheZip > 0){
			//call google api to get zip.
	        $arrResponse = $this->curlApiCall($strAddress);

	        if(!empty($arrResponse)){
	        	$arrAddressDetails['zip'] = @$arrResponse->results[0]->address_components[6]->long_name;	        	
	        }

	        //Insert new record
	        $intInsert = $this->addressModel->insertAddress($arrAddressDetails);
			if($intInsert > 0){
				$arrAllAddresses['message'] = "Record added successfully.";
			}
			else {
				$arrAllAddresses['message'] = "Error in save.";	
			}
			
		}else{
			$arrAllAddresses['message'] = "Record already present.";			
		}
		//update cache
		$this->loadCacheData();

		// arrAllAddresses Data
		$arrAllAddresses['addressDetials'] = $this->addressModel->getAll();

		//Load list view
		$this->load->view('address_grid',$arrAllAddresses);
	}

	/**
	 * Function Name : curlApiCall 
	 * Description   : get zip address.
	 * Created on    : 05-Aug-2015
	 * @param        : Address Cache Array, Array 
	 * Return 		 : boolean
	 */
	public function curlApiCall($strAddress){

		// Api Parameter
		$arrParam = array(
			'address' => $strAddress,
			'key' => $this->config->item('google_api_key'),
		);		
		//$strURL = "https://maps.googleapis.com/maps/api/geocode/json?".http_build_query($arrParam);
		$strURL = $this->config->item('google_api_url') ."?".http_build_query($arrParam);
		
		//settin CURL to validate the address and get zip
		$objCurl = curl_init();
        curl_setopt($objCurl,CURLOPT_URL, $strURL);
        curl_setopt($objCurl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($objCurl, CURLOPT_TIMEOUT, '90');
        $arrJsonResponse = curl_exec($objCurl);
        curl_close($objCurl);
        return json_decode($arrJsonResponse);
	}

	/**
	 * Function Name : findDetailsFromCache 
	 * Description   : To check, if the entered value is already present in cache memory.
	 * Created on    : 05-Aug-2015
	 * @param        : Address Cache Array, Array 
	 * Return 		 : boolean
	 */
	public function findDetailsFromCache($arrAddress) {	
		$arrCachedData = unserialize($this->cache->get('address_cache'));
		return array_search($arrAddress, $arrCachedData);
		
	}

	/**
	 * Function Name : loadCacheData 
	 * Description   : When a page is loaded for the first time, the cache file will be written to cache.
	 * Created on    : 05-Aug-2015
	 * @param        : Address Cache Array, Array 
	 * Return 		 : boolean
	 */
	public function loadCacheData(){
		$arrCacheData = serialize($this->addressModel->getAllAddress());
		$this->cache->save('address_cache', $arrCacheData, $this->config->item('sess_expiration'));
	}
}
