/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "BW_Draggable_Element",
	"my_defer" : "",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class BW_Draggable_Element {

	constructor( me, my_name ) {

		if( this.my_name === null ){
			this.my_name = "draggable_" + get_me_a_random_int( 1000, 10000 );
		} else {
			this.my_name = my_name;
		}

		this.me = me;

		this.i_am_active = false;
		this.current_x;
		this.current_y;
		this.initial_x;
		this.initial_y;
		this.x_offset = me.offsetLeft;
		this.y_offset = me.offsetTop;
	}
	add_my_listeners(){
		this.me.addEventListener( "mouseleave", this.remove_my_listeners, { capture : false, once : true } );
		this.me.addEventListener( "mousedown", this.set_my_start_point, true );
		this.me.addEventListener( "mouseup", this.set_my_end_point, true );
		this.me.addEventListener( "mousemove", this.set_my_drag_in_motion, true );
		this.me.change_my_className( " non-draggable ", " draggable " );
	}

	remove_my_listeners(){
		this.me.removeEventListener( "mousedown", this.set_my_start_point );
		this.me.removeEventListener( "mouseup", this.set_my_end_point );
		this.me.removeEventListener( "mousemove", this.set_my_drag_in_motion );
		this.me.change_my_className( " draggable ", " non-draggable " );
	}

	set_my_start_point( the_start ) {
		this.initial_x = the_start.clientX - this.my_x_offset;
		this.initial_y = the_start.clientY - this.my_y_offset;
		this.i_am_active = true;
	}

	set_my_end_point() {
		this.my_initial_x = this.my_current_x;
		this.my_initial_y = this.my_current_y;
		this.i_am_active = false;
	}

	set_my_drag_in_motion() {
		if ( this.i_am_active ) {
			this.me.preventDefault();
			this.current_x = this.me.clientX - this.initial_x;
			this.current_y = this.me.clientY - this.initial_y;
			this.x_offset = me.offsetLeft;
			this.y_offset = me.offsetTop;
			this.set_my_translate( this.current_x, this.current_y );
		}
	}

	set_my_coordinates( x_position, y_position ) {
		try {
			this.me.style.left = x_position + "px";
			this.me.style.top = y_position + "px";
		} catch( e ) {
			this.i_am_active = false;
		}
		return true;
	}
}
