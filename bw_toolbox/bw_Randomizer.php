<?php

namespace black_willow\bw_toolbox;

abstract class bw_Randomizer {
	public static function get_me_a_random_integer_between( $the_low_end, $the_high_end ) {
		return mt_rand( $the_low_end, $the_high_end );
	}
}

