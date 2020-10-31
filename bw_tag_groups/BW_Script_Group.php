<?php

namespace black_willow\bw_tag_groups;

class BW_Script_Group extends \black_willow\bw_nodes\BW_Tag_Group {

	// Creates a script group from the contents of a directory.

	function __construct( $from_this_source ) {
		parent::__construct( $from_this_source );
	}

	public function make_me_a_new_script_tag( $for_this_path, $with_these_attributes = null ) {
		$the_tag = new \black_willow\bw_tags\BW_Script_Tag( $for_this_path, $with_these_attributes );
		return $the_tag->get_my_tag();
	}

}