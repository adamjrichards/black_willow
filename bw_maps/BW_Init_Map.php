<?php

namespace black_willow\bw_maps;
use black_willow\bw_toolbox\bw_Mapifier as maps;

class BW_Init_Map extends \black_willow\bw_core\_BW_MAP {

	private $my_map;

	function  __construct( $the_map ) {
		/* The init map contains all the volatile params which go into
		   building the site.
			BW: meta, errex, server constants, framework defaults
			Project: meta, errex, content mapping, framework defaults
		*/
		if ( ! \function_exists( "maps::mapify_the_json_and_return_it" ) ) {
			include "bw_toolbox/bw_Mapifier.php";
		}

		// Assemble the BW init data
		$the_bw_init = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_BW_INIT_FILE" ] );
		$the_bw_meta = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_BW_META_FILE" ] );
		$the_bw_constants = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_BW_CONSTANTS_FILE" ] );
		$the_bw_errex = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_BW_ERREX_FILE" ] );
		$the_bw_framework_defaults = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_BW_FRAMEWORK_DEFAULTS_FILE" ] );

		// Assemble the project init data
		$the_project_init = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_PROJECT_INIT_FILE" ] );
		$the_project_meta = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_PROJECT_META_FILE" ] );
		$the_project_constants = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_PROJECT_CONSTANTS_FILE" ] );
		$the_project_errex = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_PROJECT_ERREX_FILE" ] );
		$the_contents_map = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_PROJECT_CONTENTS_MAP_FILE" ] );
		$the_project_framework_defaults = maps::mapify_the_json_and_return_it( $_SERVER[ "MY_PROJECT_FRAMEWORK_DEFAULTS_FILE" ] );

		$the_server_constants = new \Ds\Map( $_SERVER );
		$the_new_constants = $the_server_constants->merge( $the_bw_constants );
		$the_combined_constants = $the_new_constants->merge( $the_project_constants );
		$the_constants = $the_combined_constants->filter(
				function( $the_key ) {
					if( \mb_strpos( $the_key, "MY_" ) === 0 ){
						return $the_key;
					}
				} );

		$the_init = $the_bw_init->merge( $the_project_init );
		$the_meta = $the_bw_meta->merge( $the_project_meta );
		$the_errex = $the_bw_errex->merge( $the_project_errex );
		$the_framework_defaults = $the_bw_framework_defaults->merge( $the_project_framework_defaults );

		$the_init_map = new \Ds\Map();
		$the_init_map->putAll( [
						"MY_INIT_MAP" => $the_init,
						"MY_META_MAP" => $the_meta,
						"MY_CONSTANTS_MAP" => $the_constants,
						"MY_ERREX_MAP" => $the_errex,
						"MY_CONTENTS_MAP" => $the_contents_map,
						"MY_FRAMEWORK_MAP" => $the_framework_defaults
					] );

		parent::__construct( $the_init_map, TRUE );
		$this->my_map = parent::get_my_pairs();
		parent::unset_me();
	}
	public function get_my_map_as_an_array() {
		return $this->my_map->toArray();
	}
	public function get_my_map() {
		return $this->my_map;
	}
	public function get_my_init_map() {
		return $this->my_map->get( "MY_INIT_MAP" );
	}
	public function get_my_meta_map() {
		return $this->my_map->get( "MY_META_MAP" );
	}
	public function get_my_constants_map() {
		return $this->my_map->get( "MY_CONSTANTS_MAP" );
	}
	public function get_my_errex_map() {
		return $this->my_map->get( "MY_ERREX_MAP" );
	}
	public function get_my_contents_map() {
		return $this->my_map->get( "MY_CONTENTS_MAP" );
	}
	public function get_my_framework_map() {
		return $this->my_map->get( "MY_FRAMEWORK_MAP" );
	}
	public function get_my_project() {
		return $this->my_map->get( "MY_FRAMEWORK_MAP" )[ "MY_PROJECT" ];
	}

	public function kickstart_it( $the_kick ) {
		return $_SERVER[ "MY_PROJECT" ]->kickstart_it( $the_kick );
	}
}
