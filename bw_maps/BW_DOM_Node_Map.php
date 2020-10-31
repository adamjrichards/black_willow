<?php

namespace black_willow\bw_maps;

class BW_DOM_Node_Map extends \black_willow\bw_core\_BW_MAP {

	private $my_map;

	function __construct( $the_params_map = null ) {
		parent::__construct( $the_params_map );
		$this->my_map = parent::get_my_pairs();
	}

	public function get_my_name() {
		if ( $this->my_map->hasKey( "my_name" ) ) {
			return $this->my_map->get( "my_name" );
		}
		return FALSE;
	}
	public function get_my_tagName() {
		if ( $this->my_map->hasKey( "my_tagName" ) ) {
			return $this->my_map->get( "my_tagName" );
		}
		return FALSE;
	}
	public function get_my_src() {
		if ( $this->my_map->hasKey( "my_src" ) ) {
			return $this->my_map->get( "my_src" );
		}
		return FALSE;
	}
	public function set_my_src( $to_this ) {
		if ( $this->my_map->hasKey( "my_src" ) ) {
			return $this->my_map->get( "my_src" );
		}
		return FALSE;
	}
	public function get_my_MIMEType() {
		return $this->my_map->get( "my_MIMEType" );
	}
	public function set_my_MIMEType( $to_this ) {
		if ( $this->my_map->hasKey( "my_MIMEType" ) ) {
			return $this->my_map->get( "my_MIMEType" );
		}
		return FALSE;
	}
	public function get_my_id() {
		if ( $this->my_map->hasKey( "my_id" ) ) {
			return $this->my_map->get( "my_id" );
		}
		return FALSE;
	}
	public function get_my_className() {
		if ( $this->my_map->hasKey( "my_className" ) ) {
			return $this->my_map->get( "my_className" );
		}
		return FALSE;
	}
	public function get_my_trigger() {
		if ( $this->my_map->hasKey( "my_trigger" ) ) {
			return $this->my_map->get( "my_trigger" );
		}
		return FALSE;
	}
	public function get_my_other_attributes() {
		if ( $this->my_map->hasKey( "my_other_attributes" ) ) {
			return $this->my_map->get( "my_other_attributes" );
		}
		return FALSE;
	}
	public function get_my_inline_css() {
		if ( $this->my_map->hasKey( "my_inline_css" ) ) {
			return $this->my_map->get( "my_inline_css" );
		}
		return FALSE;
	}
	public function get_my_source_file() {
		if ( $this->my_map->hasKey( "my_source_file" ) ) {
			return $this->my_map->get( "my_source_file" );
		}
		return FALSE;
	}
	public function get_my_source_folder() {
		if ( $this->my_map->hasKey( "my_source_folder" ) ) {
			return $this->my_map->get( "my_source_folder" );
		}
		return FALSE;
	}
}