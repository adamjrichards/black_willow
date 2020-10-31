<?php

namespace black_willow\bw_framework;

class BW_Application extends \black_willow\bw_system\BW_Framework_Node {

	private $my_components; // banner, logo, top menu...
	private $my_portals; // banner, logo, top menu...
	private $my_gateways; // banner, logo, top menu...
	private $my_database;

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		$this->my_components = [];
		$this->my_portals = [];
		$this->my_gateways = [];
		$this->my_database = [];
	}
}