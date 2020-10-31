/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "_BW_WIDGET",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/
	
class _BW_WIDGET {
	
	constructor( the_params_array ) {}
	
	make_sure_this_is_a_widget( the_whatever ) {
		if ( the_whatever instanceof HTMLElement ) {
			if( the_whatever.className.includes( "widget" ) ){
				return the_whatever;
			} else {
				try {
					return the_whatever.className.replace( "", " widget" );
				} catch( error ) {
					return the_whatever.className.replace( "", " widget" );
				}
			}
		} else if ( this_is_a_string( the_whatever ) ) {
			return make_sure_this_is_a_widget( document.getElementById( the_whatever ) );
		} else {
			return false;
		}
	}

	add_the_listeners_to_the_widget( the_widget ) {
		the_widget = make_sure_this_is_a_widget( the_widget );
		the_widget.addEventListener( "click", pin_me, true );
		the_widget.addEventListener( "blur", close_me_now, true );
		the_widget.addEventListener( "mouseleave", close_me_in_a_moment, true );
		the_widget.addEventListener( "dblclick", maximize_me, true );
		the_widget.addEventListener( "mouseenter", dont_close_me_after_all, true );
	}

	remove_the_listeners_now( the_widget ) {
		the_widget = make_sure_this_is_a_widget( the_widget );
		the_widget.removeEventListener( "click", pin_me );
		the_widget.removeEventListener( "blur", close_me_now );
		the_widget.removeEventListener( "mouseleave", close_me_in_a_moment );
		the_widget.removeEventListener( "dblclick", maximize_me );
		the_widget.addEventListener( "mouseenter", dont_close_me_after_all );
	}

	free_me() {
		the_widget = make_sure_this_is_a_widget( this );
		remove_the_listeners_now( the_widget );
		the_widget = new Draggable_Widget( the_widget, the_widget.id );	
	}

	minimize_me(){
		the_widget = make_sure_this_is_a_widget( this );
		the_widget.className.replace( " open", " minimized" );
	}

	maximize_me(){
		the_widget = make_sure_this_is_a_widget( this );
		the_widget.className.replace( " open", " maximized" );
	}

	pin_me() {
		the_widget = make_sure_this_is_a_widget( this );
		the_widget.className.replace( " open", " pinned" );
	}

	enrich_me() {
		the_widget = make_sure_this_is_a_widget( this );
		//me.style.height = inherit;
		//me.style.width = inherit;
	}

	toggle_it( the_widget ){
		the_widget = make_sure_this_is_a_widget( the_widget );
		if ( the_widget ) {
			var all_the_tags = the_widget.parentElement.children;
			if ( the_widget.className.includes( "open" ) ){
				close_me_now( the_widget );
			} else if ( the_widget.className.includes( "closed" ) ){
				open_me( the_widget );
			}		
		}
	}

	revert_me( the_widget ) {
		the_widget.parentElement.style = "all: revert;";
	}

	open_me( the_widget ) {
		the_widget = make_sure_this_is_a_widget( the_widget );
		add_the_listeners_to_the_widget( the_widget );
		var the_widgets_kids = the_widget.children;
		the_widget.className = the_widget.className.replace( "closed", "open" );
		for ( var some_kid of the_widgets_kids ) {
			some_kid.className = some_kid.className.replace( "closed", "open" );
			some_kid.className = mark_my_style_modified( some_kid );
		}
	}

	dont_close_me_after_all( me ) {
		var the_widget = make_sure_this_is_a_widget( me );
		the_widget.className = the_widget.className.replace( "delayed_close", "open" );
	}

	close_me_now( the_widget ) {
		var the_widget = make_sure_this_is_a_widget( the_widget );
		the_widget.className = mark_my_style_default( the_widget );
		the_widget.className = the_widget.className.replace( "open", "closed" );
	}

	close_me_in_a_moment() {
		var the_widget = make_sure_this_is_a_widget( this );
		remove_the_listeners_now( the_widget );
		the_widget.className = mark_my_style_default( the_widget );
		the_widget.className = the_widget.className.replace( "open", "delayed_close" );
		the_widget.addEventListener( "mouseenter", dont_close_me_after_all, true );
	}

	close_us_all() {
		var the_widget = make_sure_this_is_a_widget( this );
		var the_main_content_panel = document.getElementById( "the_main_content_panel" );
		var all_the_widgets = the_main_content_panel.children;
		the_main_content_panel.className = the_main_content_panel.className.replace( "open", "close_all" );
	}

	insert_the_page( the_page ){
		var the_main_content_panel = document.getElementById( "the_main_content_panel" );
		the_main_content_panel.innerHTML = the_page;
	}

	focus_the_description( the_link ) {
		the_link = make_sure_this_is_an_element( the_link );
		the_link.className = the_link.className.replace( "blur", "focus" );
	}
	
	show_me_the_link_list( the_link_list ) {
		the_link_list.className = the_link_list.className.replace( "closed", "open" );
	}

	
	blur_the_description( the_link ) {
		cl(the_link);
		the_link = make_sure_this_is_an_element( the_link );
		the_link.className = the_link.className.replace(  "focus", "blur"  );
	}
	
	hide_the_link_list( the_link_list ) {
		the_link_list.className = the_link_list.className.replace( "closed", "open" );
	}
	
	randomize_the_style_left( the_daddy, the_className ) {
		the_daddy = make_sure_this_is_an_element( the_daddy );
		var the_elements_kids = the_daddy.getElementsByClassName( the_className );
		for ( var some_kid of the_elements_kids ) {
			var the_new_left = Math.ceil( Math.random() * 20 );
			some_kid.style.transform = "translate(" + the_new_left + "em )";
			some_kid.className = mark_my_style_modified( some_kid );
		}
	}
	
	randomize_the_style_width( the_daddy, the_className ) {
		the_daddy = make_sure_this_is_an_element( the_daddy );
		var the_elements_kids = the_daddy.getElementsByClassName( the_className );
		for ( var some_kid of the_elements_kids ) {
			var the_new_width = Math.ceil( Math.random() * 20 ) + 20;
			some_kid.style.width = the_new_width + "em";
			some_kid.className = mark_my_style_modified( some_kid );
		}
	}
}