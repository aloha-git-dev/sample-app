<?php
abstract class sql {

	public static function format($val, $type = 's') {

		$val = trim($val);
		$val = str_replace(chr(34), "'", $val);

		switch ( $type ) {

			case 's':
				$val = chr(34).$val.chr(34);
				break;

			case 'd':
				if ( preg_match('/^[0-9]{1,2}[-\/][0-9]{1,2}[-\/][0-9]{4}$/', $val) ) {

					// mm/dd/yyyy format?
					list($_month, $_day, $_year) = preg_split('/[-\/]/', $val);
					$val = "$_year-$_month-$_day";

				} elseif ( preg_match('/^[0-9]{4}[-\/][0-9]{1,2}[-\/][0-9]{1,2}$/', $val) ) {

					// yyyy/mm/dd format?
					list($_year, $_month, $_day) = preg_split('/[-\/]/', $val);
					$val = "$_year-$_month-$_day";

				}
				$val = chr(34).$val.chr(34);
				break;

			case 'i':
				if ( $val == '' ) {
					$val = 0;
				} elseif ( $val == 'on' ) {
					$val = 1;
				} else {
					$val = array_diff( str_split($val), array('$',',') );
					$val = (int) implode('', $val);
				}
				break;

			case 'f':
				$val = array_diff( str_split($val), array('$',',') );
				$val = (float) implode('', $val);
				break;

			case 'b':
				$val = ( $val == true )? 1: 0;
				break;

			default:
				$val = chr(34).$val.chr(34);
				break;
		}

		return $val;
	}
}
?>