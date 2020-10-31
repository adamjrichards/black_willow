<?php

namespace black_willow\bw_system;

class BW_ME extends \black_willow\bw_core\_BW_ME {

	private $my_cargo;
	private $my_connector;

	function __construct( $the_connection_string = null, $the_cargo = null) {
		$this->my_connector = new \black_willow\bw_system\BW_Connector( $the_connection_string );
		$this->my_cargo = new \Ds\Map();
		$this->my_cargo->putAll( [ $the_cargo ] );
	}
}