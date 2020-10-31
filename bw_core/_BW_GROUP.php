<?php

namespace black_willow\bw_core;

class _BW_GROUP {

     protected $my_output_queue;
	protected $my_label = "default";
	protected $my_members;
     protected $my_uid;

	function __construct( $the_params_map = null ) {
		$this->my_output = new \Ds\Deque();
		$this->my_members = new \Ds\Set();
		$this->my_uid = \black_willow\bw_factories\bw_UIDs::get_me_a_new_group_UID();
		if ( $the_params_map->hasKey( "my_label" ) ) {
			$this->my_label = $the_params_map->get( "my_label" );
		}
	}
	public function get_my_label() {
		return $this->my_label;
	}
	public function get_my_members() {
		return $this->my_members;
	}
	public function get_my_uid() {
		return $this->my_uid;
	}
     public function my_output_queue( ) {
          return $this->my_output;
     }
	public function set_my_label( $to_this_string ) {
		$this->my_label = $to_this_string;
	}
	public function set_my_members( $to_these_guys ) {
		$the_replacement_set = new \Ds\Set( $to_these_guys );
		$this->my_members = $the_replacement_set;
		return $this->my_members;
	}
	public function add_a_new_member( $with_this_name ) {
		$this->my_members->add( $with_this_name);
		return $this->my_members;
	}
	public function set_my_uid( $to_this_uid ) {
		$this->my_uid = $to_this_uid;
	}

}