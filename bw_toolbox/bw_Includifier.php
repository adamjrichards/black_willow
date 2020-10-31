<?php

namespace black_willow\bw_toolbox;

class BW_Includifier {

	public $my_file;

	public function __construct( $the_file = null ) {
		$this->my_file = $the_file;
	}

	public function load_all_my_includes( $from_this_list ) {
		where();
		$the_includes = \json_decode( \file_get_contents( "bw_json/$from_this_list.json" ) );
		\line_out( __FILE__, __LINE__, $the_includes );

	}

	public function load_my_include( $from_this_folder, $with_this_name ) {
		switch ( $from_this_folder ) {
			case "bw_init"           :    $the_namespace = "bw\\init";
									break;
			case "bw_system"         :    $the_namespace = "bw\\sys";
									break;
			case "bw_containers"     :    $the_namespace = "bw\\cons";
									break;
			case "bw_framework"      :    $the_namespace = "bw\\frame";
									break;
			case "bw_components"     :    $the_namespace = "bw\\coms";
									break;
			case "bw_static_pages"   :    $the_namespace = "bw\\stats";
									break;
			case "bw_core"           :    $the_namespace = "bw\\core";
									break;
			case "bw_toolbox"        :    $the_namespace = "bw\\tkit";
									break;
			case "bw_wrappers"       :    $the_namespace = "bw\\wraps";
									break;
			case "bw_factories"      :    $the_namespace = "bw\\facs";
									break;
			case "bw_functions"      :    $the_namespace = "bw\\funcs";
									break;
			case "bw_data"           :    $the_namespace = "bw\\data";
									break;
			case "bw_assets"         :    $the_namespace = "bw\\asset";
									break;
			case "bw_black_boxes"    :    $the_namespace = "bw\\bbox";
									break;
			case "bw_inline_tags"    :    $the_namespace = "bw\\tags";
									break;
			case "bw_errors"         :    $the_namespace = "bw\\errex";
									break;
			case "bw_toys"           :    $the_namespace = "bw\\toys";
									break;
			case "bw_toys"           :    $the_namespace = "bw\\toys";
									break;
			case "bw_widgets"        :    $the_namespace = "bw\\widg";
									break;
			case "bw_objects"        :    $the_namespace = "bw\\obj";
									break;
			default                  :    $the_namespace = "";
		}
		$the_class = "\\$the_namespace\\$with_this_name";
		$the_file = "$from_this_folder/$with_this_name.php";
		if ( ! class_exists( $the_class ) ) {
			require $the_file;
		}
	}
}

function make_me_a_new_BW_Includifier() {
	return new \bw\tkit\BW_Includifier();
}