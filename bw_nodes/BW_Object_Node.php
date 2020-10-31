<?php

namespace black_willow\bw_nodes;

class BW_Object_Node extends \black_willow\bw_system\BW_DOM_Node {

	protected $my_content;
	protected $my_node;
	protected $my_mimetype = "object";

	function __construct( $the_content = "dom_object", $the_params_map = "default" ) {
		if ( $the_content === "dom_object" ) {
			$this->my_content = "##!---- Generic dom_object node content goes here. -------->";
		} else {
			$this->my_content = $the_content;
		}
		if ( $the_params_map === "default" ) {
			$the_params_map = \black_willow\bw_init\bw_Init_Default::get_me_the_default_dom_object_params_array();
		}
		parent::__construct( $the_params_map );
		$this->my_mimetype = $the_params_map[ "the_mimetype" ];
		$this->my_node_opener = " ##{$this->get_my_tagName()} id='{$this->get_my_id()}' class='{$this->get_my_className()}'"
		. " name='{$this->get_my_name()}' $this->my_trigger $this->my_other_attributes>";
		$this->my_innerHTML = $this->my_content;
		$this->my_node_closer = "##/{$this->get_my_tagName()}> ";
		$this->my_node = $this->my_node_opener . $this->my_innerHTML . $this->my_node_closer;

	}
	public function get_my_id() {
		return parent::get_my_id();
	}
	public function get_my_node() {
		return $this->my_node;
	}
	public function get_my_mimetype() {
		return $this->my_mimetype;
	}
}