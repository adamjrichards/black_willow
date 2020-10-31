<?php

namespace black_willow\bw_factories;

$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_init\\bw_Init_Components" );

abstract class bw_Components {

	public static function add_a_new_gateway( $with_this_handle ) {
          $the_params_map = \black_willow\bw_init\bw_Init_Components::get_me_the_gateway_params_array( $with_this_handle );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_components\\BW_Gateway" );
		$the_new_gateway = new \black_willow\bw_components\BW_Gateway( $the_params_map );
		return $the_new_gateway;
	}

	public static function add_a_new_image_set( $with_this_handle ) {
          $the_params_map = \black_willow\bw_init\bw_Init_Components::get_me_the_image_set_params_array( $with_this_handle );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_components\\BW_Image_Set" );
		$the_new_image_set = new \black_willow\bw_components\BW_Image_Set( $the_params_map );
		return $the_new_image_set;
	}

	public static function add_a_new_sidebar( $with_this_handle ) {
          $the_params_map = \black_willow\bw_init\bw_Init_Components::get_me_the_sidebar_params_array( $with_this_handle );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_components\\BW_Sidebar" );
		$the_new_sidebar = new \black_willow\bw_components\BW_Sidebar( $the_params_map );
		return $the_new_sidebar; }

	public static function add_a_new_portal( $the_handle = "MY_PORTAL" ) {
		$the_params_map = \black_willow\bw_init\bw_Init_Components::get_me_the_portal_params_array( $the_handle );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_components\\BW_Portal" );
		$the_new_portal = new \black_willow\bw_components\BW_Portal( $the_params_map );
		return $the_new_portal;
	}
}