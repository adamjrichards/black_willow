<?php

namespace black_willow\bw_data;

class BW_Database_Connector extends \black_willow\bw_core\_BW_CONNECTOR {

	private $my_default_schema;
	private $my_encrypted_connection_string;

	function __construct( $the_params_map ) {

		parent::__construct( $the_params_map );
		$this->my_name = $the_params_map[ "the_name" ];
		$this->my_username = $the_params_map[ "the_username" ];
		$this->my_encrypted_password = $the_params_map[ "the_encrypted_password" ];
		$this->my_template = $the_params_map[ "the_template" ];
		$this->my_target = $the_params_map[ "the_target" ];
		$this->my_default_schema = "";
		$this->my_encrypted_connection_string = "";
	}
}