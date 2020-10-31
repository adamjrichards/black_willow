<?php

namespace black_willow\bw_system;

class BW_Toolbox {

	private $my_tools;
	private $my_functions;
	private $filter_it;

	function __construct() {
		$this->filter_it = function( $the_value ) {
			return \strpos( $the_value, "." ) !== 0;
		};
		$this->my_tools = new \Ds\Set();
		$this->my_functions = new \Ds\Set();

		$the_files = \array_filter( \scandir( $_SERVER[ "MY_BW_TOOLBOX" ] ), $this->filter_it );
		foreach ( $the_files as $this_file ) {
			$the_class_name = \trim( $this_file, ".php" );
			if ( \mb_strpos( $the_class_name, $_SERVER[ "MY_BW_OBJECT_PREFIX" ] ) !== FALSE ) {
				$the_class = MY_BW_NAMESPACE . \array_pop( \mb_split( $_SERVER[ "MY_BW_TOOLBOX" ], "/" ) ) . $the_class_name;
				if ( ! \class_exists( $the_class ) ) {
					include $_SERVER[ "MY_BW_TOOLBOX" ] . "/this_file";
					$this->my_tools->add( $the_class );
				}
			}
		}
		$the_functions = \array_filter( \scandir( $_SERVER[ "MY_BW_FUNCTIONS" ] ), $this->filter_it );
		foreach ( $the_functions as $this_function ) {
			$the_function_name = \trim( $this_function, ".php" );
			if ( ! \function_exists( $the_function_name ) ) {
				if ( $_SERVER[ "MY_BW_FUNCTIONS" ] ) {
					$the_function_call = $_SERVER[ "MY_BW_FUNCTIONS" ] . "/$this_function";
				} else {
					$the_function_call = $_SERVER[ "MY_BW_FUNCTIONS" ] . "/$this_function";
				}
				$this->my_functions->add( $the_function_name );
			}
		}
	}
}