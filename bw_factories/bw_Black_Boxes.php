<?php

namespace black_willow\bw_factories;
abstract class bw_Black_Boxes {

	public static function add_a_new_logo( $with_this_handle ) {
          $the_params_map = \black_willow\bw_init\bw_Init_Black_Boxes::get_me_the_logo_params_array( $with_this_handle  );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\wraps\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bbox\\BW_Logo" );
          $the_new_logo = new \bbox\BW_Logo( $the_params_map );
		return $the_new_logo;
	}

	public static function add_a_new_splash( $with_this_handle ) {
		$the_params_map = \black_willow\bw_init\bw_Init_Black_Boxes::get_me_the_splash_params_array( $with_this_handle );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\wraps\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bbox\\BW_Splash" );
		$the_new_splash = new \bbox\BW_Splash( $the_params_map );
		return $the_new_splash;
	}

	public static function add_a_new_banner( $with_this_handle ) {
		$the_params_map = \black_willow\bw_init\bw_Init_Black_Boxes::get_me_the_banner_params_array( $with_this_handle );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bbox\\BW_Banner" );
		$the_new_banner = new \bbox\BW_Banner( $the_params_map );
		return $the_new_banner;
	}

	public static function add_a_new_hub( $with_this_handle ) {
          $the_params_map = \black_willow\bw_init\bw_Init_Black_Boxes::get_me_the_hub_params_array( $with_this_handle );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bbox\\BW_Hub" );
		$the_new_hub = new \bbox\BW_Hub( $the_params_map );
		return $the_new_hub;
	}
}