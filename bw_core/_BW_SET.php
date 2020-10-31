<?php

namespace black_willow\bw_core;

class _BW_SET {

	public $my_members;
	public $my_label;

	function __construct( $the_params_map ) {
		$this->my_members = new \Ds\Map();
		$this->my_label = $the_params_map[ "the_label" ];
	}
	public function add_a_new_member_to_the_set( $the_name, $the_image ) {
		$this->my_members->put( "$this->my_label\_$the_name", $the_image );
	}
	public function remove_a_member_of_the_set( $the_name ) {
		$this->my_members->remove( "$this->my_label\_$the_name" );
	}
}