<?php

namespace black_willow\bw_nodes;

class BW_Tag_Group extends \black_willow\bw_core\_BW_GROUP {

     protected $my_code_queue;
	protected $my_group_map;
     protected $my_group_uid;

	function __construct( $from_these_sources ) {
		$this->my_code_queue = new \Ds\Queue();
		$this->my_group_uid = \black_willow\bw_factories\bw_UIDs::get_me_a_new_meta_group_UID();
	}
	public function get_my_tag_group() {
		return $this->my_group_map;
	}
	public function pop_my_tag_group() {
		return $this->my_group_map->pop();
	}
	public function get_my_group_uid() {
		return $this->my_group_uid;
	}

     public function get_my_code_queue( ) {
          return $this->my_code_queue;
     }
     public function get_my_html( ) {
		$the_html = "##!------- $this->my_group_uid ------->\n";
		while ( ! $this->my_code_queue->isEmpty()) {
			$the_html .= $this->my_code_queue->pop();
		}
          return $the_html;
     }
}