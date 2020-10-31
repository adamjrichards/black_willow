<?php

namespace black_willow\bw_core;

class _BW_UID {

	private $my_UID;
	protected $my_prefix;
	protected $my_label;
	protected $my_suffix;
	protected $my_length;


	function __construct( $the_prefix, $the_label, $the_suffix, $the_length ) {

		$the_random = "_" . substr( microtime( true ) / rand(), 0 - abs( $the_length ) );
		
		if ( ! empty( $the_label ) ) {
			$the_label = "_$the_label";
		}
		if ( ! empty( $the_suffix ) ) {
			$the_suffix = "_$the_suffix";
		}

		$this->my_UID = "$the_prefix$the_label$the_random$the_suffix";
	}
	public function get_my_UID() {
		return $this->my_UID;
	}
	public function rerandomize_my_UID() {
		$this->my_UID = new _BW_UID(  $this->my_prefix, $this->my_label, $this->my_suffix, $this->my_length );
		return $this->my_UID;
	}
}