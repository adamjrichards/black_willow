function Draggable_Widget( me, my_name = "" ) {
	
	if( this.name == null ){
		this.name = "draggable_" + get_me_a_random_int( 1000, 10000 );
	} else {
		this.name = my_name;
	}
	
	this.me = me;
	
	//var me_now = me.innerHTML;
	var active = false;
	var currentX, currentY;
	var initialX, initialY;
	var xOffset = me.offsetLeft;
	var yOffset = me.offsetTop;
	var i_was_the_last_object_arranged;
	
	var add_my_listeners = function(){
		me.addEventListener( "mouseleave", remove_my_listeners, { capture : false, once : true } );
		me.addEventListener( "mousedown", the_start_point, true );
		me.addEventListener( "mouseup", the_end_point, true );
		me.addEventListener( "mousemove", drag_in_motion, true );
		me.change_my_className( " non-draggable ", " draggable " );
	}

	var remove_my_listeners = function(){
		me.removeEventListener( "mousedown", the_start_point );
		me.removeEventListener( "mouseup", the_end_point );
		me.removeEventListener( "mousemove", drag_in_motion );
		me.change_my_className( " draggable ", " non-draggable " );
	}
	
	var the_start_point = function( the_start ) {
		initialX = the_start.clientX - xOffset;
		initialY = the_start.clientY - yOffset; 
		active = true;
	}

	var the_end_point = function( the_end ) {
		initialX = currentX;
		initialY = currentY;
		active = false;
	}

	var drag_in_motion = function( the_drag ) {
		if ( active ) {
			the_drag.preventDefault();
			currentX = the_drag.clientX - initialX;
			currentY = the_drag.clientY - initialY;
			xOffset = me.offsetLeft;
			yOffset = me.offsetTop;
			setTranslate( currentX, currentY );
		}	
	}
	
	var setTranslate = function( xPos, yPos ) {
		try {
			me.style.left = xPos + "px";
			me.style.top = yPos + "px";
		} catch( e ) {
			alive = false;
		}
		return true;
	}
	
	this.bring_me_to_the_front = function() {
		if ( the_highest_zIndex_so_far > 1000 ) {
			i_was_the_last_object_arranged = this;
			reset_the_zIndexes( i_was_the_last_object_arranged );
			the_highest_zIndex_so_far = 100;
		} else {
			the_highest_zIndex_so_far = the_highest_zIndex_so_far + 10;
		}
		me.style.zIndex = the_highest_zIndex_so_far;
		//cl(me.style.zIndex);
	}
	
	add_my_listeners();

	
}
