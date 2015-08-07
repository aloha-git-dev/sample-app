<?php
/*
* Createrd at 5 Aug 2015
* This controller is useful to communicate with address model
*/

namespace App\Http\Controllers;

use App\Http\Models\Address;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Exception;
class AddressController extends BaseController
{
	
	/* 
	* Function to load the home page
	* @params - null
	* @return - view with parameteres
	*/
	public function index() {
		$arrAddresses = Address::getAddresses();
		return view('pages.index')
			->with('arrAddresses', $arrAddresses);
	}

	/* 
	* Function to load the home page
	* @params - null
	* @return - view with parameteres
	*/
	public function validateAddress() {
		try {
			/* Initialize the all inputs to new variable */
			$arrInput   = \Input::all();

			/* Code to validate entry with custom valdation */
			$arrMessages = array(
				'unique_multiple'    => 'Address is already exist.',
			);
			$validator = Validator::make(
				// Validator data goes here
				array(
					'unique_fields' => array($arrInput["txtStreet"], $arrInput["txtCity"], $arrInput["txtState"]),
				),
				// Validator rules go here
				array(
					'unique_fields' => 'unique_multiple:addresses,street,city,state',
				),
				$arrMessages
			);

			if ($validator->fails()) {
				throw new Exception($validator->messages()->first(), 1);
			}

			// Get config value for google call
			$strApiUrl = \Config::get('app.GOOGLE_API_URL');
			$strApiKey = \Config::get('app.GOOGLE_API_KEY');

			$strAddress = $arrInput["txtStreet"] . ", " . $arrInput["txtCity"] . ", " . $arrInput["txtState"];
			$arrParam   = array(
				"url"   => $strApiUrl,
				"param" => array(
					"address" => $strAddress,
					"key"     => $strApiKey,
				),
			);

			$arrResponse = $this->requestAPI($arrParam);
			$arrResult   = json_decode($arrResponse);
			
			$intZip      = "";
			foreach ($arrResult->results[0]->address_components as $key => $arrRow) {
				if($arrRow->types[0] == "postal_code") {
					$intZip = $arrRow->long_name;
				}
			}

			if (empty($intZip)) {
				throw new Exception("Please enter correct address.");
			}

			/* Storing an address to table by initializing the address model */
			$address         = new Address;
			$address->street = $arrInput["txtStreet"];
			$address->city   = $arrInput["txtCity"];
			$address->state  = $arrInput["txtState"];
			$address->zip    = $intZip;
			$address->save();

			/* Get all addresses */
			$arrAddresses = Address::getAddresses();
			$arrResponse = array(
				'status' => 'success',
				'data'   => $arrAddresses,
			);

		} catch (Exception $e) {
			$arrResponse = array(
				'status' => 'error',
				'data'   => "Invalid address",
			);
		}
		echo json_encode($arrResponse);die;
	}
}
