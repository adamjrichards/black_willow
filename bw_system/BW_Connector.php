<?php

namespace black_willow\bw_system;

class BW_Connector extends \black_willow\bw_core\_BW_CONNECTOR {

	private $my_protocol;
	private $my_pipeline;

	function __construct( $the_params_map ) {

		parent::__construct( $the_params_map );
		$this->my_protocol = $the_params_map[ "the_protocol" ];
		$this->my_pipeline = $the_params_map[ "the_pipeline" ];
	}
}