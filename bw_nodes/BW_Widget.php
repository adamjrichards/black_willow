<?php

namespace black_willow\bw_nodes;

class BW_Widget extends \black_willow\bw_system\BW_DOM_Node {

	public $my_widget_id;
	public $my_tag;
	public $my_type;
	public $my_controls;

	function __construct( $the_params_map = "default" ) {
          if ( $the_params_map === "default" ) {
               $the_params_map = \black_willow\bw_init\bw_Init::get_me_the_default_params_array( "default" );
          }
		parent::__construct( $the_params_map );
		$this->my_tag = new \Ds\Map();
		$this->my_widget_id = $the_params_map[ "the_id" ];
	}

	public function fly_in_my_content( ...$this_content ) {
		foreach ( $this_content as $this_id => $this_content ) {
			$this->my_tag->put( $this_id, $this_content );
		}
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