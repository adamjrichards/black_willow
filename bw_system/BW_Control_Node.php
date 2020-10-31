<?php

namespace black_willow\bw_system;

class BW_Control_Node extends \black_willow\bw_core\_BW_NODE {

	private $my_wrapper;
	private $my_label;

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		$this->my_wrapper = new \black_willow\bw_nodes\BW_Wrapper_Node_Map( $the_params_map );
     }
     public function get_my_wrapper() {
          return $this->my_wrapper;
     }
     public function get_my_label() {
          return $this->my_label;
     }
	public function get_my_opener() {
		return $this->my_wrapper->get( "my_opener" );
	}
	public function get_my_closer() {
		return $this->my_wrapper->get( "mycloser" );
	}
	public function get_my_minimizer() {
		return $this->my_wrapper->get( "my_minimizer" );
	}
	public function get_my_maximizer() {
		return $this->my_wrapper->get( "my_maximizer" );
	}
	public function get_my_windowshader() {
		return $this->my_wrapper->get( "my_windowshader" );
	}
	public function get_my_button( $with_this_label ) {
		return $this->my_wrapper->get( $with_this_label );
	}
}