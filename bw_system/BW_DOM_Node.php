<?php

namespace black_willow\bw_system;

class BW_DOM_Node extends \black_willow\bw_core\_BW_NODE {

	protected $myself; // reference to the corresponding client-side DOM element's "myself"
	protected $my_innerHTML = "";
	private $my_node_map = null;
     private $my_tagName = "##!-- Incomplete tag definition -->";
     private $my_id = null;
     private $my_className = null;
     private $my_src = "";
     private $my_inline_css = null;
     private $my_MIMEType = "text/html";
     private $my_trigger = null;
     private $my_other_attributes = null;

	function __construct( $the_params_map = null ) {
		if ( $the_params_map !== null ) {

			if ( ! $the_params_map->hasKey( "my_tagName" ) ) {
				$the_params_map->put( "my_tagName", $this->my_tagName );
			}
			$this->my_tagName = $the_params_map[ "my_tagName" ];

			if ( ! $the_params_map->hasKey( "my_id" ) ) {
				$the_params_map->put( "my_id", $this->my_id );
			}
			$this->my_id = $the_params_map[ "my_id" ];

			if ( ! $the_params_map->hasKey( "my_className" ) ) {
				$the_params_map->put( "my_className", $this->my_className );
			}
			$this->my_className = $the_params_map[ "my_className" ];

			if ( ! $the_params_map->hasKey( "my_src" ) ) {
				$the_params_map->put( "my_src", $this->my_src );
			}
			$this->my_src = $the_params_map[ "my_src" ];

			if ( ! $the_params_map->hasKey( "my_inline_css" ) ) {
				$the_params_map->put( "my_inline_css", $this->my_inline_css );
			}
			$this->my_inline_css = $the_params_map[ "my_inline_css" ];

			if ( ! $the_params_map->hasKey( "my_MIMEType" ) ) {
				$the_params_map->put( "my_MIMEType", $this->my_MIMEType );
			}
			$this->my_MIMEType = $the_params_map[ "my_MIMEType" ];

			if ( ! $the_params_map->hasKey( "my_trigger" ) ) {
				$the_params_map->put( "my_trigger", $this->my_trigger );
			}
			$this->my_trigger = $the_params_map[ "my_trigger" ];

			if ( ! $the_params_map->hasKey( "my_other_attributes" ) ) {
				$the_params_map->put( "my_other_attributes", $this->my_other_attributes );
			}
			$this->my_other_attributes = $the_params_map[ "my_other_attributes" ];
			parent::__construct( $the_params_map );
		}
		//$this->myself = new \black_willow\bw_system\BW_ME();
		$this->my_node_map = new \black_willow\bw_maps\BW_DOM_Node_Map( $the_params_map );
          foreach ( $this->my_node_map as $this_key => $this_value ) {
               $the_field = str_replace( "the_", "my_", $this_key );
               $this->{ $the_field } = $this_value;
          }


		$the_source_file = "{$this->get_my_source_folder()}{$this->get_my_source_file()}";
		if ( \file_exists( $the_source_file ) ) {
			include $the_source_file;
			$this->my_innerHTML .= $the_html;
		}
	}
	public function get( $this_item ) {
		if ( isset( $this_item ) ) {
			return $this_item;
		}
		if ( isset( $this->$this_item ) ) {
			return $this->$this_item;
		}
	}
	public function get_my_node_opener() {
		return parent::get_my_node_opener();
	}
	public function get_my_node_closer() {
		return parent::get_my_node_closer();
	}
	public function get_my_inner_code() {
		return $this->my_innerHTML;
	}
	public function get_my_tagName() {
		return $this->my_node_map->get_my_tagName();
	}
	public function get_my_title() {
		return $this->my_node_map->get_my_title();
	}
	public function get_my_name() {
		return $this->my_node_map->get_my_name();
	}
	public function get_my_id() {
		return $this->my_node_map->get_my_id();
	}
	public function get_my_className() {
		return $this->my_node_map->get_my_className();
	}
	public function get_my_src() {
		return $this->my_node_map->get_my_src();
	}
	public function set_my_src( $to_this ) {
		$this->my_node_map->set_my_src( $to_this );
	}
	public function get_my_inline_css() {
		return $this->my_node_map->get_my_inline_css();
	}
	public function get_my_MIMEType() {
		return $this->my_node_map->get_my_MIMEType();
	}
	public function set_my_MIMEType( $to_this ) {
		$this->my_node_map->set_my_MIMEType( $to_this );
	}
	public function get_my_trigger() {
		return $this->my_node_map->get_my_trigger();
	}
	public function get_my_other_attributes() {
		return $this->my_node_map->get_my_other_attributes();
	}
	public function get_my_innerHTML() {
		return $this->my_innerHTML;
	}
	public function set_my_innerHTML( $to_this ) {
		$this->my_innerHTML = $to_this;
	}
	public function get_my_source_file() {
		return $this->my_node_map->get_my_source_file();
	}
	public function get_my_source_folder() {
		return $this->my_node_map->get_my_source_folder();
	}

	public function get_my_HTML_tag() {
		$the_tag = "";
		if ( $this->my_tagName !== null ) {
			$the_tag .= "\n##$this->my_tagName";
		}
		if ( $this->my_id !== null ) {
			$the_tag .= " id='$this->my_id'";
		}
		if ( $this->my_className !== null ) {
			$the_tag .= " class='$this->my_className'";
		}
		if ( $this->my_trigger !== null ) {
			$the_tag .= " $this->my_trigger";
		}
		if ( $this->my_other_attributes !== null ) {
			$the_tag .= " $this->my_other_attributes";
		}
		if ( $this->my_inline_css !== null ) {
			$the_tag .= " style='$this->my_inline_css'";
		}
		$the_tag .= ">\n";
		return $the_tag;
	}
}