<?php

namespace black_willow\bw_errex;

class BW_Generic_Error extends \black_willow\bw_core\_BW_EXCEPTION {

     public function __construct( $the_project ) {
          $the_error_handler = "\\bw\\errex\\bw_Exception_Handlers::bw_the_generic_error_handler";
          parent::__construct( $the_error_handler );
     }
     public function __toString() {
          return "The project $the_project is unable to load: $this->message";
     }
}

class BW_Framework_Loading_Error extends \black_willow\bw_core\_BW_EXCEPTION {

     public function __construct( $the_project ) {
          $the_error_handler = "\\bw\\errex\\bw_Exception_Handlers::bw_the_framework_error_handler";
          parent::__construct( $the_error_handler );
     }
     public function __toString() {
          return "The project $the_project is unable to load: $this->message";
     }
}
class BW_Missing_CSS_File_Exception extends \black_willow\bw_core\_BW_EXCEPTION {

     public function __construct( $the_file ) {
          $the_error_handler = "\\bw\\errex\\bw_Exception_Handlers::bw_missing_css_file_handler";
          parent::__construct( $the_error_handler );
     }
     public function __toString() {
          return "A stylesheet is missing: $this->message";
     }
}
class BW_Missing_SVG_File_Exception extends \black_willow\bw_core\_BW_EXCEPTION {

     public function __construct( $the_file ) {
          $the_error_handler = "\\bw\\errex\\bw_Exception_Handlers::bw_missing_svg_file_handler";
          parent::__construct( $the_error_handler );
     }
     public function __toString() {
          return "An SVG file is missing: $this->message";
     }
}
class BW_No_Such_Directory_Exception extends \black_willow\bw_core\_BW_EXCEPTION {

     public function __construct( $the_directory ) {
          $the_error_handler = "\\bw\\errex\\bw_Exception_Handlers::bw_no_such_directory_handler";
          parent::__construct( $the_error_handler );
     }
     public function __toString() {
          return "There's no directory with the name \"$the_directory\": $this->message";
     }
}
class BW_Cant_Load_Config_File_Exception extends \black_willow\bw_core\_BW_EXCEPTION {

     public function __construct( $the_directory ) {
          $the_error_handler = "\\bw\\errex\\bw_Exception_Handlers::bw_cant_load_config_file_handler";
          parent::__construct( $the_error_handler );
     }
     public function __toString() {
          return "There's no directory with the name \"$the_directory\": $this->message";
     }
}