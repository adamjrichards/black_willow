<?php

  namespace black_willow\bw_system;
  
  class BW_JSON_Reader {
       
       private $my_json;
       
       function __construct( $the_input ) {
            $this->my_input = $the_input;
            $the_file = \file_get_contents( $the_input );
            $this->my_json = \json_decode( $the_file );
       }
       public function get_my_json() { 
            //lnout( __FILE__, __LINE__, $this->my_json );
            return $this->my_json;
       }
  }