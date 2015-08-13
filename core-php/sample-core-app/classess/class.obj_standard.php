<?php
/*
* Standard class file useful to all clasess
*/
abstract class obj_standard {
	///////////////////////
	// Properties
	protected $i_id;
	protected $a_changes = array();

	///////////////////////
	// Methods
	public function to_array() {
		$a_me = array();

		foreach( $this as $s_prop => $s_val ) {
			// Exclude irrelevant properties since this method
			// is primarily used to send a JSON-rendered object
			if( in_array($s_prop, array('a_changes', 'map', 'db')) )
				continue;

			$a_me[ $s_prop ] = $this->$s_prop;
		}

		return $a_me;
	}

	public function __get( $s_prop ) {
		return $this->$s_prop;
	}

	public function __set($s_prop, $_val) {
		$this->$s_prop = $_val;
		$this->a_changes[] = $s_prop;
	}

	// Supports isset() and empty()
	public function __isset( $property ) {
		return isset($this->$property);
	}

	// Duplicate functionality. Didn't realize the aforementioned magic method existed until later.
	public function is_empty( $s_prop ) {
		return empty($this->$s_prop);
	}
}
?>