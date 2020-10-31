<?php

namespace black_willow\bw_core;

class _BW_EXCEPTION extends \ErrorException {

     protected $my_exception_handler;
     protected $my_code;
     protected $my_message;
     protected $my_previous;

     public function __construct( $the_exception_handler = "error", $the_message = "default", $the_code = 0, \Exception $the_previous = null ) {
          if ( $the_exception_handler === "error" ) {
               $the_exception_handler = MY_DEFAULT_ERROR_HANDLER;
          } else if ( $the_exception_handler === "exception" ) {
               $the_exception_handler = MY_DEFAULT_EXCEPTION_HANDLER;
          } else {
               $this->my_exception_handler = $the_exception_handler;
          }
          if ( $the_message === "default" ) {
               $the_message = MY_DEFAULT_ERROR_MESSAGE;
          }
          parent::__construct( $the_message, $the_code, $the_previous );
          $this->my_message = $the_message;
          $this->my_code = $the_code;
          $this->my_previous = $the_previous;
          $this->my_exception_handler = $the_exception_handler;
          \set_exception_handler( $this->my_exception_handler );
     }
}

