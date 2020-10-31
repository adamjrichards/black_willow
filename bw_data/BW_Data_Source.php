<?php

namespace black_willow\bw_data;

class BW_Data_Source extends \black_willow\bw_core\_BW_SOURCE {

	public $my_name; // the node's PHP-object reference
	public $myself; // reference to the corresponding client-side DOM element's "myself"
	public $my_attributes = []; // a bucket for DOM attributes
	public $my_parent; // the node above in the tree
	public $my_children = []; // the nodes immediately below in the tree

	function __construct( $the_name ) {
		parent::__construct( $the_params_map );
		$this->my_name = $the_name;


		if ( empty( $GLOBALS[ "_NODE_MAP" ] ) ) {
			$GLOBALS[ "_NODE_MAP" ] = new _BW_NODE_MAP();
		}
		$GLOBALS[ "_NODE_MAP" ]->add( $this->my_name, $this );
	}

	public function set_my_name( $to_this ) {
		$this->my_name = $to_this;
	}
	public function set_my_self( $to_this ) {
		$this->myself = $to_this;
	}
	public function set_my_attributes( $to_these ) {
		$this->my_attributes = $to_these;
	}
	public function switch_parent( $to_this ) {
		$this->my_parent = $to_this;
	}
	public function add_a_child_node( $like_this_one ) {
		array_push( $this->my_children, $like_this_one );
	}
	public function remove_the_child_node( $with_this_name ) {
		function the_filter() {
			return $with_this_name;
		}
		$this->my_children = array_filter( $this->my_children, "the_filter" );
	}
}