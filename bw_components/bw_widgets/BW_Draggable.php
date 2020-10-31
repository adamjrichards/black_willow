<?php

namespace black_willow\bw_components\bw_widgets;

class BW_Draggable_Box extends \black_willow\bw_nodes\BW_Widget {

	public $my_draggable_className;
	public $my_non_draggable_className;

	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		$this->my_tag = new \Ds\Map();
				$this->my_controls = new \black_willow\bw_components\bw_controls\BW_Window_Controls();
		$this->my_UID = $the_params_map[ "the_UID" ];
		$this->my_draggable_className = $the_params_map[ "the_draggable_className" ];
		$this->my_non_draggable_className = $the_params_map[ "the_non_draggable_className" ];
		$this->my_tag->put( "my_tag_opener",
			"<{$this->my_tagName} class='$this->my_non_draggable_className wrapper' id='{$this->my_id}_wrapper' draggable='false' onmouseenter='there_is_only_one_draggable_element_at_a_time( this )'>" );
		$this->my_tag->put( "my_controls", $this->my_controls );
		$this->my_tag->put( "my_tag_closer", "</section>" );
	}
	public function fly_in_my_content( ...$this_content ) {
		foreach ( $this_content as $this_id => $this_content ) {
			$this->my_tag->put( $this_id, $this_content );
		}
	}
}

class BW_Draggable_Article extends bw\coms\widg\BW_Draggable_Box {
	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		$the_article_UID = $this->my_UID;
		$the_article_title = $the_params_map[ "the_title" ];
		$the_article_dateline = $the_params_map[ "the_dateline" ];
		$the_article_content = $the_params_map[ "the_content" ];
		$the_html = "\n
			<article class='blog post post_body' id='{$the_article_UID}_article'>
				<header class='blog post post_headline' id='{$the_article_id}_headline'>
					<span class='blog post post_title' id='{$the_article_id}_title'>" . $the_article_title . "</span>
					<span class='blog post post_date' id='{$the_article_id}_dateline'>" . $the_article_dateline . "</span>
				</header>
				<main class='blog post post_content' id='{$the_article_id}_content'>" .
					$the_article_content .
				"</main>
			</article>";
		$this->my_tag->put( "my_tag_content", $the_html );
	}


}

class BW_Draggable_Widget extends bw\coms\widg\BW_Draggable {
	function __construct( $the_params_map ) {
		parent::__construct( $the_params_map );
		// get the source file, don't change anything else
		$the_html = "\n
				<div class='{$this->my_non_draggable_className} wrapper' id='{$this->my_id}_wrapper'>
					\n##script id='{$this->my_id}_active_script' src='{$this->my_src}'>##/script>
					MY_DRAGGABLE_WIDGET
				\n##/div>";
		$this->my_tag->put( "my_tag_content", $the_html );
	}
	public function inject_my_widget_code( $like_this_stuff ) {
		$the_content = $this->my_tag->get( "my_tag_content" );
		$the_html = \str_replace( "MY_DRAGGABLE_WIDGET", $like_this_stuff, $the_content );
		$this->my_tag->put( my_tag_content, $the_html );
	}
}

