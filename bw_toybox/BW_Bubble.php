<?php

namespace black_willow\bw_toys;

class BW_Bubble extends \black_willow\bw_nodes\BW_Toy {

     private $my_tag;

	function __construct(  $the_id, $the_className, $the_target  ) {
          parent::__construct( [ "the_id" => $the_id, "the_className" => $the_className, "the_target" => $the_target ] );
          $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_svg( "\\bw_assets\\svg\\bw_basic_shapes", "black_box" );
          $this->my_tag = "\n##use id='$the_id' class='$the_className' href='#the_bw_bubble' />\n";
     }
     public function get_my_tag() {
          return $this->my_tag;
     }
}