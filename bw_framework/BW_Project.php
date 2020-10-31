<?php

namespace black_willow\bw_framework;

class BW_Project extends \black_willow\bw_system\BW_Framework_Node {

	private $my_init_map;
	private $my_scion;
	private $my_meta;
	private $my_contents_map;
	private $my_framework;
	private $my_errex;
	private $my_load_queue = FALSE;

	function __construct( $the_init_map ) { // $the_init_map = _BW_INIT->my_maps
		$this->my_init_map = $the_init_map;
		$this->my_meta = $this->my_init_map->get_my_meta_map();
		$this->my_constants_map = $this->my_init_map->get_my_constants_map();
		$this->my_errex = $this->my_init_map->get_my_errex_map();
		$this->my_contents_map = $this->my_init_map->get_my_contents_map();
		$this->my_framework = $this->my_init_map->get_my_framework_map();
		$this->my_project = $this->my_init_map->get_my_project();
		parent::__construct( $this->my_project );

		$this->my_load_queue = new \black_willow\bw_system\BW_Load_Queue( $this->get_my_handle(), $this->get_my_children() );
     }

	public function assemble_my_initial_framework() {
		$this->my_scion = FALSE;
		foreach ( $this->my_framework as $this_handle => $this_value ) {
               if ( $this_handle === "MY_PROJECT" ) {
				$this->my_scion = TRUE;
                    continue;
               }
			if ( $this->my_scion === TRUE ) {
				$this->my_scion = $this_handle;
			}
			$the_class = \trim( $this_value->get( "my_template" ), ".php" );
			$the_function = "get_me_a_new_" . $the_class;
			$GLOBALS[ $this_handle ] = \black_willow\bw_factories\bw_Framework::$the_function( $this_value );
			$this->my_load_queue->push_my_node( $this_handle );
          }
		if ( \is_object( $GLOBALS[ $this->my_scion ] ) ) {
			$this->my_kickstart = TRUE;
			return $this->my_load_queue;
		}
		return FALSE;
	}

     public function get_my_load_queue() {
          return $this->my_load_queue;
     }
     public function get_my_project() {
          return $this->my_load_queue->get_my_project();
     }
     public function get_my_contents_map() {
          return $this->my_contents_map;
     }

	public function insert( $this_item, $with_this_index ) {
		//$this->my_load_queue->insert_my( $this_item, $with_this_index );
	}
	public function put_my_node( $this_item ) {
		$this->my_load_queue->put_my_node( $this_item );
	}
	public function pop() {
		return $this->my_load_queue->pop();
	}

	public function sort_my_list() {
          return $this->my_load_queue->sort_my_list();
	}


     public function get_my_attributes() {
          return $this->my_project->get( "MY_ATTRIBUTES" );
     }

	// $the_kick is a boolean in and a map out
     public function kickstart_it( $the_kick ) {
		if ( \is_a( $the_kick, "\\black_willow\\bw_maps\\BW_Init_Map" ) ) {
			$the_kick = $this->assemble_my_initial_framework();
		} else {
			$the_kick = FALSE;
		}
		try {
			return $GLOBALS[ $this->my_scion ]->kickstart_it( $the_kick );
		} catch( ErrorException $e ) {
			throw new BW_Framework_Loading_Error( $this->my_project );
		}
     }
}