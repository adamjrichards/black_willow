<?php

namespace black_willow\bw_nodes;

class BW_Toy extends \black_willow\bw_system\BW_DOM_Node {

     protected $my_package;

     function __construct( $the_params_map = "MY_DEFAULT_PARAMS_ARRAY" ) {
          if ( $the_params_map === "MY_DEFAULT_PARAMS_ARRAY" ) {
               $the_params_map = $GLOBALS[ "MY_DEFAULT_PARAMS_ARRAY" ];
          }
		parent::__construct( $the_params_map );
          $this->my_package = [ $this->my_id, $this->my_className, $this->my_target ];
     }
     public function get_my_package() {
          return $this->my_target;
     }
     public function get_my_target() {
          return $this->my_target;
     }
     public function get_my_className() {
          return $this->my_className;
     }
     public function get_my_id() {
          return $this->my_id;
     }
}