<?php

namespace black_willow\bw_toolbox;

if ( ! function_exists( "map" ) ) {
	function map( $this_JSON, $to_this_map = null ) {
		return \black_willow\bw_toolbox\bw_Mapifier::mapify_the_JSON( $this_JSON, $to_this_map );
	}
}