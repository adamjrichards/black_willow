<?php

namespace black_willow; 

class Black_Willow {

	// $the_friendly_name; // the project name as lazy people would pronouce it, i.e., Raigarden, STACom, DRPhotos, etc.
	// $the_standard_prefix; // two to five letter prefix for files and DB tables
	// $the_filepath; //absolute path
	// $the_meta; // non-standard setup values
	// $the_UID; // for DB tracking use
	// $the_global_name; // Global variable
	// $the_init; // Loader class name
	// $the_init_map; // Loader class map
	// $the_bw_root; // everything in bw_toolbox


	private $my_init_map = FALSE; // everything in bw_toolbox
	//private $my_kickstart = FALSE; // the callback
	private $my_code = FALSE; // the callback

	function __construct( ...$the_additional_setup_functions ) {

		function scan_the_directory( $with_this_path ) {
			$filter_it = function( $the_value ) {
				return \strpos( $the_value, "." ) !== 0;
			};
			return \array_filter( \scandir( $with_this_path, SCANDIR_SORT_NONE ), $filter_it );
		}

		$the_server_map = new \Ds\Map( $_SERVER );
		$the_server_map = $the_server_map->filter( function( $the_name, $the_key ) { return \strpos( $the_name, "MY_BW_" ) !== FALSE; } );

		// load the core
		$the_core = scan_the_directory( $_SERVER[ "MY_BW_CORE" ] );
		foreach ( $the_core as $the_class_file ) {
			if ( \is_file(  "{$_SERVER[ "MY_BW_CORE" ]}/$the_class_file" ) ) {
				include "{$_SERVER[ "MY_BW_CORE" ]}/$the_class_file";
			}
		}

		// load the bw_error files
		$the_errex = scan_the_directory( $_SERVER[ "MY_BW_ERREX" ] );
		foreach ( $the_errex as $the_class_file ) {
			if ( \is_file( "{$_SERVER[ "MY_BW_ERREX" ]}/$the_class_file" ) ) {
				include "{$_SERVER[ "MY_BW_ERREX" ]}/$the_class_file";
			}
		}

		// load the system
		$the_system = scan_the_directory( $_SERVER[ "MY_BW_SYSTEM" ] );
		foreach ( $the_system as $the_class_file ) {
			if ( \is_file( "{$_SERVER[ "MY_BW_SYSTEM" ]}/$the_class_file" ) ) {
				include "{$_SERVER[ "MY_BW_SYSTEM" ]}/$the_class_file";
			}
		}

		// load the node types
		$the_nodes = scan_the_directory( $_SERVER[ "MY_BW_NODES" ] );
		foreach ( $the_nodes as $the_class_file ) {
			if ( \is_file( "{$_SERVER[ "MY_BW_NODES" ]}/$the_class_file" ) ) {
				include "{$_SERVER[ "MY_BW_NODES" ]}/$the_class_file";
			}
		}

		// load the framework
		$the_framework = scan_the_directory( $_SERVER[ "MY_BW_FRAMEWORK" ] );
		foreach ( $the_framework as $the_class_file ) {
			if ( \is_file( "{$_SERVER[ "MY_BW_FRAMEWORK" ]}/$the_class_file" ) ) {
				include "{$_SERVER[ "MY_BW_FRAMEWORK" ]}/$the_class_file";
			}
		}

		// load the functions
		$the_functions = scan_the_directory( $_SERVER[ "MY_BW_FUNCTIONS" ] );
		foreach ( $the_functions as $the_function_file ) {
			if ( \is_file( "{$_SERVER[ "MY_BW_FUNCTIONS" ]}/$the_function_file" ) ) {
				include "{$_SERVER[ "MY_BW_FUNCTIONS" ]}/$the_function_file";
			}
		}
		// set the autoloader from the function files
		if ( \function_exists( "the_bw_autoload" ) ) {
			\spl_autoload_register( "the_bw_autoload" );
		}

		// load the toolbox into the global space
		$GLOBALS[ "MY_BW_TOOLBOX" ] = new \black_willow\bw_system\BW_Toolbox();

		// get a top-level UID
		$_SERVER[ "MY_BW_UID" ] = "BW_" . \date( 'y.m.d-' ) . $_SERVER[ "MY_PROJECT_PREFIX" ] . (string) \random_int( 1000, 9999 );

		// make a global basket for multiple projects running simultaneously
		if ( ! isset( $_SERVER[ "MY_BLACK_WILLOWS" ] ) ) {
			$_SERVER[ "MY_BLACK_WILLOWS" ] = new \Ds\Set();
		}

		// If you need to perform additional setup before initialization, do it here.
		$this->my_init_map = new \Ds\Map( [ "MY_BLACK_WILLOW_PROJECT" => $_SERVER[ "MY_PROJECT_HANDLE" ] ] );
		if ( ! is_null( $the_additional_setup_functions ) ) {
			foreach( $the_additional_setup_functions as $this_function => $these_params ) {
				$this_file = \str_replace( "\\", "/", $this_function ) . ".php";
				if ( \file_exists( $this_file )) {
					include $this_file;
				}
				if ( \function_exists( $this_function ) ) {
					$this->my_init_map->put( $this_file, $this_function( $these_params ) );
				}
			}
		}
	}

	// this function stays apart from the kickstart so it can perform additional
	// minor application configuration if necessary. The params are
	// << \full_namespace\function_name( function_params )>>.  Errors are ignored
	// and the page will try to load in spite of them.
	public function polish_my_html( $the_html, ...$the_last_minute_configs ) {
		if ( empty( $the_last_minute_configs) ) {
			foreach( $the_last_minute_configs as $this_function => $this_params_map  ) {
				try {
					include "$this_function.php";
				} catch( ErrorException $loading_error ) {
					throw new BW_Cant_Load_Config_File_Exception( $loading_error );
					continue;
				}
				try {
					$this_function( $this_params_map );
				} catch( ErrorException $loading_error ) {
					throw new BW_Cant_Load_Config_File_Exception( $this_function );
					continue;
				}
			}
		}
          return str_replace( "##", "<", $the_html );
	}

	// $the_kick is a project handle in, the init map out.
	public function kickstart_it( $the_kick ) {
		if ( $the_kick === $_SERVER[ "MY_PROJECT_HANDLE" ] ) {
			$the_kick = $this->my_init_map;
		}
		// make the client init object
		$this->my_init = new \black_willow\bw_system\BW_Init( $the_kick );
		$the_code = $this->my_init->kickstart_it( $the_kick );
		$this->my_code = $this->polish_my_html( $the_code );
		return $this->my_code;
	}
}