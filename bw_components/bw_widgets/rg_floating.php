<?php
/*
* 	Raingarden post components
*/


function the_floating_post( $the_postable = "" ) { // floats above everything

	if ( is_integer( $the_postable )) {
		$the_post = get_the_post_numbered( $the_postable );
	}  else if ( is_string( $the_postable )) {
		$the_post = get_the_post_called( $the_postable );
	}

		$the_floating_post_date = $the_post -> post_date;
		$the_floating_post_title = $the_post -> post_title;
		$the_floating_post_main_content = apply_filters( 'the_content', $the_post -> post_content );

	echo "<section class='blog post floating' id='the_floating_post' draggable='true' onmouseenter='there_is_only_one_floating_post_at_a_time( this );''>
			<article class='blog post floating' id='the_floating_post_content'>
				<header class='blog post floating' id='the_floating_post_header'>
					<span class='blog post floating date' id='the_floating_post_date'>$the_floating_post_date</span><span class='blog post floating title' id='the_floating_post_title'>$the_floating_post_title</span>
				</header>
				<main class='blog post floating' id='the_floating_post_main_content'>
					$the_floating_post_main_content
				</main>
			</article>
		</section>";
}

