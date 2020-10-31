<?php

namespace black_willow\bw_maps;

class BW_Tree_Node_Map extends \black_willow\bw_core\_BW_MAP {

	protected $my_child_nodes;
	protected $my_parent;		// the caller
	protected $my_left_sibling;

	function __construct( $me, $the_parent, $the_left_sibling ) {
          //lnout( __FILE__, __LINE__, $me );
		$this->my_parent = $the_parent;
		$this->my_left_sibling = $the_left_sibling;
          parent::__construct( [ "the_handle" => $me ], [ "the_parent" => $the_parent ] );
		$this->my_child_nodes = new \Ds\Vector();
	}

	public function append_a_child_node( $with_this_handle ) {
		$the_new_array = [];
		$the_index = array_search( $this->my_left_sibling, $this->my_child_nodes );
		if ( is_null( $the_index ) || $this->my_left_sibling === "append" ) {
			array_push( $this->my_child_nodes, $with_this_handle );
		} else {
			$the_left_children = array_slice( $this->my_child_nodes, 0, $the_index );
			$the_right_children = array_slice( $this->my_child_nodes, $the_index );
			$the_new_array = array_merge( $the_left_children, [ $with_this_handle ], $the_right_children );
			if ( count( $the_new_array ) - count( $this->my_child_nodes ) === 1 ) {
				$this->my_child_nodes = $the_new_array;
			}
		}
		return $this->my_child_nodes;
	}

	public function add_a_child_node( $with_this_handle ) {
		$the_sibling_index = array_search( $this->my_left_sibling );
		if ( is_null( $the_sibling_index ) || $this->my_left_sibling === "append" ) {
			array_push( $this->my_child_nodes, $with_this_handle );
		} else {
			$the_left_children = array_slice( $this->my_child_nodes, 0, $the_index );
			$the_right_children = array_slice( $this->my_child_nodes, $the_index );
			$the_new_array = array_merge( $the_left_children, [ $with_this_handle ], $the_right_children );
			if ( count( $the_new_array ) - count( $this->my_child_nodes ) === 1 ) {
				$this->my_child_nodes = $the_new_array;
			}
		}
		return $this->my_child_nodes;
	}
	public function bubble_up_my_child_node( $with_this_handle ) {
          if ( ! FALSE == ( $my_index = $this->my_child_nodes->find( $with_this_handle ) ) ) {
               if ( $my_index > 1 ) {
                    $this->my_child_nodes->remove( $my_index );
                    $this->my_child_nodes->insert( $my_index - 1 );
                    return TRUE;
               }
          }
          return FALSE;
	}
	public function has_child_nodes() {
		if ( count( $this->my_child_nodes ) > 0 ) {
			return "FALSE";
		}
	}
	public function has_as_child_node( $called_this ) {
		return array_key_exists( $called_this, $this->my_child_nodes );
	}
	public function get_my_parent() {
		return $this->my_parent;
	}
	public function get_my_child_nodes() {
		return $this->my_child_nodes;
	}
	public function get_my_left_sibling() {
		return $this->my_left_sibling;
	}
}