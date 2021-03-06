 <?php

	function make_a_dynamic_widget( $the_nav_links, $with_this_many_visible, $the_baseID ) {
		
		$the_html = "<nav class='blog widget closed' id='the_$the_baseID"."_widget'>
						<h2 class='blog widget closed' id='the_$the_baseID"."_heading'>Posts sorted by $the_baseID:</h2> 
						<menu class='blog widget closed' id='the_$the_baseID"."_menu'>
						<ul class='blog widget closed id='the_$the_baseID"."_list'>";
		
		foreach( $the_nav_links as $this_nav_link ) {
			$the_date = retrieve_the_date_from_the_post_meta( $this_nav_link );
			$the_title = retrieve_the_title_from_the_post_meta( $this_nav_link );
			$the_number = retrieve_the_number_from_the_post_meta( $this_nav_link );

			if( $with_this_many_visible-- > 0 ) {
				$the_html .= "<li class='blog widget visible' id='$the_baseID"."_list_item_$the_number'>";
			} else {
				$the_html .=  "<li class='blog widget hidden' id='$the_baseID"."_list_item_$the_number'>\n";
			}
			
			$the_html .=  "<a class='blog widget  title_link navigation' id='$the_baseID"."_title_link_$the_number' href='$this_nav_link'>$the_title</a>\n
							<a class='blog widget date_link' id='$the_baseID"."_date_link_$the_number' href='$this_nav_link'>$the_date</a>
							</li>\n";
		}
		$the_html .=  "
					</ul>
				</menu>
			</nav>
		";
		return $the_html;
	}
	function the_dynamic_widget( $the_nav_links, $the_baseID ) {
		 echo make_a_dynamic_widget( $the_nav_links, $with_this_many_visible, $the_baseID ); 
	}

	function make_a_navigation_widget( $sorted_this_way, $with_this_many_visible ) {
		$return_me;
		$the_baseID = strtolower( $sorted_this_way );
		switch( $sorted_this_way ) {
			case "Date"			: $the_nav_links = get_posts_sorted_by_date(); $return_me = make_a_dynamic_widget( $the_nav_links, $with_this_many_visible, $the_baseID ); break;
			case "Categories"	: $the_nav_links = get_posts_sorted_by_categories(); $return_me = make_a_dynamic_widget( $the_nav_links, $with_this_many_visible, $the_baseID ); break;
			case "Tags"			: $the_nav_links = get_posts_sorted_by_tags(); $return_me = make_a_dynamic_widget( $the_nav_links, $with_this_many_visible, $the_baseID ); break;
			case "Title"		: $the_nav_links = get_posts_sorted_by_title(); $return_me = make_a_dynamic_widget( $the_nav_links, $with_this_many_visible, $the_baseID ); break;
			case "Subsite"		: $the_nav_links = get_posts_sorted_by_subsite(); $return_me = make_a_dynamic_widget( $the_nav_links, $with_this_many_visible, $the_baseID ); break;
			case "Number"		: $the_nav_links = get_posts_sorted_by_number(); $return_me = make_a_dynamic_widget( $the_nav_links, $with_this_many_visible, $the_baseID ); break;
			case "ID"			: $the_nav_links = get_posts_sorted_by_id(); $return_me = make_a_dynamic_widget( $the_nav_links, $with_this_many_visible, $the_baseID ); break;
			default				: $the_nav_links = get_posts_sorted_by_date(); $return_me = make_a_dynamic_widget( $the_nav_links, $with_this_many_visible, $the_baseID ); break;
		}
		return $return_me;
	}
	function the_navigation_widget( $sorted_this_way, $with_this_many_visible ) {
		echo make_a_navigation_widget( $sorted_this_way, $with_this_many_visible );
	}

	function make_an_archive_widget( $of_this_archive, $with_this_many_visible ) {
		$return_me;
		$the_baseID = strtolower( $of_this_archive );
		switch( $of_this_archive ) {
			case "Recent Posts"	: $the_archives_links = get_posts_sorted_by_date(); $return_me = make_a_dynamic_widget( $the_archives_links, $with_this_many_visible, $the_baseID ); break;
			case "Poetry"		: $the_archives_links = get_poems_sorted_by_title(); $return_me = make_a_dynamic_widget( $the_archives_links, $with_this_many_visible, $the_baseID ); break;
			case "Stories"		: $the_archives_links = get_stories_sorted_by_title(); $return_me = make_a_dynamic_widget( $the_archives_links, $with_this_many_visible, $the_baseID ); break;
			case "Non-fiction"	: $the_archives_links = get_non_fiction_sorted_by_title(); $return_me = make_a_dynamic_widget( $the_archives_links, $with_this_many_visible, $the_baseID ); break;
			case "Other Media"	: $the_archives_links = get_other_media_sorted_by_title(); $return_me = make_a_dynamic_widget( $the_archives_links, $with_this_many_visible, $the_baseID ); break;
			case "Fragmenti"	: $the_archives_links = get_fragmenti_sorted_randomly(); $return_me = make_a_dynamic_widget( $the_archives_links, $with_this_many_visible, $the_baseID ); break;
			default				: $the_archives_links = get_posts_sorted_by_date(); $return_me = make_a_dynamic_widget( $the_archives_links, $with_this_many_visible, $the_baseID ); break;
		}
		return $return_me;
	}
	function the_archive_widget( $of_this_archive, $with_this_many_visible ) {
		echo make_an_archive_widget( $of_this_archive, $with_this_many_visible );
	}