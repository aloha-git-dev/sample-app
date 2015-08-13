<?php
/*
* Created at 8/10/2015
* Class to communicate with database
* 
*/

require_once('class.sql.php');
require_once('class.db.php');
require_once('class.obj_standard.php');

class Address extends obj_standard {
	protected $i_id      = 0;
	protected $s_street  = '';
	protected $s_city    = '';
	protected $s_state   = 0;
	protected $s_zip     = '';
	protected $s_api_url = '';
	protected $s_api_key = '';
	protected $a_address = array();

	protected $map = array(
		's_table'  => 'adr_addresses',
		'a_fields' => array(
			'i_id'     => 'adr_i_id',
			's_street' => 'adr_s_street',
			's_city'   => 'adr_s_city',
			's_state'  => 'adr_s_state',
			'i_zip'    => 'adr_s_zip',
		),
	);

	// Methods
	public function __construct( $i_id = 0 ) {
		$this->i_id = $i_id;

		// Populate possible?
		if( empty($this->i_id) )
			return $this;
	}

	/**
	* curl function to call http request
	*/
	public function requestAPI($a_params = array()) {        
        if (empty($a_params['url']))
            return false;

        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL, $a_params['url']."?".http_build_query($a_params['param']));
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, '30');
        $a_response = curl_exec($curl);
        curl_close($curl);
        return $a_response;
    }

    /*
	* Get all addresses
	* @params - 
	* null
	* @return - 
	* $a_address - array
	*/
	public function get() {
		$s_query = sprintf("
			SELECT
				".implode(', ', $this->map['a_fields'])."
			FROM 
				{$this->map['s_table']}
			ORDER BY adr_i_id DESC"
		);

		$a_address = array();
		foreach (db::getInstance()->query($s_query) as $row) {
			$a_address[] = array(
				'i_id'             => (int) $row['adr_i_id'],
				's_street'         => $row['adr_s_street'],
				's_city'           => $row['adr_s_city'],
				's_state'          => $row['adr_s_state'],
				'i_zip'            => $row['adr_s_zip']
			);
		}
		return $a_address;
	}

	/*
	* It is used to add new address
	* @params - 
	* null
	* @return -
	* bool - true / false
	*/
	protected function create() {
		$s_query = sprintf("
			INSERT INTO {$this->map['s_table']}
				({$this->map['a_fields']['i_id']})
			VALUES
				(%u)",
			sql::format(NULL,'i')
		);
		db::getInstance()->query($s_query);

		$this->i_id = db::getInstance()->lastInsertId();

		return $this;
	}

	/*
	* It is used to add new address
	* @params - 
	* null
	* @return -
	* bool - true / false
	*/
	public function save() {
		$s_query = sprintf("
			INSERT INTO
				adr_addresses
			(
				adr_s_street,
				adr_s_city,
				adr_s_state,
				adr_s_zip
			)
			VALUES
			(
				%s,
				%s,
				%s,
				%u
			)",
			sql::format($this->s_street, 's'),
			sql::format($this->s_city, 's'),
			sql::format($this->s_state, 's'),
			sql::format($this->i_zip, 'i')
		);

		db::getInstance()->query($s_query);
		return true;
	}

	/*
	* It is used to add new address
	* @params - 
	* null
	* @return -
	* a_response - array
	*/
	public function getZipCode(){
        try {
            $s_api_url = $this->s_api_url;
            $s_api_key = $this->s_api_key;

            $s_address = $this->s_street . ", " . $this->s_city . ", " . $this->s_state;
            $a_param   = array(
                "url"   => $s_api_url,
                "param" => array(
                    "address" => $s_address,
                    "key"     => $s_api_key,
                ),
            );

            $a_response = $this->requestAPI($a_param);
            $a_result   = json_decode($a_response);
            
            $i_zip = "";
            foreach ($a_result->results[0]->address_components as $key => $a_row) {
                if($a_row->types[0] == "postal_code") {
                    $i_zip = $a_row->long_name;
                }
            }

            if (empty($i_zip)) {
            	throw new Exception("Invalid address", 1);
            }

          	$a_response = array(
        		'status' => 'success',
        		'data'   => $i_zip,
        	);
        } catch (Exception $e) {
            $a_response = array(
                'status' => 'error',
                'data'   => $e->getMessage(),
            );
        }
        return $a_response;
	}
}
