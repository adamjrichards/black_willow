<?php

namespace black_willow\bw_framework;

class BW_Site extends \black_willow\bw_system\BW_Framework_Node {

	public $my_home_folder;
	public $my_index_page;
	public $my_scion;

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		$this->my_home_folder = $the_params_map[ "my_folder" ];
		$this->my_index_page= $the_params_map[ "my_index_page" ];
		$this->my_kickstart = FALSE;
	}

	public function assemble_my_site( $the_load_queue ) {
		$the_index = $the_load_queue->find_me( $this->get_my_handle() );
		$this->my_scion = $the_load_queue->get_my_property( $the_index + 1 ); // MY_PAGE
		$the_project_folders = new \Ds\Vector( \scandir( MY_PROJECT_ROOT ) );
		$the_project_folders = $the_project_folders->filter(
			function( $the_value ) {
				if ( \is_dir( $the_value ) ) {
					if ( \preg_match( "/bw|rg/", $the_value )  ) {
						return $the_value;
					}
				}
			}
		);

		$the_site_folders = $the_project_folders->filter(
				function( $the_item ) {
					if ( ( \is_dir( MY_PROJECT_ROOT . "\\" . $the_item ) ) AND ( \strpos( $the_item, MY_PROJECT_PREFIX ) === 0 ) ) {
						return $the_item;
					}
				} );
		$the_JSON_files = new \Ds\Vector(\scandir(MY_PROJECT_JSON));
		$the_defaults_files = $the_JSON_files->filter(
				function( $the_item ) {
					$the_item = \strstr( $the_item, "_defaults.json", TRUE );
					if ( is_dir( MY_PROJECT_ROOT . "\\$the_item" ) ) {
						return $the_item;
					}
				} );
		foreach ( $the_defaults_files as $this_file ) {
			$the_defaults = \black_willow\bw_toolbox\bw_Mapifier:: mapify_the_json_and_return_it( MY_PROJECT_JSON . "\\$this_file" );
			foreach ( $the_defaults as $this_handle => $this_value ) {
				if ( $this_handle === $this->get_my_handle() ) {
					 continue;
				}
				$the_class = $this_value->get( "my_class" );
				$the_factory = $this_value->get( "my_factory" );
				$the_function_call = "$the_factory::get_me_a_new_{$the_class}";
				$the_global = $the_function_call( $this_handle, $this_value );
				$the_family = $the_global->get_my_children();
				$the_load_queue->push_my_node( $this_handle );
			}
		}
		if ( isset( $GLOBALS[ $this->my_scion ] ) ) {
			$this->my_kickstart = TRUE;
			return $the_load_queue;
		}
		return FALSE;
	}

	public function get_my_site_html_string() {
		return $this->my_site_html_string;
	}

	public function get_my_site_html_array() {
		return $this->my_site_html_array;
	}

     public function kickstart_it( $the_kick ) {
          $the_kickstart = $this->assemble_my_site( $the_kick );
		if ( $this->my_kickstart === TRUE and $the_kickstart !== FALSE ) {
			return $GLOBALS[ $this->my_scion ]->kickstart_it( $the_kickstart );
		}
		return FALSE;
     }
}
