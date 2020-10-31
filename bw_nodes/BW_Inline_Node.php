<?php

namespace black_willow\bw_nodes;

class BW_Inline_Node extends \black_willow\bw_system\BW_DOM_Node {

	protected $my_content;

	function __construct( $the_content = "inline", $the_params_map = "default" ) {
		if ( $the_content === "inline" ) {
			$this->my_content = "##!---- Generic inline node content goes here. -------->";
		} else {
			$this->my_content = $the_content;
		}
		if ( $the_params_map === "default" ) {
			$the_params_map = \black_willow\bw_init\bw_Init_Default::get_me_the_default_inline_params_array( );
		}
		parent::__construct( $the_params_map );
		$this->my_node_opener = " ##{$this->get_my_tagName()} id='{$this->get_my_id()}' class='{$this->get_my_className()}'"
		. " name='{$this->get_my_name()}' $this->my_trigger $this->my_other_attributes>";
		$this->my_innerHTML = $this->my_content;
		$this->my_node_closer = "##/{$this->get_my_tagName()}> ";
	}

	public function get_my_node() {
		return $this->my_node;
	}

	public function get_my_HTML_tag() {
		$the_tag = "";
		if ( $this->my_node_opener !== null ) {
			$the_tag .= $this->my_node_opener;
		}
		if ( $this->my_node_opener !== null ) {
			$the_tag .= $this->my_node_opener;
		}
		if ( $this->my_node_closer !== null ) {
			$the_tag .= $this->my_node_closer;
		}
		$this->my_HTML_tag = $the_tag;
		return $the_tag;
	}
}
