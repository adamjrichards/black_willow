function Floating_Element( me ) {
	
	if( this.id == "" ){
		this.id = "floating_element_" + get_me_a_random_int( 1000, 10000 );
	} 
	
	this.me = me;
	
	var me_now = this.innerHTML;
	var active = false;
	var currentX, currentY;
	var initialX, initialY;
	var xOffset = this.offsetLeft;
	var yOffset = this.offsetTop;
	var i_was_the_last_object_arranged;
	
	var add_my_listeners = function(){
		me.addEventListener( "mouseleave", remove_my_listeners, { capture : false, once : true } );
		me.addEventListener( "mousedown", the_start_point, true );
		me.addEventListener( "mouseup", the_end_point, true );
		me.addEventListener( "mousemove", drag_in_motion, true );
	}

	var remove_my_listeners = function(){
		me.removeEventListener( "mousedown", the_start_point );
		me.removeEventListener( "mouseup", the_end_point );
		me.removeEventListener( "mousemove", drag_in_motion );
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

	this.move_me_to_the_root_zStack = function( me ){
		var the_old_me = me;
		var the_new_me = the_old_me.cloneNode( true );
		document.body.appendChild( the_new_me );
		the_old_me.parentElement.removeChild( me );		
		the_new_me.style.zIndex = parseInt( the_new_me.parentElement.style.zIndex ) + 100;
		me = the_new_me;
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