<?php

namespace black_willow\bw_factories;
use black_willow\bw_containers as bcons;

abstract class bw_Containers {

	public static function get_me_a_new_BW_HTML_Tag( $with_this_handle, $with_this_value ) {
          $GLOBALS[ $with_this_handle ] = new bcons\BW_HTML_Tag( $with_this_value );
		return $GLOBALS[ $with_this_handle ];
	}
	public static function get_me_a_new_BW_Head_Tag( $with_this_handle, $with_this_value ) {
          $GLOBALS[ $with_this_handle ] = new bcons\BW_Head_Tag( $with_this_value );
		return $GLOBALS[ $with_this_handle ];
	}
	public static function get_me_a_new_BW_Body_Tag(  $with_this_handle, $with_this_value ) {
          $GLOBALS[ $with_this_handle ] = new bcons\BW_Body_Tag( $with_this_value );
		return $GLOBALS[ $with_this_handle ];
	}
	public static function get_me_a_new_BW_Header_Tag(  $with_this_handle, $with_this_value ) {
          $GLOBALS[ $with_this_handle ] = new bcons\BW_Header_Tag( $with_this_value );
		return $GLOBALS[ $with_this_handle ];
	}
	public static function get_me_a_new_BW_Footer_Tag(  $with_this_handle, $with_this_value ) {
          $GLOBALS[ $with_this_handle ] = new bcons\BW_Footer_Tag( $with_this_value );
		return $GLOBALS[ $with_this_handle ];
	}
	public static function get_me_a_new_BW_Main_Tag( $with_this_handle, $with_this_value ) {
          $GLOBALS[ $with_this_handle ] = new bcons\BW_Main_Tag( $with_this_value );
		return $GLOBALS[ $with_this_handle ];
	}
	public static function get_me_a_new_BW_Section_Tag( $with_this_handle, $with_this_value ) {
          $GLOBALS[ $with_this_handle ] = new bcons\BW_Section_Tag( $with_this_value );
		return $GLOBALS[ $with_this_handle ];
	}
	public static function get_me_a_new_BW_Div_Tag(  $with_this_handle, $with_this_value ) {
          $GLOBALS[ $with_this_handle ] = new bcons\BW_Div_Tag( $with_this_value );
		return $GLOBALS[ $with_this_handle ];
	}
	public static function get_me_a_new_BW_Aside_Tag( $with_this_handle, $with_this_value ) {
          $GLOBALS[ $with_this_handle ] = new bcons\BW_Aside_Tag( $with_this_value );
		return $GLOBALS[ $with_this_handle ];
	}
}