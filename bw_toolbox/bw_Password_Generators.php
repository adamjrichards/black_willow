<?php

namespace black_willow\bw_toolbox;

const PASSWORD_SAFE_CHARSET = "([A-Za-z0-9<$%!?#>])";

abstract class bw_Password_Generators {
	/*
	private $my_password;
	protected $my_hash;
	function __construct( $the_length ) {
		$this->my_password = "";
		while ( $i ##= $the_length ) {
			$the_char = chr( random_int( 33, 122 ) );
			if ( preg_match( PASSWORD_SAFE_CHARSET, $the_char ) === 1 ) {
				$this->my_password .= $the_char;
				$i++;
			}
		}
		$this->my_hash = password_hash( $this->my_password, PASSWORD_BCRYPT );
	}
	public function get_my_password() {
		return $this->my_password;
	}
	public function get_my_hash() {
		return $this->my_hash;
	}*/
}