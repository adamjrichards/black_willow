<?php

namespace black_willow\bw_factories;
abstract class bw_Tags {

     public static function get_me_a_new_image_tag( $the_params_map = null ) {
          return new \black_willow\bw_tags\BW_Image_Tag( $the_params_map );
     }
     public static function get_me_a_new_object_tag( $the_params_map = null ) {
          return new \black_willow\bw_tags\BW_Object_Tag( $the_params_map );
     }
     public static function get_me_a_new_figure_tag( $the_params_map = null ) {
          return new \black_willow\bw_tags\BW_Figure_Tag( $the_params_map );
     }
     public static function get_me_a_new_picture_tag( $the_params_map = null ) {
          return new \black_willow\bw_tags\BW_Picture_Tag( $the_params_map );
     }
     public static function get_me_a_new_script_tag( $the_params_map = null ) {
          return new \black_willow\bw_tags\BW_Script_Tag( $the_params_map );
     }
     public static function get_me_a_new_link_tag( $the_params_map = null ) {
          return new \black_willow\bw_tags\BW_Link_Tag( $the_params_map );
     }
}