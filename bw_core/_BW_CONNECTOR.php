<?php

namespace black_willow\bw_core;

class _BW_CONNECTOR {

	private $my_name;
	private $my_username;
	private $my_encrypted_password;
	private $my_template;
	private $my_target;

	function __construct( $the_params_map ) {
		$this->my_name = $the_params_map[ "the_name" ];
		$this->my_username = $the_params_map[ "the_username" ];
		$this->my_encrypted_password = $the_params_map[ "the_encrypted_password" ];
		$this->my_template = $the_params_map[ "the_template" ];
		$this->my_target = $the_params_map[ "the_target" ];
	}
}