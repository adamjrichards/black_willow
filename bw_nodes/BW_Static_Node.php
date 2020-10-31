<?php

namespace black_willow\bw_nodes;

class BW_Static_Node extends \black_willow\bw_system\BW_DOM_Node {

	private $my_sections;
	private $my_resources;
	private $my_html_string;
	private $my_html_array;

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		$this->my_sections = new \black_willow\bw_maps\BW_Static_Node_Map();
		$this->my_resources = [ null, $this->my_html_string ];
	}

	public function add_a_new_section( $of_this_type, $with_this_content ) {
		if ( file_exists( $with_this_content ) ) {
			$the_string_we_need = file_get_contents( $with_this_content );
			$the_array_we_need = file( $with_this_content );
		}
		$this->my_html_string .= $the_string_we_need;
		$this->my_html_array = array_merge( $this->my_html_array, $the_array_we_need );
	}

	public function get_my_string() {
		return $this->my_html_string;
	}
	public function get_my_array() {
		return $this->my_html_array;
	}

	public function set_my_string( $to_this ) {
		$this->my_html_string = $to_this;
	}
	public function set_my_array( $to_this ) {
		$this->my_html_array = $to_this;
	}
}