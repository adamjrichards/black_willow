<?php

namespace black_willow\bw_system;

class BW_Source_Node extends \black_willow\bw_core\_BW_NODE {
	protected $my_handle;
	private $myself; // reference to the corresponding client-side DOM element's "myself"
	protected $my_attributes;

	function __construct( $the_params_map = null ) {
		parent::__construct( $the_params_map );
		$this->myself = $the_params_map[ "the_myself" ];
		$this->my_attributes = new \black_willow\bw_nodes\BW_Source_Node_Map( $the_params_map );
	}
	public function set_my_template( $the_template ) {
		$this->my_template = $the_template;
	}
	public function set_my_attributes( $to_these ) {
		$this->my_attributes = $to_these;
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
		return $this->my_attributes->get_my_name();
	}
	public function get_my_title() {
		return $this->my_attributes->get( "my_title" );
	}
	public function get_my_source() {
		return $this->my_attributes->get( "my_source" );
	}
	public function get_my_meta() {
		return $this->my_meta;
	}
	public function get_my_other_attributes() {
		return $this->my_attributes->get( "my_other_attributes" );
	}
	public function add_a_new_event( $the_trigger, $the_event ) {
		$this->my_events->put( $the_trigger, $the_event );
	}
}