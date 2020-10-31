<?php

namespace black_willow\bw_framework;

class BW_Page extends \black_willow\bw_system\BW_Framework_Node {

	private $my_source;
     private $my_html;
	private $my_kickstart = FALSE;

	function __construct( $the_params_map ) {

		parent::__construct( $the_params_map );
          $this->my_html = null;
	}

	public function assemble_my_page( $the_load_queue ) {
		$this->my_html = $the_load_queue->sort_my_list();
		$this->my_kickstart = TRUE;
		return $this->my_html;
     }

     public function kickstart_it( $the_load_queue ) {
		$the_kickstart = $this->assemble_my_page( $the_load_queue );
		if ( $this->my_kickstart === TRUE and $the_kickstart !== FALSE ) {
			return $the_kickstart;
		}
		return FALSE;
     }
}