<?php

namespace black_willow\bw_toolbox;

abstract class bw_Metafier {

	/*/
	_BW_ALL_CAPS		:	core classes, never instantiated
	bw_Initial_Caps	:	Instantiable classes (bw_system, bw_framework, bw_data, bw_components,
	bw_Initial_Caps_Tag	:	HTML wrapper classes (bw_containers or bw_wrappers)
	bw_Initial_Caps	:	Abstract classes (bw_abstract)
	bw_all_lower_case	:	functions and procedures
	/*/

	public static function retrieve_the_metadata_from_the_post( $search_for_this, $in_this_post  ) {
		$the_file = file( "rg_rg_assets/rg_rg_posts/$in_this_post" );
		foreach( $the_file as $this_line ) {
			$this_line_length = strlen( $search_for_this ) + 2;
			if( strpos( $this_line, $search_for_this ) !== FALSE ) {
				return trim( substr( $this_line, $this_line_length ) );
			}
		}
	}
}