<?php

namespace black_willow\bw_toolbox;

// get the local BW server variables from http.conf and make them constants

abstract class bw_Constantifier {

	public static function constantify_this_list( $the_list ){
		if ( \is_null( "MY_BW_JSON" ) ) {
			define( "MY_BW_JSON", $_SERVER[ "MY_BW_JSON" ] );
		}
		if ( \is_null( "MY_PROJECT_JSON" ) ) {
			define( "MY_PROJECT_JSON", $_SERVER[ "MY_PROJECT_JSON" ] );
		}

		if ( ! empty( $the_list ) ) {
			foreach ( $the_list as $this_key => $this_value ) {
				define( $this_key, $this_value );
			}
		}
	}
	public static function constantify_this_list_and_return_it( $the_list ){
		if ( \is_null( "MY_BW_JSON" ) ) {
			define( "MY_BW_JSON", $_SERVER[ "MY_BW_JSON" ] );
		}
		if ( \is_null( "MY_PROJECT_JSON" ) ) {
			define( "MY_PROJECT_JSON", $_SERVER[ "MY_PROJECT_JSON" ] );
		}
		$return_me = new \Ds\Map();
		if ( ! empty( $the_list ) ) {
			foreach ( $the_list as $this_key => $this_value ) {
				define( $this_key, $this_value );
				$return_me->put( $this_key, $this_value );
			}
		}
		return $return_me;
	}

	public static function constantify_my_server_variables( $with_this_prefix ) {
		$the_server_variables = new \Ds\Map( $_SERVER );

		$the_callback = function( $the_key, $the_value ) {
			if( \strpos( $the_key, "MY_" ) === 0 ) {
				define( $the_key, $the_value );
				return TRUE;
			}
		};
		$the_constants = $the_server_variables->filter( $the_callback );
		return $the_constants;
	}

}