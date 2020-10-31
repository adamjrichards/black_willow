<?php

namespace black_willow\bw_nodes;

class BW_Wrapper_Node extends \black_willow\bw_system\BW_DOM_Node {

	function __construct( $the_content = "wrapper", $the_params_map = "default" ) {
		if ( $the_content === "wrapper" ) {
			$this->my_content = "##!---- Generic wrapper node content goes here. -------->";
		} else {
			$this->my_content = $the_content;
		}
		if ( $the_params_map === "default" ) {
			$the_params_map = \black_willow\bw_init\bw_Init_Default::get_me_the_default_wrapper_params_array( );
		}
		parent::__construct( $the_params_map );
		$this->my_node_opener = "\n##{$this->get_my_tagName()} id='{$this->get_my_id()}' class='{$this->get_my_className()}'"
		. " name='{$this->get_my_name()}' {$this->get_my_trigger()} {$this->get_my_other_attributes()}>";
		$this->my_innerHTML = $this->my_content;
		$this->my_node_closer = "##/{$this->get_my_tagName()}> ";
		$this->my_node = $this->my_node_opener . $this->my_innerHTML . $this->my_node_closer;

	}
	public function get_my_node() {
		return $this->my_node;
	}
}