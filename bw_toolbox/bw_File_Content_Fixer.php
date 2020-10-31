<?php

namespace black_willow\bw_toolbox;

abstract class bw_File_Content_Fixer {

	function __construct( $the_file, $the_find, $the_fix ) {
		if ( \is_file( $the_file ) ) {
			$the_file_contents = \file_get_contents( $the_file );
			if ( \mb_strpos( $the_file_contents ) ) {
				\str_replace(  $the_find, $the_fix, $the_file_contents );
				\file_put_contents( $the_file, $the_file_contents );
			}
		}
	}

}