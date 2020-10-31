<?php

namespace black_willow\bw_system;

class BW_UID extends \black_willow\bw_core\_BW_UID { // This is to maintain the pattern of not instantiating core classes.


	function __construct( $my_prefix, $my_label, $my_suffix, $my_length ) {
		parent::__construct(  $my_prefix, $my_label, $my_suffix, $my_length );
		$this->my_UID = $this->get_my_UID();
	}
}
