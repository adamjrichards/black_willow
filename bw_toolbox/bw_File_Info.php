<?php

namespace black_willow\bw_toolbox;

abstract class bw_File_Info {

	public static function there_is_a_file_called( $called_this ) {
		//echo "<h2>File to check: $called_this</h2>";
		if ( is_file( $called_this ) ) {
			//echo "<h3>File confirmed: $called_this</h3>";
			return TRUE;
		} else {
			//echo "<h3>File unconfirmed: $called_this</h3>";
			return FALSE;
		}
	} // there_is_a_file_called()

	public static function there_is_no_file_called( $called_this ) {
		//echo "<h2>File to check: $called_this</h2>";
		if( is_file( $called_this ) ) {;
			//echo "<h3>File unconfirmed: $called_this</h3>";
			return FALSE;
		} else {
			//echo "<h3>File confirmed: $called_this</h3>";
			return TRUE;
		}
	} // there_is_no_file_called()

	public static function there_is_a_folder_called( $called_this ) {
		if ( ( file_exists( $called_this ) ) && ( is_dir( $called_this ) ) ) {
			return TRUE;
		} else {
			return FALSE;
		}
	} // there_is_a_folder_called()

	public static function there_is_no_folder_called( $called_this ) {
		if ( is_dir( $called_this ) ) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

}