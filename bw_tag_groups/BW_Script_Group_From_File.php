<?php

namespace black_willow\bw_tag_groups;

use black_willow\bw_factories as facs;


class BW_Script_Group_From_File extends \black_willow\bw_tag_groups\BW_Script_Group {

	// Creates a script group from a JSON file.

	function __construct( $from_this_file ) {
		parent::__construct(  $from_this_file );
          $this->my_code_queue->push( "\n##!--------- Script group $from_this_file starts here. --------->" );
		$this->make_me_a_script_group( $from_this_file );
          $this->my_code_queue->push( "\n##!--------- Script group $from_this_file ends here. --------->" );
	}
	public function make_me_a_script_group( $from_this_file ) {
		$the_list = \black_willow\bw_toolbox\bw_Mapifier::mapify_the_json_and_return_it( $from_this_file );
		foreach ( $the_list as $this_tag ) {
			$the_new_tag = $this->make_me_a_new_script_tag( $this_tag );
			$this->my_code_queue->push( $the_new_tag );
		}
	}
}