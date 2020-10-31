<?php
/*
* 	Raingarden post internal components
*/

function the_draggable_post( $the_post_id ) {
	//cl($the_post_id);
	$the_id_number = random_int( 1000, 9999 );

	if ( ! isset ( $the_className )) {
		$the_draggable_className = 'blog post draggable';
		$the_non_draggable_className = 'blog post non-draggable';
	}

	if ( ! isset ( $the_role )) {
		$the_role = 'article';
	}

	if ( ! isset ( $the_name )) {
		$the_name = "$the_post_title";
	}

	echo "<section class='blog post non-draggable' id='post_$the_post_id' draggable='true' onmouseenter='there_is_only_one_draggable_element_at_a_time( this )'>
                <button type='button' class='blog post nav-buttons closer' id='post_$the_post_id" . "_closer' onclick='close_me(this.parentElement)'>
                        close me
                </button>
                <button type='button' class='blog post nav-buttons shrinker' id='post_$the_post_id" . "_shrinker' onclick='shrink_me(this.parentElement)'>
                        shrink me
                </button>
                <button type='button' class='blog post nav-buttons expander' id='post_$the_post_id" . "_expander' onclick='expand_me(this.parentElement)'>
                        take over the space
                </button>
                <button type='button' class='blog post nav-buttons contribute' id='post_$the_post_id" . "_contribute' onclick='enrich_me(this.parentElement)'>
                        contribute generously
                </button>
	</section>";
}


function the_draggable_widget( $the_widget ) {

	$the_id_number = random_int( 1000, 9999 );
	$the_widget_id = "draggable_widget_" . $the_id_number;

	if ( ! isset ( $the_className )) {
		$the_draggable_className = 'blog widget draggable';
		$the_non_draggable_className = 'blog widget non-draggable';
	}

	echo "<section class='$the_non_draggable_className outer' id='$the_widget_id' draggable='true' resize='both' onmouseenter='there_is_only_one_draggable_widget_at_a_time( this )'>
			<button type='button' class='blog widget nav-buttons closer' id='$the_widget_id"."_closer' onclick='close_me(this.parentElement)'>
				close me
			</button>
			<button type='button' class='blog widget nav-buttons shrinker' id='$the_widget_id"."_shrinker' onclick='shrink_me(this.parentElement)'>
				shrink me
			</button>
			<button type='button' class='blog widget nav-buttons expander' id='$the_widget_id"."_expander' onclick='expand_me(this.parentElement)'>
				take over the space
			</button>
			<button type='button' class='blog widget nav-buttons contribute' id='$the_widget_id"."_contribute' onclick='enrich_me(this.parentElement)'>
				contribute generously
			</button>

			<main class='$the_draggable_className inner' id='$the_widget_id"."_inner'>";
				the_widget( $the_widget );
	echo "	</main>
		</section>";
}

