<?php

namespace black_willow\bw_toolbox;

abstract class bw_Mapifier {

	/*/
	_BW_ALL_CAPS		:	core classes, never instantiated
	bw_Initial_Caps	:	Instantiable classes (bw_system, bw_framework, bw_data, bw_components,
	bw_Initial_Caps_Tag	:	HTML wrapper classes (bw_containers or bw_wrappers)
	bw_Initial_Caps	:	Abstract classes (bw_abstract)
	bw_all_lower_case	:	functions and procedures
	/*/

	public static function recurse_the_json( $this_json, $to_this_map, $change_the_to_my = TRUE ) {
		foreach ( $this_json as $the_key => $the_value ) {
			if ( $change_the_to_my ) {
				$the_key = \str_replace( "the_", "my_", $the_key );
			}
			if ( is_string( $the_value ) ) {
				$to_this_map->put( $the_key, $the_value );
			} else {
				$the_new_map = new \Ds\Map();
				$to_this_map->put( $the_key, $the_new_map );
				self::recurse_the_json( $the_value, $the_new_map );
			}
		}
		return $to_this_map;
	}
     public static function mapify_the_json_to_this_map( $from_this_file, $to_this_map ) {
		$the_json = \json_decode( \file_get_contents( $from_this_file ) );
		return self::recurse_the_json( $the_json, $to_this_map );
	}

     public static function mapify_the_json_and_return_it( $from_this_file ) {
		$the_json = \json_decode( \file_get_contents( $from_this_file ) );
		$the_map = new \Ds\Map();
		return self::recurse_the_json( $the_json, $the_map );
	}
	public static function mapify_the_JSON( $from_this_file, $to_this_map = null ) {
		if ( \is_null( $to_this_map ) ) {
			return $this->mapify_the_json_and_return_it($from_this_file);
		} else {
			return $this->mapify_the_json_to_this_map( $from_this_file, $to_this_map );
		}
	}
}
