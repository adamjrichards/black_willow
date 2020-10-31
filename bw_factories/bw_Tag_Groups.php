<?php

namespace black_willow\bw_factories;
use \black_willow\bw_tag_groups as btagg;

abstract class bw_Tag_Groups {

	public static function get_me_a_new_script_group( $from_this_source ) {
		// \line_out( __FILE__, __LINE__, $from_this_source );
		if ( \is_dir( MY_BW_JS . "/$from_this_source" ) OR \is_dir( MY_PROJECT_JS . "/$from_this_source" ) ) {
			$the_new_group = new btagg\BW_Script_Group_From_Directory( $from_this_source );
		} else if ( \is_file( $from_this_source ) ) {
			$the_JSON = \json_decode( \file_get_contents( MY_PROJECT_JSON . "/$from_this_source" ), TRUE );
			$the_new_group = new btagg\BW_Script_Group_From_File( $the_JSON );
		}
		return $the_new_group;
	}
	public static function get_me_a_new_link_group( $from_this_source ) {
		if ( \file_exists( MY_PROJECT_JSON . "/$from_this_source" ) ) {
			$the_new_group = new btagg\BW_Link_Group( MY_PROJECT_JSON . "/$from_this_source" );
		} else if ( \file_exists( MY_BW_JSON . "/$from_this_source" ) ) {
			$the_new_group = new btagg\BW_Link_Group( MY_BW_JSON . "/$from_this_source" );
		} else {
			$the_new_group = "\n##!-- This is a placeholder for the link group $from_this_source. -->";
		}
		return $the_new_group;
	}
	public static function get_me_a_new_meta_group( $from_this_source ) {
		if ( \file_exists( MY_PROJECT_JSON . "/$from_this_source" ) ) {
			$the_new_group = new btagg\BW_Meta_Group( MY_PROJECT_JSON . "/$from_this_source" );
		} else if ( \file_exists( MY_BW_JSON . "/$from_this_source" ) ) {
			$the_new_group = new btagg\BW_Meta_Group( MY_BW_JSON . "/$from_this_source" );
		} else {
			$the_new_group = "\n##!-- This is a placeholder for the meta group $from_this_source. -->";
		}
		return $the_new_group;
	}

	public static function merge_two_tag_groups( $from_this_source, $and_from_this_source ) {
		foreach( $from_this_source as $this_source ) {
			$the_start_pos = \mb_strpos( $and_from_this_source, "ends here. --------->" );
			$the_end_pos = \mb_strpos( $and_from_this_source, "##!--------- ", $the_start_pos );
			$the_length = $the_end_pos - $the_start_pos - 13;
			$the_insertion = \mb_strcut( $and_from_this_source, $the_start_pos + 21, $the_length );
			$the_insertion_point = \mb_strpos( $from_this_source, "##!--------- " );
			$the_new_group = \mb_substr( $from_this_source, 0, $the_insertion_point ) . $the_insertion . \mb_substr( $from_this_source, $the_insertion_point );
		}
		return $the_new_group;
	}

	public static function get_my_tag_group_string() {}

}