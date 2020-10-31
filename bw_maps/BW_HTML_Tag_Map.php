<?php

namespace black_willow\bw_maps;

class BW_HTML_Tag_Map extends \black_willow\bw_core\_BW_MAP {

	private $my_DOM_node;

	function __construct( $the_tag_map = null ) {
		parent::__construct( $the_tag_array );

		$this->my_DOM_node = parent::get_my_pairs();
	}

	public function set_my_DOM_node_map( $to_this_array ) {
		$this->my_DOM_node->putAll( $to_this_array );
	}

	public function get_my_DOM_node() {
		return $this->my_DOM_node;
	}

	public function get_my_node_opener() {
		return $this->my_DOM_node->get( "my_node_opener" );
	}

	public function get_my_DOM_node_innerHTML() {
		return $this->my_DOM_node->get( "my_DOM_node_innerHTML" );
	}

	public function get_my_node_closer() {
		return $this->my_DOM_node->get( "my_node_closer" );
	}
}