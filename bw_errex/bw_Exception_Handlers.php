<?php

namespace black_willow\bw_errex;

abstract class bw_Exception_Handlers {

     public static function bw_generic_error_handler() {
		\line_out( __FILE__, __LINE__, "generic" );
          // file search
     }
     public static function bw_missing_css_file_handler() {
		\line_out( __FILE__, __LINE__, "missing" );
          // file search
     }
     public static function bw_framework_loading_error() {
		\line_out( __FILE__, __LINE__, "project" );
          // file search
     }
     public static function bw_missing_svg_file_handler() {
          // file search
     }
     public static function bw_no_such_directory_handler() {
          // file search
     }

     public static function bw_cant_load_config_file_handler() {
          // file search
     }

}