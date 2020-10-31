<?php

namespace black_willow\bw_static_pages;

class BW_About_Me extends\black_willow\bw_nodes\BW_Static_Node {

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		$this->my_node_opener = "\n
			##!--------------- The About_Me section begins here. -------------->
			##{$this->get_my_tagName()}  id='{$this->get_my_id()}' class='{$this->get_my_className()}'>\n";

          $this->my_node_closer = "\n##/{$this->get_my_tagName()}>\n
			##!--------------- The About_Me section ends here. -------------->\n";
	}
}