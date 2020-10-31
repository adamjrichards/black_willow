<?php

function build_a_filename_index_widget( $this_index, $how_many_to_show_at_a_time ) {
	$the_html = "<div class='blog post widget'>\n<ul>\n<li>\n";
	$the_file_count = count( $this_index );
	for( $i = 0; $i < $the_file_count; $i++ ) {

		if( $i % $how_many_to_show_at_a_time === $how_many_to_show_at_a_time ) {
			$the_html .= "<ul>\n";
		}

		$the_file_path = "rg_assets/rg_posts/" . $this_index[ $i ];
		$the_tag = "<li><a href='$the_file_path'>" . $this_index[ $i ] . "</a></li>";
		$the_html .= $the_tag;

		if( $i % $how_many_to_show_at_a_time === 0 || $i % $the_file_count === 0 ) {
			$the_html .= "</ul>\n</li>\n";
		}
	}
	$the_html .= "</ul>\n</div>";
	return $the_html;
}

function build_an_index_widget( $this_index, $the_filename_index, $how_many_to_show_at_a_time ) {
	$the_html = "<div class='blog post widget'>\n<ul>\n<li>\n";
	$the_file_count = count( $this_index );
	for( $i = 0; $i < $the_file_count; $i++ ) {

		if( $i % $how_many_to_show_at_a_time === $how_many_to_show_at_a_time ) {
			$the_html .= "<ul>\n";
		}

		$the_file_path = "rg_assets/rg_posts/" . $the_filename_index[ $i ];
		$the_tag = "<li><a href='assets/posts/" . $the_filename_index[ $i ] . " '>" . $this_index[ $i ] . "</a></li>";
		$the_html .= $the_tag;

		if( $i % $how_many_to_show_at_a_time === 0 || $i % $the_file_count === 0 ) {
			$the_html .= "</ul>\n</li>\n";
		}
	}
	$the_html .= "</ul>\n</div>";
	return $the_html;
}