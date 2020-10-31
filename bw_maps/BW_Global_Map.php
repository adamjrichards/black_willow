<?php

namespace black_willow\bw_maps;

class BW_Global_Map extends \black_willow\bw_core\_BW_MAP {

	private $my_handle;
	private $my_pairs;

	public function __construct( $the_params_map = null, $the_map_handle = "MY_GLOBAL_MAP" ) {
		if ( $the_params_map !== null ) {
			parent::__construct( $the_params_map );
			$this->my_pairs = parent::get_my_pairs();
		} else {
			$this->my_pairs = new \Ds\Map();
		}
		$this->my_handle = $the_map_handle;
		$GLOBALS[ $this->my_handle ] = $this->my_pairs;
	}
	public function __destruct( ) {
		unset( $GLOBALS[ $this->my_handle ] );
	}

	public function get_my_pairs() {
		return $this->my_pairs;
	}
	public function add_a_property( $with_this_key, $with_this_value ) {
		$GLOBALS[ $this->my_handle ]->put( $with_this_key, $with_this_value );
	}
	public function get_my_property( $with_this_key ) {
		return $GLOBALS[ $this->my_handle ]->get( $with_this_key );
	}
	public function get_my_inner_property( $with_this_key ) {
		$the_outer_property = $GLOBALS[ $this->my_handle ]->get( $with_this_key );
		$the_inner_property = $the_outer_property->get( $with_this_key );
		return $the_inner_property;
	}
}