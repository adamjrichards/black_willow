<?php

namespace black_willow\bw_maps;

class BW_Framework_Node_Map extends \black_willow\bw_core\_BW_MAP {

	private $my_setup_defaults;

	function __construct( $the_params_map ) {

		parent::__construct( $the_params_map );
		$this->my_setup_defaults = parent::get_my_pairs();
	}

	public function add_a_property_to_my_map( $like_this_one ) {
		$this->my_setup_defaults->put( $with_this_name, $like_this_one );
	}
	public function add_this_to_my_framework( $the_new_map ) {
		$this->my_setup_defaults->merge( $the_new_map );
	}
	public function add_a_node_map( $the_handle, $the_new_map ) {
		$this->my_setup_defaults->add_a_node_map( $the_handle, $the_new_map );
	}
	public function get_my_framework_manifest() {

		return $this->my_setup_defaults->get( "MY_PROJECT_FRAMEWORK_MANIFEST" );
	}
	public function get_my_project() {
		return $this->my_setup_defaults->get( "MY_PROJECT" );
	}
	public function get_my_site() {
		return $this->my_setup_defaults->get( "MY_SITE" );
	}
	public function get_my_page() {
		return $this->my_setup_defaults->get( "MY_PAGE" );
	}
	public function get_my_application() {
		return $this->my_setup_defaults->get( "MY_APPLICATION" );
	}
	public function get_my_parent() {
		return $this->project( "my_parent" );
	}
	public function get_my_name() {
		return $this->project( "my_name" );
	}
	public function get_my_type() {
		return $this->project( "my_type" );
	}
	public function get_my_meta() {
		return $this->project( "my_meta" );
	}
	public function get_my_title() {
		return $this->project( "my_title" ) ;
	}
	public function get_my_namespace() {
		return $this->project( "my_namespace" );
	}
	public function get_my_folder() {
		return $this->project( "my_folder" );
	}
	public function get_my_index_page() {
		return $this->project( "my_index_page" );
	}
	public function get_my_URL() {
		return $this->project( "my_url" );
	}
	public function set_my_DOM_node_map( $to_this_array ) {
		$this->my_setup_defaults->putAll( $to_this_array );
	}
}