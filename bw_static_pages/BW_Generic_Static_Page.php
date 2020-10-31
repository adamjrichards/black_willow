<?php

namespace black_willow\bw_static_pages;

class BW_Generic_Static_Page extends\black_willow\bw_nodes\BW_Static_Node {

	function __construct( $the_params_map ) {
		//\line_out( __FILE__, __LINE__, $the_params_map );
		parent::__construct( $the_params_map );
		//\line_out( __FILE__, __LINE__, $this->get_my_children() );
		$this->my_node_opener = "\n
			##!--------------- The {$this->get_my_handle()}' {$this->get_my_tagName()} begins here. -------------->
			##{$this->get_my_tagName()}  id='{$this->get_my_id()}' class='{$this->get_my_className()}'>\n";

          $this->my_node_closer = "\n##/{$this->get_my_tagName()}>\n
			##!--------------- The '{$this->get_my_handle()}' {$this->get_my_tagName()} ends here. -------------->\n";
	}
}