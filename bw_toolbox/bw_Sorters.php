<?php

namespace black_willow\bw_toolbox;

abstract class bw_Sorters {

	public static function sort_the_assets_by_title ( $the_asset_type ) {
		$the_assets_sorted_by_title = [];
		$the_assets_sorted_by_filename = array_slice( scandir( get_the_filepath_for_the_asset_type( $the_asset_type ) ), 2 );

		$the_file = file( "rg_rg_assets/rg_rg_$the_asset_type" );
		foreach( $the_file as $this_line ) {
			if (strpos($this_line, "Title") !== FALSE) {
				$the_assets_sorted_by_title = array_push( $the_assets_sorted_by_title, trim( substr( $this_line, 9 ) ) );
			}
		}
		return $the_assets_sorted_by_title;
	}


	public static function sort_the_posts( $this_way ) {

		$the_posts_sorted_by_date = [];
		$the_posts_sorted_by_categories = [];
		$the_posts_sorted_by_tags = [];
		$the_posts_sorted_by_title = [];
		$the_posts_sorted_by_subsite = [];
		$the_posts_sorted_by_number = [];
		$the_posts_sorted_by_id = [];

		$the_posts_sorted_by_filename = array_slice( scandir( "rg_rg_assets/rg_rg_posts" ), 2 );

		foreach( $the_posts_sorted_by_filename as $this_post ) {
			$the_metadata = retrieve_the_metadata_from_the_post( $this_way, $this_post );
			switch( $this_way ) {
				case "Date"			: 	$the_posts_sorted_by_date[ $the_metadata ] = $this_post;
										break;
				case "Categories"	: 	$the_posts_sorted_by_categories[ $the_metadata ] = $this_post;
										break;
				case "Tags"			: 	$the_posts_sorted_by_tags[ $the_metadata ] = $this_post;
										break;
				case "Title"		: 	$the_posts_sorted_by_title[ $the_metadata ] = $this_post;
										break;
				case "Subsite"		: 	$the_posts_sorted_by_subsite[ $the_metadata ] = $this_post;
										break;
				case "Number"		: 	$the_posts_sorted_by_number[ $the_metadata ] = $this_post;
										break;
				case "ID"			: 	$the_posts_sorted_by_id[ $the_metadata ] = $this_post;
										break;
				case "Filename"		:
				default				: 	return $the_posts_sorted_by_filename;
			}
		}
		switch( $this_way ) {
			case "Date"			: return $the_posts_sorted_by_date;
			case "Categories"	: return $the_posts_sorted_by_categories;
			case "Tags"			: return $the_posts_sorted_by_tags;
			case "Title"		: return $the_posts_sorted_by_title;
			case "Subsite"		: return $the_posts_sorted_by_subsite;
			case "Number"		: return $the_posts_sorted_by_number;
			case "ID"			: return $the_posts_sorted_by_id;
		}
	}


	public static function retrieve_the_assets_randomly ( $the_asset_type ) {
		$the_assets_sorted_by_filename = scandir( get_the_filepath_for_the_asset_type( $the_asset_type ) );
		$the_assets_sorted_randomly = [];
		foreach( $the_assets_sorted_by_filename as $this_file ) {
			$the_assets_sorted_randomly = \array_rand($the_assets_sorted_by_filename);
		}
		return $the_assets_sorted_randomly;
	}


	public static function retrieve_the_assets_unsorted ( $the_asset_type ) {
		return scandir( get_the_filepath_for_the_asset_type( $the_asset_type ), SCANDIR_SORT_NONE );
	}
	public static function retrieve_the_assets_sorted_ascending ( $the_asset_type ) {
		return scandir( get_the_filepath_for_the_asset_type( $the_asset_type ), SCANDIR_SORT_ASCENDING );
	}
	public static function retrieve_the_assets_sorted_descending ( $the_asset_type ) {
		return scandir( get_the_filepath_for_the_asset_type( $the_asset_type ), SCANDIR_SORT_DESCENDING );
	}



	public static function get_posts_sorted_by_date() {
		return sort_the_posts("Date");
	}

	public static function get_posts_sorted_by_categories() {
		return sort_the_posts("Categories");
	}

	public static function get_posts_sorted_by_tags () {
		return sort_the_posts( "Tags" );
	}
	public static function get_posts_sorted_by_title () {
		return sort_the_posts( "Titles" );
	}
	public static function get_posts_sorted_by_subsite () {
		return sort_the_posts( "Subsite" );
	}
	public static function get_posts_sorted_by_number () {
		return sort_the_posts( "Number" );
	}
	public static function get_posts_sorted_by_id () {
		return sort_the_posts( "ID" );
	}
	public static function get_posts_sorted_by_filename () {
		return sort_the_posts( "Filename" );
	}
}