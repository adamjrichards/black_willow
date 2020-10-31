<?php

namespace black_willow\bw_maps;

class BW_Toy_Map extends \black_willow\bw_core\_BW_MAP {

	protected $my_sources;

	function __construct( $the_params_map ) {
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
/*/
if ( isset( $_REQUEST[ "srcd" ] ) ) {
	new Source_Map(
		$_REQUEST[ "html" ],
		$_REQUEST[ "css" ],
		$_REQUEST[ "js" ],
		$_REQUEST[ "json" ],
		$_REQUEST[ "php" ],
		$_REQUEST[ "txt" ],
		$_REQUEST[ "dat" ],
		$_REQUEST[ "other" ]
		);
}
/*/