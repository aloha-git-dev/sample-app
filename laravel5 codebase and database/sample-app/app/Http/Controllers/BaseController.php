<?php
/*
* Created at 8/5/2015
* Useful to create an common function of an application
*/

namespace App\Http\Controllers;

class BaseController extends Controller {
    
    /*
	* Curl function to call third party api
	* @params - 
	* $arrParam - array
	* @return-
	* $arrResponse - array
	*/
    public function requestAPI($arrParam = array()) {
		if (empty($arrParam['url']))
			return false;

		echo $arrParam['url']."?".http_build_query($arrParam['param']);
		die;
		
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL, $arrParam['url']."?".http_build_query($arrParam['param']));
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, '30');
		$arrResponse = curl_exec($curl);
		curl_close($curl);
		return $arrResponse;
	}
}
