<?php

namespace black_willow\bw_factories;

abstract class bw_Navigation {

	public static function add_a_new_top_navbar( $with_this_handle = "MY_TOP_NAV" ) {
          $the_params_map = \black_willow\bw_init\bw_Init::get_me_the_page_params_array( $with_this_handle );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\black_willow\bw_containers\BW_Nav_Tag" );
		$the_new_top_nav = new \black_willow\bw_containers\BW_Nav_Tag( $the_params_map );
		return $the_new_top_nav;
	}

	public static function add_a_new_left_navbar( $with_this_handle = "MY_LEFT_NAV" ) {
          $the_params_map = \black_willow\bw_init\bw_Init::get_me_the_page_params_array( $with_this_handle );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\black_willow\bw_containers\BW_Nav_Tag" );
		$the_new_left_nav = new \black_willow\bw_containers\BW_Nav_Tag( $the_params_map );
		return $the_new_left_nav;
	}
}