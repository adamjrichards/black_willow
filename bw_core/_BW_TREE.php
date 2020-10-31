<?php

namespace black_willow\bw_core;

class _BW_TREE {

	public $my_root;
	public $my_children;

	function __construct( $the_params_map ) {
		$this->my_root = new _BW_TREE_NODE( $the_params_map );
		$the_tracking_id = $this->my_root->get_my_tracking_id();
		$this->my_children = [
			"MY_PAGE" => [
				"MY_HEAD_TAG" => [],
				"MY_BODY_TAG" => [
					"MY_HEADER_TAG" => [
						"MY_BANNER" => [],
						"MY_LOGO" => []
					],
					"MY_PORTAL" => [
						"MY_BUILDER_APPLICATION" => [],
						"MY_RESEARCH_APPLICATION" => []
					],
					"MY_FOOTER_TAG" => [
						"MY_SMALLPRINT" => []
					]
				]
			]
		];
	}

	public function delve( $this_child_array, $the_parent_node ) {
		$the_keys = array_keys( $this_child_array );
		$return_me = false;
		foreach( $the_keys as $this_child ) {
			if ( $this_child === $the_parent_node ) {
				break;
			} else if ( is_array( $this_child ) ) {
				delve( $this_child, $the_parent_node );
			} else {
				$return_me = $the_parent_node;
			}
		}
		return false;
	}

	public function add_a_new_child_node( $the_new_child_node, $the_parent_node, $the_left_sibling ) {
		$the_parent = $this->delve( $this->my_children, $the_parent_node );
	}
}
