<?php

namespace black_willow\bw_factories;

abstract class bw_UIDs {

	public static function get_me_a_new_UID( $the_params_map = null  ) {

		if ( ! $the_params_map === null ) {
			if ( $the_params_map->hasKey( "the_prefix") ) {
				$my_prefix = $the_params_map->get( "the_prefix" );
			}

			if ( $the_params_map->hasKey( "the_label") ) {
				$my_label = $the_params_map->get( "the_label" );
			}

			if ( $the_params_map->hasKey( "the_suffix") ) {
				$my_suffix = $the_params_map->get( "the_suffix" );
			}

			if ( $the_params_map->hasKey( "my_length ") ) {
				$my_length = $the_params_map->get( "my_length " );
			}
		} else {
				$my_prefix = MY_PROJECT_PREFIX;
				$my_label = "";
				$my_suffix = "";
				$my_length = 5;
		}

          $the_UID = new \black_willow\bw_system\BW_UID( $my_prefix, $my_label, $my_suffix, $my_length );
		return $the_UID->get_my_UID();
	}
	public static function get_me_a_new_meta_group_UID(  $my_prefix = MY_PROJECT_PREFIX, $my_label = "meta", $my_suffix = "", $my_length = 5 ) {
          $the_UID = self::get_me_a_new_UID( $my_prefix, $my_label, $my_suffix, $my_length );
		return $the_UID;
	}
}