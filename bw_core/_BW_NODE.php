<?php

namespace black_willow\bw_core;

class _BW_NODE {

	// Traits common to all nodes

	private $my_handle = "default";
	private $my_name = "default";
	private $my_title = "default";
	private $my_type = "default";
	private $my_parent = "default";
	private $my_left_sibling = "append";
	private $my_meta = "default";
	private $my_namespace = "default";
	private $my_context = "default";
	private $my_template = "default";
	private $my_class = "default";
	private $my_factory = "default";
	private $my_source_file = "default";
	private $my_source_folder = "default";
	protected $my_node_opener = "##!-- /* Generic node opener */>";
	protected $my_node_closer = "##!-- /* Generic node closer */>";
	protected $my_node_content = "default"; // non-markup

	protected $my_children;

	function __construct( $the_params_map = "default" ) {
		if ( $the_params_map !== "default" ) {
			if ( $the_params_map->hasKey( "my_handle" ) && $the_params_map->get( "my_handle" ) !== "default" ) {
				$this->my_handle = $the_params_map->get( "my_handle" );
			}
			if ( $the_params_map->hasKey( "my_name" ) && $the_params_map->get( "my_name" ) !== "default" ) {
				$this->my_name = $the_params_map->get( "my_name" );
			}
			if ( $the_params_map->hasKey( "my_title" ) && $the_params_map->get( "my_title" ) !== "default" ) {
				$this->my_title = $the_params_map->get( "my_title" );
			}
			if ( $the_params_map->hasKey( "my_type" ) && $the_params_map->get( "my_type" ) !== "default" ) {
				$this->my_type = $the_params_map->get( "my_type" );
			}
			if ( $the_params_map->hasKey( "my_parent" ) && $the_params_map->get( "my_parent" ) !== "default" ) {
				$this->my_parent = $the_params_map->get( "my_parent" );
			}
			if ( $the_params_map->hasKey( "my_left_sibling" ) && $the_params_map->get( "my_left_sibling" ) !== "append" ) {
				$this->my_left_sibling = $the_params_map->get( "my_left_sibling" );
			}
			if ( $the_params_map->hasKey( "my_meta" ) && $the_params_map->get( "my_meta" ) !== "default" ) {
				$this->my_meta = $the_params_map->get( "my_meta" );
			}
			if ( $the_params_map->hasKey( "my_namespace" ) && $the_params_map->get( "my_namespace" ) !== "default" ) {
				$this->my_namespace = $the_params_map->get( "my_namespace" );
			}
			if ( $the_params_map->hasKey( "my_context" ) && $the_params_map->get( "my_context" ) !== "default" ) {
				$this->my_context = $the_params_map->get( "my_context" );
			}
			if ( $the_params_map->hasKey( "my_template" ) && $the_params_map->get( "my_template" ) !== "default" ) {
				$this->my_template = $the_params_map->get( "my_template" );
			}
			if ( $the_params_map->hasKey( "my_class" ) && $the_params_map->get( "my_class" ) !== "default" ) {
				$this->my_class = $the_params_map->get( "my_class" );
			}
			if ( $the_params_map->hasKey( "my_factory" ) && $the_params_map->get( "my_factory" ) !== "default" ) {
				$this->my_factory = $the_params_map->get( "my_factory" );
			}
			if ( $the_params_map->hasKey( "my_source_file" ) && $the_params_map->get( "my_source_file" ) !== "default" ) {
				$this->my_source_file = $the_params_map->get( "my_source_file" );
			}
			if ( $the_params_map->hasKey( "my_source_folder" ) && $the_params_map->get( "my_source_folder" ) !== "default" ) {
				$this->my_source_folder = $the_params_map->get( "my_source_folder" );
			}
			if ( $the_params_map->hasKey( "my_node_opener" ) && $the_params_map->get( "my_node_opener" ) !== "##!-- /* Generic node */>" ) {
				$this->my_node_opener = $the_params_map->get( "my_node_opener" );
			}
			if ( $the_params_map->hasKey( "my_node_closer" ) && $the_params_map->get( "my_node_closer" ) !== "default" ) {
				$this->my_node_closer = $the_params_map->get( "my_node_closer" );
			}
			
			$this->my_node_content = new \Ds\Queue();
			if ( $the_params_map->hasKey( "my_node_content" ) && $the_params_map->get( "my_node_content" ) !== "default" ) {
				$this->my_node_content->push( $the_params_map->get( "my_node_content" ) );
			}

			$this->my_children = new \Ds\Map();
		}
	}
	public function get_my_node_opener() {
		return $this->my_node_opener;
	}
	public function get_my_node_closer() {
		return $this->my_node_closer;
	}
	public function get_my_node_content() {
		return $this->my_node_content;
	}
	public function set_my_node_content( $to_this ) {
		return $this->my_node_content = $to_this;
	}
	public function get_my_handle() {
		return $this->my_handle;
	}
	public function get_my_name() {
		return $this->my_name;
	}
	public function get_my_title() {
		return $this->my_title;
	}
	public function get_my_type() {
		return $this->my_type;
	}
	public function get_my_parent() {
		return $this->my_parent;
	}
	public function get_my_left_sibling() {
		return $this->my_left_sibling;
	}
	public function get_my_meta() {
		return $this->my_meta;
	}
	public function get_my_namespace() {
		return $this->my_namespace;
	}
	public function get_my_context() {
		return $this->my_context;
	}
	public function get_my_template() {
		return $this->my_template;
	}
	public function get_my_source_file() {
		return $this->my_source_file;
	}
	public function get_my_source_folder() {
		return $this->my_source_folder;
	}
	public function get_my_class() {
		return $this->my_class;
	}
	public function get_my_factory() {
		return $this->my_factory;
	}

	public function get_my_children() {
		return $this->my_children;
	}
	public function create_a_family() {
		if ( ! $this->my_children ) {
               $this->my_children = array();
          }
          return $this->my_children;
	}

	public function has_children() {
		return ( FALSE === $this->my_children->isEmpty() );
	}

	public function has_a_child( $with_this_handle ) {
		return $this->my_child_nodes->has_a_child_node( $with_this_handle );
	}

	public function find_a_node( $with_this_handle ) {
		if ( $this->my_child_nodes->has_a_child_node( $with_this_handle ) ) {
			return $this->my_child_nodes->get( $with_this_handle );
		}
		return FALSE;
	}
	public function add_a_child_node( $with_this_handle ) {
		return $this->my_child_nodes->add_a_child_node( $with_this_handle  );
	}
	public function bubble_up_my_child_node( $with_this_handle ) {
		return $this->my_child_nodes->add_a_child_node( $with_this_handle  );
	}

}