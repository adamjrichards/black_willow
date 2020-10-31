<?php

namespace black_willow\bw_factories;

abstract class bw_Applications {

	public static function load_a_new_application( $the_handle = "MY_APPLICATION" ) {
          $the_params_map = \black_willow\bw_init\bw_Init::get_me_the_application_params_array( $the_handle );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\apps\BW_Application" );
		$the_new_application = new \bw\black_willow\bw_framework\BW_Application( $the_params_map );
		return $the_new_application;
	}
}