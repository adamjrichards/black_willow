<?php

namespace black_willow\bw_system;

class BW_Framework_Node extends \black_willow\bw_core\_BW_NODE {

	private $my_index_page = "";
	private $my_default_URL = "";
	private $my_manifest = "";
	private $my_kickstart;
	private $my_codebase;

	function __construct( $the_params_map) {
		parent::__construct( $the_params_map ); // _BW_NODE
		if ( ! is_null( $the_params_map ) ) {
			 if ( $the_params_map->hasKey( "my_manifest" ) ) {
				$this->my_manifest = $the_params_map->get( "my_manifest" );
			 } else {
				 $this->my_manifest = MY_PROJECT_MANIFEST;
			 }
			 if ( $the_params_map->hasKey( "my_index_page" ) ) {
				$this->my_index_page = $the_params_map->get( "my_index_page" );
			 } else {
				 $this->my_index_page = MY_PROJECT_INDEX_PAGE;
			 }
			 if ( $the_params_map->hasKey( "my_default_URL" ) ) {
				$this->my_default_URL = $the_params_map->get( "my_default_URL" );
			 } else {
				 $this->my_default_URL = MY_PROJECT_DEFAULT_URL;
			 }
		}
		//$this->my_codebase = new \Ds\Deque(); // so insertions and deletions are easy
	}
	public function get_my_inner_code() {
		return $this->my_codebase;
	}
	public function set_my_codebase( $to_this ) {
		$this->my_codebase = $to_this;
	}
	public function get_my_project() {
		return $GLOBALS[ "MY_PROJECT_FRAMEWORK" ]->get( "MY_PROJECT" )->get_my_project();
	}
	public function get_my_site() {
		return $GLOBALS[ "MY_PROJECT_FRAMEWORK" ]->get( "MY_SITE" );
	}
	public function get_my_index_page() {
		return $this->my_framework->get( "my_index_page" );
	}
	public function get_my_application() {
		return $this->my_framework->get( "MY_APPLICATION" );
	}
	public function get_my_namespace() {
		return $this->my_framework->get( "my_namespace" );
	}
	public function get_my_manifest() {
		return $GLOBALS[ "MY_PROJECT_FRAMEWORK" ]->get_my_manifest();
	}
	public function get_my_home_folder() {
		return $this->my_sources->get( "my_home_folder" );
	}
	public function get_my_defaults() {
		return $this->my_defaults;
	}
	public function get_my_sources() {
		return $this->my_sources;
	}
	public function get_my_kickstart() {
		return $this->my_kickstart;
	}
	public function get_my_class() {
		return parent::get_my_class();
	}
}