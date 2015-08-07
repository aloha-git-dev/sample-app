<?php

class Address_model extends CI_Model {

    /**
     * Function Name : __construct 
     * Description   : To intilize the database.
     * Created on    : 05-Aug-2015
     * Return        : boolean
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->database();
    }

    /**
     * Function Name : insertAddress 
     * Description   : To Insert into Addresses table.
     * Created on    : 05-Aug-2015
     * @param        : Array - Accepts the address details in array Street, City, Sate and Zip respectively
     * Return        : Integer - Newly added Address id
     */
    public function insertAddress($arrAddressDetails){
    	$this->db->insert('addresses', $arrAddressDetails);
    	$error = $this->db->error();
    	return $this->db->insert_id();
    }

    /**
     * Function Name : getAll 
     * Description   : To get all the detials from Address table.
     * Created on    : 05-Aug-2015
     * Return        : Array - Id, State, City, State, Zip
     */
    public function getAll(){
		$arrQuery = $this->db->get('addresses');
        $arrAddressDetails = array();
        foreach ($arrQuery->result() as $arrValues)
        {
            $arrAddress = array();
            $arrAddress[] = $arrValues->id;
            $arrAddress[] = $arrValues->street;
            $arrAddress[] = $arrValues->city;
            $arrAddress[] = $arrValues->state;
            $arrAddress[] = $arrValues->zip;
            $arrAddressDetails[] = $arrAddress;
        }
        return $arrAddressDetails;
    }

    /**
     * Function Name : getAllAddress 
     * Description   : To get all the address detials from Address table.
     * Created on    : 05-Aug-2015
     * Return        : Array - Id, State, City, State, Zip
     */
    public function getAllAddress(){
        $arrQuery = $this->db->get('addresses');
        $arrAddress = array();
        foreach ($arrQuery->result() as $arrValues)
        {            
            $arrAddress[$arrValues->zip] = $arrValues->street .", ".$arrValues->city.", ".$arrValues->state; 
        }
        return $arrAddress;
    }
}
?>