<?php

namespace black_willow\bw_factories;

abstract class bw_Static_Pages {

	public static function add_a_new_smallprint(  $with_this_name ) {
          $the_params_map = \black_willow\bw_init\bw_Init_Static_Pages::get_me_the_smallprint_params_array( $with_this_name );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\stats\\BW_Smallprint" );
          $the_new_smallprint = new \bw\stats\BW_Smallprint( $the_params_map );
		return $the_new_smallprint;
	}

	public static function add_a_new_meta( $with_this_name ) {
          $the_params_map = \black_willow\bw_init\bw_Init_Static_Pages::get_me_the_meta_params_array( $with_this_name );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\stats\\BW_Meta" );
          $the_new_meta = new \bw\stats\BW_Meta( $the_params_map );
		return $the_new_meta;
	}

	public static function add_a_new_about_me( $with_this_name ) {
          $the_params_map = \black_willow\bw_init\bw_Init_Static_Pages::get_me_the_about_me_params_array( $with_this_name );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\stats\\BW_About_Me" );
          $the_new_about = new \bw\stats\BW_About_Me( $the_params_map );
		return $the_new_about;
	}

	public static function add_a_new_contact_me( $with_this_name ) {
          $the_params_map = \black_willow\bw_init\bw_Init_Static_Pages::get_me_the_contact_me_params_array( $with_this_name );
          $the_tag_class = "BW_" . ucfirst( $the_params_map[ "the_tagName" ] ) . "_Tag";
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\black_willow\bw_containers\\$the_tag_class" );
		$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\stats\\BW_Contact_Me" );
          $the_new_contact = new \bw\stats\BW_Contact_Me( $the_params_map );
		return $the_new_contact;
	}
}