<?php

namespace black_willow\bw_nodes;

class BW_Empty_DOM_Node extends \black_willow\bw_system\BW_DOM_Node {

	private $my_attributes;
	private $my_MIMEType = "text/html";

	function __construct( $the_params_map = null ) {
		if ( ! is_a( $the_params_map, "\Ds\Map" ) ) {
			return;
		}
		parent::__construct( $the_params_map );
		if ( $the_params_map === null ) {
			if ( \file_exists( MY_PROJECT_JSON . "/" . MY_PROJECT_PREFIX . "_node_defaults.json" ) ) {
				$the_attributes = \black_willow\bw_toolbox\bw_Mapifier::mapify_the_json_and_return_it( MY_PROJECT_JSON . "/" . MY_PROJECT_PREFIX . "_node_defaults.json" );
			} else if ( \file_exists( MY_BW_JSON . "/bw_node_defaults.json" ) ) {
				$the_attributes = \black_willow\bw_toolbox\bw_Mapifier::mapify_the_json_and_return_it( MY_BW_JSON . "/bw_node_defaults.json" );
			} else {
				$the_attributes = new \Ds\Map( [
					"my_tagName" => "!-- Incomplete tag definition -->",
					"my_id" => "incomplete_tag_" . \random_int( 1000, 9999 ) ] );
			}
			$this->my_attributes = $the_attributes;
			if ( $the_params_map->hasKey( "my_MIMEType" ) ) {
				$this->my_MIMEType = $the_params_map->get( "my_MIMEType" );
			}
		}
     }
     public function get_my_attributes() {
          return $this->my_attributes;
     }
     public function get_my_MIMEType() {
          return $this->my_MIMEType;
     }
}