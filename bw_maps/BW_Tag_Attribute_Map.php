<?php

namespace black_willow\bw_maps;

class BW_Tag_Attribute_Map extends \black_willow\bw_core\_BW_MAP {

	protected $my_attributes;

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		$this->my_attributes = parent::get_my_pairs();
	}
	public function add_to_my_attributes( $this_attribute, $with_this_value ) {
		return $this->my_attributes->put( $this_attribute, $with_this_value );
	}
	public function get_my_attribute_keys() {
		return $this->my_attributes->keys();
	}
	public function get_my_attributes() {
		return $this->my_attributes;
	}
	public function get_my_tagName() {
		return $this->my_attributes->get( "my_tagName" );
	}
	public function get_my_id() {
		return $this->my_attributes->get( "my_id" );
	}
	public function get_my_className() {
		return $this->my_attributes->get( "my_className" );
	}
	public function get_my_name() {
		return $this->my_attributes->get( "my_name" );
	}
	public function get_my_title() {
		return $this->my_attributes->get( "my_title" );
	}
	public function get_my_src() {
		return $this->my_attributes->get( "my_src" );
	}
	public function get_my_inline_css() {
		return $this->my_attributes->get( "my_inline_css" );
	}
	public function get_my_trigger() {
		return $this->my_attributes->get( "my_trigger" );
	}
	public function get_my_other_attributes() {
		return $this->my_attributes->get( "my_other_attributes" );
	}

	// script tags only
	public function get_my_defer() {
		return $this->my_attributes->get( "my_defer" );
	}
	public function get_my_async() {
		return $this->my_attributes->get( "my_async" );
	}

}
/*
 * public function get_my_() {
		return $this->my_attributes->get( "my_" );
	}
 */