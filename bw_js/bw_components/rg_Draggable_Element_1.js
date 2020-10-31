class Draggable_Element {
	
	constructor( my_title, my_tag, my_id, my_className, my_role, my_name = "the_draggable" ) {
		
		var me = document.createElement( my_tag );
		var my = me;
		
		my.id = my_id;
		my.className = my_className;
		my.role = my_role;
		my.name = my_name;
		
		var my_current_X = my.clientX; // where my cursor is, in absolute X-Y coords
		var my_current_Y = my.clientY;
		
		var my_initial_X_coord; // where I am at the beginning of each mouse query
		var my_initial_Y_coord;
		
		var my_horizontal_offset = 0; // my horizontal distance from where I started
		var my_vertical_offset = 0; // the vertical version
		
		me.addEventListener( "mousedown", this.the_drag_starts_here, false );
		me.addEventListener( "mouseup", this.the_drag_ends_here, false );
		me.addEventListener( "mousemove", this.the_drag_movement, false );
		
		this.the_inner_me_innerHTML = "<!-- The draggable content starts here. --->\n\n";
		
		this.the_outer_me = me;
	}
	
	the_inner_me( my_tag = "article", my_class = "draggable inner", my_id = "the_draggable_inner", my_role = "article" ) {
		var the_new_baby = document.createElement( my_tag );
		the_new_baby.id = my_id;
		the_new_baby.className = my_class;
		the_new_baby.role = my_role;
		this.the_outer_me.appendChild( the_new_baby );
		return the_new_baby;
	}
/**/	
	populate_me ( ...the_content ) {
		//cl( this.the_inner_me );
		for( var this_content_set of the_content ) {
			this.the_inner_me_innerHTML += "\n<!--- A content set starts here. --->\n";
			this.the_inner_me_innerHTML += this_content_set;
			this.the_inner_me_innerHTML += "\n<!--- A content set ends here. --->\n";
		}
		this.the_inner_me.innerHTML = this.the_inner_me_innerHTML;
		return this.the_inner_me_innerHTML;
	}
	
	replace_my_inner_HTML ( ...the_content ) {
		for( var this_content_set of the_content ) {
			this.the_inner_me_innerHTML = "\n<!--- A content set starts here. --->\n";
			this.the_inner_me_innerHTML += this_content_set;
			this.the_inner_me_innerHTML += "\n<!--- A content set ends here. --->\n";
		}
		this.the_inner_me.innerHTML = this.the_inner_me_innerHTML;
		return this.the_inner_me_innerHTML;
	} 
	
	disappear_me() {
		
		this.the_inner_me = null;
		this.the_outer_me.parentElement.removeChild( this.the_outer_me );
		return "Draggable disappeared.";
		
	} 
	
	//this...
	the_drag_starts_here( the_mousedown ) {
		this.the_starting_X = the_mousedown.clientX - this.the_left_offset;
		this.the_starting_Y = the_mousedown.clientY - this.the_top_offset;
		if( the_mousedown.target === this ) {
			this.active = true;		
		}
		//cl( this.active );
	} // drag_me_from_here

	the_drag_ends( the_mouseup ) {
	this.the_starting_X = this.the_current_X;
	this.the_starting_Y = this.the_current_Y;	
	this.active = false;
	} // drag_me_to_here

	the_drag_movement( the_mousemove ) {
			
	if ( this.active ) {
		this.active = true;		

		the_mousemove.preventDefault();

		this.the_current_X = the_mousemove.clientX - this.the_starting_X;
		this.the_current_Y = the_mousemove.clientY - this.the_starting_Y;

		this.the_left_offset = this.the_current_X;  // set up for next event
		this.the_top_offset = this.the_current_Y;
	}
	}
	
} // the Draggable_Element class

function the_draggable_post( my_title, my_id, my_className, my_role, my_name, callback ) {
	//cl(me);
	var the_draggable = new Draggable_Element( my_title, my_id, my_className, my_role, my_name );
	// 'draggable' extends 'floating'
	var the_inner_draggable = the_draggable.the_inner_me( 'section', 'blog post draggable', 'the_draggable_cargo', 'article' );
	if( typeof the_inner_draggable === 'object' ) {
		cl( typeof the_inner_draggable );
		callback( );
	}
}

