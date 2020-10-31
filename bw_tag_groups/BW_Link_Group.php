<?php

namespace black_willow\bw_tag_groups;

class BW_Link_Group extends \black_willow\bw_nodes\BW_Tag_Group {

     function __construct( $the_source ) {
		parent::__construct( $the_source );
		$the_JSON = \json_decode( \file_get_contents( $the_source ), TRUE );
		$the_new_map = new \Ds\Map( $the_JSON );
		$this->my_code_queue->push( "\n##!--------- Tag group $the_source starts here. --------- >\n" );
		foreach( $the_new_map as $the_key => $the_value ) {
			$the_new_link_map = new \Ds\Map( $the_value );
			$the_new_link = new \black_willow\bw_tags\BW_Link_Tag( $the_new_link_map );
		}
		$this->my_code_queue->push( "\n##!--------- Tag group $the_source ends here. --------- >\n" );
     }
}