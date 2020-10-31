<?php

namespace black_willow\bw_toolbox;

class BW_File_Renamer {

	public $my_top_folder;

	function __construct( $the_top_folder ) {
		var_dump( $the_top_folder );
		if ( \file_exists( $the_top_folder ) AND \is_dir( $the_top_folder ) ) {
			$this->my_top_folder = $the_top_folder;
		}
	}

	public function rename_the_files( $in_this_folder ) {
		$the_contents = \opendir( $in_this_folder );
		while( ( $the_next_item = \readdir( $the_contents ) ) !== FALSE ) {
			if ( \is_file( $the_next_item )) {
				$the_file = \finfo_open();
				$the_file_info = \finfo_file( $the_file, $the_next_item );
			}
		}
	}
}

$the_renamer = new BW_File_Renamer( "E:\\Work files\\drphotos.psd" );