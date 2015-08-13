<?php
/*
* Useful to coonect database 
*/
class db {
	
	private static $instance = NULL;

	private function __construct() {
	}

	// Return DB instance or create intitial connection
	public static function getInstance() {

		$s_host = 'localhost';
		$s_db   = 'sample-core-app';
		$s_user = 'root';
		$s_pass = 'root';

		if( ! self::$instance ) {

			self::$instance = new PDO("mysql:host={$s_host};dbname={$s_db}", $s_user, $s_pass);
			self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$instance;
	}

	// Like the constructor, we make __clone private so nobody can clone the instance
	private function __clone() {
	}
}
?>
