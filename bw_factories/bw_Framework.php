<?php

namespace black_willow\bw_factories;

abstract class bw_Framework {

	public static function get_me_a_new_BW_Page( $the_params_map ) {
		$the_new_page = new \black_willow\bw_framework\BW_Page( $the_params_map );
		return $the_new_page;
	}

	public static function get_me_a_new_BW_Site( $the_params_map ) {
		$the_new_site = new \black_willow\bw_framework\BW_Site( $the_params_map );
		return $the_new_site;
	}

	public static function load_an_application( $the_handle = "MY_APPLICATION" ) {
		$the_new_site = new \black_willow\bw_framework\BW_Site( $the_params_map );
		return $the_new_site;
	}

	public static function open_a_project( $the_handle = "MY_PROJECT" ) {
		$the_new_site = new \black_willow\bw_framework\BW_Site( $the_params_map );
		return $the_new_site;
	}
}