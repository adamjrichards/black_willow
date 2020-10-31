<?php

namespace black_willow\bw_tag_groups;

use black_willow\bw_factories as facs;


class BW_Script_Group_From_Directory extends \black_willow\bw_tag_groups\BW_Script_Group {

	// Creates a script group from the contents of a directory.

	function __construct( $from_this_source, $recurse = TRUE ) {
		parent::__construct( $from_this_source );
		$this->my_code_queue->push( "\n##!--------- Script group \"$from_this_source\" starts here. --------->" );
		$this->tag_my_files_recursively( $from_this_source );
		$this->my_code_queue->push( "\n##!--------- Script group \"$from_this_source\" ends here. --------->" );
	}

	public function tag_my_files_recursively( $from_this_directory ) {
		$the_directory = "";
		if ( \mb_strpos( $from_this_directory, MY_PROJECT_PREFIX ) !== FALSE ) {
			$the_directory = MY_PROJECT_JS . "/$from_this_directory";
		} else if ( \mb_strpos( $from_this_directory, MY_BW_PREFIX ) !== FALSE ) {
			$the_directory = MY_BW_JS . "/$from_this_directory";
		} else {
			return false;
		}
		$the_folder_contents = \scandir( $the_directory );
		$the_legit_items = \array_filter( $the_folder_contents,
				function( $the_item  ) {
					return \preg_match( "/\b[\.\_]/", $the_item ) === 1;
				} );
		foreach( $the_legit_items as $this_item ) {
			if ( \is_file( "$the_directory/$this_item" ) ) {
				$the_new_tag = $this->make_me_a_new_script_tag(  "$the_directory/$this_item" );
				$this->my_code_queue->push( $the_new_tag );
			} else if ( \is_dir( "$the_directory/$this_item") ) {
				if ( $recurse === TRUE ) {
					$this->tag_my_files_recursively( "$the_directory/$this_item" );
				} else {
					break;
				}
			}
		}
	}
}