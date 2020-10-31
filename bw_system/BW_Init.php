<?php

namespace black_willow\bw_system;

class BW_Init extends \black_willow\bw_core\_BW_INIT {

	function __construct( $the_init_map ) {
		parent::__construct( $the_init_map );
		$this->my_init_map = parent::get_my_map();
	}

	public function get_my_map_as_an_array() {
		return $this->my_init_map->get_my_map_as_an_array();
	}
	public function get_my_init_map() {
		return $this->my_init_map;
	}
	public function get_my_meta_map() {
		return $this->my_init_map->get_my_meta_map();
	}
	public function get_my_constants_map() {
		return $this->my_init_map->get_my_constants_map();
	}
	public function get_my_errex_map() {
		return $this->my_init_map->get_my_errex_map();
	}
	public function get_my_contents_map() {
		return $this->my_init_map->get_my_contents_map();
	}
	public function get_my_framework_map() {
		return $this->my_init_map->get_my_framework_map();
	}
	public function merge_a_map( $the_new_map ) {
		$this->my_init_map = $this->my_init_map->merge_a_map( $the_new_map );
		return $this->my_init_map;
	}

	// $the_kick is a map in and a map out
	public function kickstart_it( $the_kick ) {
		$the_handle = $this->get_my_constants_map()->get( "MY_PROJECT_HANDLE" );
		if( $the_kick->get( "MY_BLACK_WILLOW_PROJECT" ) === $the_handle ) {
			$the_kick = $this->get_my_map();
		}
		try {
			$GLOBALS[ MY_PROJECT_HANDLE ] = new \black_willow\bw_framework\BW_Project( $the_kick );
			return $GLOBALS[ MY_PROJECT_HANDLE ]->kickstart_it( $the_kick );
		} catch( ErrorException $e ) {
			throw new BW_Framework_Loading_Error( MY_PROJECT_HANDLE );
		}
	}
}