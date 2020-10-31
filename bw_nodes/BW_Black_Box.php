<?php

namespace black_willow\bw_nodes;

class BW_Black_Box extends \black_willow\bw_system\BW_DOM_Node {

	private $my_source_folder;
	private $my_base_url;
	private $my_asset_list;
	private $my_owner;
	protected $my_css_source;
	protected $my_codepage;

	function __construct( $the_params_map = "default" ) {
		parent::__construct( $the_params_map );
		$this->my_base_url = MY_PROJECT_BLACK_BOXES . $this->get_my_source_folder();
		$this->my_source_folder = $the_params_map[ "my_source_folder" ];
		$this->my_css_source = $the_params_map[ "my_css_source" ];
		$this->my_owner = $the_params_map[ "my_owner" ];
		$this->my_type = $the_params_map[ "my_type" ];
		$this->my_baseID = $the_params_map[ "my_baseID" ];
 	}

	public function get_my_codepage() {
		return $this->my_codepage;
	}
	public function get_my_asset_list() {
		return $this->my_asset_list;
	}

	public function get_my_attributes() {
		return parent::get_my_attributes();
	}

	public function get_my_id() {
		return parent::get_my_id();
	}
	public function get_my_parent() {
		return parent::get_my_parent();
	}

	public function get_my_template() {
		return parent::get_my_template();
	}

	public function get_my_css_source() {
		return $this->my_css_source;
	}

	public function get_my_source_folder() {
		return $this->my_source_folder;
	}

	public function change_my_html( $to_this ) {
		$this->my_html = $to_this;
	}
	public function change_my_css( $to_this ) {
		$this->my_css = $to_this;
	}
	public function change_my_scripts( $to_these ) {
		$this->my_scripts = $to_these;
	}
	public function add_an_asset( $like_this_one, $with_this_name ) {
		$this->my_assets->put( $like_this_one, $with_this_name );
	}
	public function remove_the_asset( $with_this_name ) {
		$this->my_assets->remove( $like_this_one );
	}
}