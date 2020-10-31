<?php

namespace black_willow\bw_maps;

class BW_Static_Node_Map extends \black_willow\bw_core\_BW_MAP {

	private $my_blocks;

	function __construct( $the_params_map = null ) {
		//parent::__construct( $the_params_map );
		$this->my_blocks = parent::get_my_pairs();
	}

	public function get_my_blocks() {
		return $this->my_blocks;
	}
	public function get_the_block( $with_this_id ) {
		return $this->my_blocks->get( $with_this_id );
	}
}