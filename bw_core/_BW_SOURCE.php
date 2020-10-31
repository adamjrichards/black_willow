<?php

namespace black_willow\bw_core;

class _BW_SOURCE {

	protected $my_template;
	public $my_name;
	public $my_type;
	public $my_group;
	public $my_connector;

	function __construct( $the_params_map ) {

		//$this->my_template = $the_params_map[ "the_template" ];
		//$this->my_name = $the_params_map[ "the_name" ];
		//$this->my_type = $the_params_map[ "the_type" ];
		//$this->my_group = $the_params_map[ "the_group" ];
		//$this->my_connector = new _CONNECTOR();
	}
	public function set_the_data_connector( $to_this ) {
		$this->my_connector = $to_this;
	}
}