<?php

namespace black_willow\bw_toolbox;
use black_willow\bw_toolbox\bw_File_Info as finfo;

abstract class bw_Indexifier {

	/*/
	_BW_ALL_CAPS		:	core classes, never instantiated
	bw_Initial_Caps	:	Instantiable classes (bw_system, bw_framework, bw_data, bw_components,
	bw_Initial_Caps_Tag	:	HTML wrapper classes (bw_containers or bw_wrappers)
	bw_Initial_Caps	:	Abstract classes (bw_abstract)
	bw_all_lower_case	:	functions and procedures
	/*/


	static function recurse_it( $the_top_folder ) {
		$the_full_index = array();
		if ( finfo::there_is_a_folder_called( $the_top_folder ) ) {
			$all_the_nodes_in_the_folder = array_slice( scandir( $the_top_folder ), 2 );
			foreach( $all_the_nodes_in_the_folder as $this_particular_node ) {
				if( is_file( "$the_top_folder/$this_particular_node" ) ) {
					$the_full_index[] = "$the_top_folder/$this_particular_node";
				} else if( is_dir( "$the_top_folder/$this_particular_node" ) ) {
					recurse_it( "$the_top_folder/$this_particular_node" );
				}
			}
		}
		return $the_full_index;
	}

	public static function index_a_directory( $the_folder_uri ) {
		if ( finfo::there_is_a_folder_called( $the_folder_uri ) ) {
			//echo $the_folder_uri;
			$all_the_nodes_in_the_folder = scandir( $the_folder_uri);
			$all_the_files_in_the_folder = array();
			foreach( $all_the_nodes_in_the_folder as $this_particular_node ) {
				$this_particular_node = "$the_folder_uri/$this_particular_node";
				if( finfo::there_is_a_file_called( $this_particular_node ) ) {
					$all_the_files_in_the_folder[] = $this_particular_node;
				}
			}
		}
		return $all_the_files_in_the_folder;
	}


	public static function index_a_directory_recursively( $the_top_folder ) {

		$the_full_index;
		$the_full_index = self::recurse_it( $the_top_folder );
		return $the_full_index;
	}

	public static function index_a_resouce( $the_resource_folder ) {

		switch( $the_resource_folder ) {
			case "Poems"				: return index_a_directory_recursively( "resources/creative/poems/" );
			case "Stories"				: return index_a_directory_recursively( "resources/creative/stories/" );
			case "Obsolete"				: return index_a_directory_recursively( "resources/obsolete/" );
			case "Source"				: return index_a_directory_recursively( "resources/source/" );
			case "external"				: return index_a_directory_recursively( "resources/external/" );
			default						: return index_a_directory_recursively( "resources/" );
		}
		return FALSE;
	}
}