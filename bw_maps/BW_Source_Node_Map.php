<?php

namespace black_willow\bw_maps;

class BW_Source_Node_Map extends \black_willow\bw_core\_BW_MAP {

	protected $my_sources;

	function __construct() {
          $the_params_map[ "my_html" ] = "The html goes here, should it exist.";
          $the_params_map[ "my_css" ] = "The css goes here, should it exist.";
          $the_params_map[ "my_js" ] = "The js goes here, should it exist.";
          $the_params_map[ "my_json" ] = "The json goes here, should it exist.";
          $the_params_map[ "my_php" ] = "The php goes here, should it exist.";
          $the_params_map[ "my_text" ] = "The text goes here, should it exist.";
          $the_params_map[ "my_sql" ] = "The sql goes here, should it exist.";
          $the_params_map[ "my_other" ] = "The other code goes here, should it exist.";
          $the_params_map[ "my_meta" ] = "The metadata goes here, should it exist.";
		parent::__construct( $the_params_map );
		$this->my_sources = parent::get_my_pairs();
	}

	public function get_my_sources() {
		return $this->my_sources;
	}
	public function put_all_to_my_sources( $the_params_map ) {
		$this->my_sources->putAll( $the_params_map );
	}

	public function get_my_html_source_code() {
		return $this->my_sources->get( "my_html" );
	}

	public function get_my_css_source_code() {
		return $this->my_sources->get( "my_css" );
	}

	public function get_my_js_source_code() {
		return $this->my_sources->get( "my_js" );
	}

	public function get_my_json_source_code() {
		return $this->my_sources->get( "my_json" );
	}

	public function get_my_php_source_code() {
		return $this->my_sources->get( "my_php" );
	}

	public function get_my_text_source_code() {
		return $this->my_sources->get( "my_text" );
	}

	public function get_my_sql_source_code() {
		return $this->my_sources->get( "my_sql" );
	}

	public function get_my_other_source_code() {
		return $this->my_sources->get( "my_other" );
	}

	public function get_my_meta() {
		return $this->my_sources->get( "my_meta" );
	}
}