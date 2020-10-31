<?php

namespace black_willow\bw_core;

class _BW_INIT {

	private $my_init_map;

	function __construct( $the_init_map ) {
		include( "bw_maps/BW_Init_Map.php" );
		$this->my_init_map = new \black_willow\bw_maps\BW_Init_Map( $the_init_map );
	}

	protected function get_my_map() {
		return $this->my_init_map;
	}

	public function kickstart_it( $the_kick ) {
		if ( $the_kick ) {
			$the_kick = $this->my_init_map;
		} else {
			$the_kick = FALSE;
		}
		return $the_kick;
	}
}