<?php
/*
* Createrd at 5 Aug 2015
* This model file used to communicate with addresses table 
*/

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
class Address extends Model
{
	protected $table      = 'addresses';
	protected $primaryKey = 'id';

	/* 
	* Function to get address data
	* @param - null
	* @return - $arrAddresses - array 
	*/
	public static function getAddresses() {
		$arrAddresses = Address::orderBy("id", "desc")->get();
		return $arrAddresses;
	}
}
