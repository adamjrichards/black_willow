<?php

namespace black_willow\bw_toolbox;

abstract class bw_Getters {

	public static function get_the_filepath_for_the_asset_type( $the_asset_type ) {
		$the_folder = $GLOBALS[ "MY_PROJECT" ]->get_my_contents_map();
		return $the_folder->get( $the_asset_type );
	}
}