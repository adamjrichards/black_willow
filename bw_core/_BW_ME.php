<?php

namespace black_willow\bw_core;

class _BW_ME {

	private $myself;
	private $my_cargo;

	function __construct( $the_params_map ) {
		$this->my_cargo = new \Ds\Map();
		$this->my_cargo->putAll( $the_params_map );
	}

	public function get_my_cargo() {
		return $this->my_cargo;
	}

	public function get_my_self( ) {
		return $this->myself;
	}
}