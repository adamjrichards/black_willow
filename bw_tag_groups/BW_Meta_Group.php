<?php

namespace black_willow\bw_tag_groups;

class BW_Meta_Group extends \black_willow\bw_nodes\BW_Tag_Group {

	function __construct( $the_source ) {
		parent::__construct( $the_source );
		$this->my_code_queue->push( "\n##!--------- Meta tag group $this->my_group_uid starts here. -------->\n" );
		$the_json = \json_decode( \file_get_contents( $the_source ), TRUE );
		foreach ( $the_json as $this_key => $this_value ) {
			$this->make_my_meta_pairs( $this_key, $this_value );
		}
		$this->my_code_queue->push( "\n##!--------- Tag group $this->my_group_uid end here. --------->\n" );
	}
	function make_my_meta_pairs( $the_name, $the_value, $the_type = "name" ) {
		if ( \is_string( $the_value ) ) {
			$the_new_tag = new \black_willow\bw_tags\BW_Meta_Tag( $the_name, $the_value, $the_type );
			$this->my_code_queue->push( $the_new_tag->get_my_HTML_tag() );
		} else if ( \is_array( $the_value ) ){
			$the_pairs = $the_value;
			foreach ( $the_pairs as $this_name => $this_value ) {
				$this->make_my_meta_pairs( $this_name, $this_value, $the_type );
			}
		}
	}
}