<?php

namespace black_willow\bw_core;

class _BW_MAP {

	private $my_pairs;

	function __construct( $the_params_map, $constantify = FALSE ) {
		//var_dump( debug_backtrace() );
		//var_dump($the_params_map, $constantify );
		$this->my_pairs = new \Ds\Map();
		if ( $the_params_map !== null ) {
			foreach( $the_params_map as $this_key => $this_value ) {
				$the_new_key = str_replace( "the_", "my_", $this_key );
				$this->my_pairs->put( $the_new_key, $this_value );
				if ( $constantify ) {
					$the_new_constants = null;
					if( $the_new_key === "MY_CONSTANTS_MAP" ) {
						$the_new_constants = $the_params_map[ "MY_CONSTANTS_MAP" ];
					} else if ( $the_new_key === "MY_ERREX_MAP" ) {
						$the_new_constants = $the_params_map[ "MY_ERREX_MAP" ];
					}
					if ( $the_new_constants !== NULL ) {
						foreach( $the_new_constants as $this_name => $this_value ) {
							if ( \mb_strpos( $this_name, "MY_" ) !== FALSE ) {
								define( $this_name, $this_value );
							}
						}
					}
				}
			}
		}
	}
	public function add_a_pair( $with_this_key, $with_this_value ) {
		$this->my_pairs->put( $with_this_key, $with_this_value );
	}
	public function merge_a_map( $like_this_one ) {
		foreach( $like_this_one as $this_key => $this_value ) {
			$the_new_key = str_replace( "the_", "my_", $this_key );
			$this->my_pairs->put( $the_new_key, $this_value );
		}
		return $this->my_pairs;
	}
	public function add_a_node_map( $with_this_handle, $like_this_one ) {
		$the_new_map = new \Ds\Map();
		foreach( $like_this_one as $this_key => $this_value ) {
			$the_new_key = str_replace( "the_", "my_", $this_key );
			$the_new_map->put( $the_new_key, $this_value );
		}
		$this->my_pairs->put( $with_this_handle, $the_new_map );
		return $this->my_pairs;
	}
	public function get_my_pairs() {
		if ( ! isset( $this->my_pairs ) ) {
			return FALSE;
		}
		$return_me = $this->my_pairs;
		return $return_me;
	}
	public function get_a_pair( $this_item ) {
		$return_me = $this->my_pairs->get( $this_item );
		return $return_me;
	}
	public function unset_me() {
		unset( $this->my_pairs );
	}
}