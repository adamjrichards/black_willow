<?php

namespace black_willow\bw_system;

class BW_Controls_Node_Map extends \black_willow\bw_core\_BW_MAP {

	private $my_opener;
	private $my_closer;
	private $my_minimizer;
	private $my_maximizer;
	private $my_windowshader;
	private $my_other_buttons;
	private $my_label;

	function __construct( $the_params_map ) {
		$this->my_other_buttons = new \Ds\Map();
		parent::__construct( $the_params_map );
     }

	public function get_my_opener() {
		return $this->my_opener;
	}
	public function get_my_closer() {
		return $this->my_closer;
	}
	public function get_my_minimizer() {
		return $this->my_minimizer;
	}
	public function get_my_maximizer() {
		return $this->my_maximizer;
	}
	public function get_my_windowshader() {
		return $this->my_windowshader;
	}
	public function get_my_label() {
		return $this->my_label;
	}
	public function get_my_button( $with_this_label ) {
		return $this->my_closer;
	}

}