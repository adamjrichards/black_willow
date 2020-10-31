/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "bw_DOM_Utilities",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class bw_DOM_Utilities {

	static get_the_node_list ( the_root_element ) {

		if ( typeof the_root_element === "string" ) {
			the_root_node = document.getElementById( the_root_element );
		}

		var the_node_list;
		var the_full_node_array = [];

		function collect_the_nodes( the_root_node ) {
			if( the_root_node.hasChildNodes ) {
				the_node_list = the_root_node.childNodes;
			}
			the_node_list.forEach(
				function( currentValue, currentIndex, listObj ) {
					the_full_node_array.push( [ currentIndex, currentValue, listObj ] );
					if( currentValue.hasChildNodes ) {
						collect_the_nodes( currentValue );
						//cl( the_node_list );
					}
				}, 'this'
			);
		}
		if( the_root_node.hasChildNodes ) {
			collect_the_nodes( the_root_node );
		}
		return the_full_node_array;
	}

	static get_the_element_list( the_root_element ) {

		if ( typeof the_root_element === "string" ) {
			the_root_element = document.getElementById( the_root_element );
		}

		var the_element_list;
		var the_full_element_array = [];
		function collect_the_elements( the_root_element ) {
			if( the_root_element.hasChildNodes ) {
				the_element_list = the_root_element.childNodes;
				the_element_list.forEach(
					function( currentValue, currentIndex, listObj ) {
						if ( currentValue.nodeType === 1 ) {
						//cl( currentValue );
							the_full_element_array.push( currentValue );
							if( currentValue.hasChildNodes ) {
								collect_the_elements( currentValue );
							}
						}
					}, 'this'
				);
			}
		}
		if( the_root_element.hasChildNodes ) {
			collect_the_elements( the_root_element );
		}
		//cl( the_full_element_array.length );
		return the_full_element_array;
	}

	make_the_JS_class_name_title_case( the_className ) {
		var the_words = the_className.split( " " );
		var the_new_className = "";
		for ( this_word of the_words ) {
			this_word = "_" + this_word.charAt( 0 ).toUpperCase() + this_word.substring( 1 );
			the_new_className += this_word;
		}
		return the_new_className.substring( 1 );
	}

	truncate_the_className_for_JS_class_names( the_className, how_many_classNames = 2 ) {
		var the_words = the_className.split( " ", how_many_classNames );
		var the_new_className = "";
		for ( var i = 0; i < how_many_classNames; i++ ) {
			the_new_className += ` ${the_words[i]}`;
		}
		return the_new_className.substring( 1 );
	}

	change_the_className_case_for_JS_class_names( the_className ) {
		var the_words = the_className.split( " " );
		var the_new_className = "";
		for ( this_word of the_words ) {
			this_word = get_me_the_correct_JS_Class_spelling( this_word );
			this_word = "_" + this_word.charAt( 0 ).toUpperCase() + this_word.substring( 1 );
			the_new_className += this_word;
		}
		return the_new_className.substring( 1 );
	}

	_get( this_in_particular ) {
		return document.getElementById( this_in_particular );
	}

	_tags( the_grand_daddy_tag ) {
		//cl( the_grand_daddy_tag, "the_grand_daddy_tag" );
		var the_grand_daddy_element;
		if ( document.getElementsByTagName( the_grand_daddy_tag ).length !== 0 ) {
			the_grand_daddy_element = document.getElementsByTagName( the_grand_daddy_tag ).item(0);
		} else if ( typeof document.getElementById( the_grand_daddy_tag ) === "object" ) {
			the_grand_daddy_element = document.getElementById( the_grand_daddy_tag );
		} else {
			return false;
		}
		return the_grand_daddy_element.children;
	}

	reset_the_zIndexes( of_these_elements, i_was_the_last_item_arranged ) {
		var my_zIndex = i_was_the_last_item_arranged.style.zIndex;
		var the_whole_tag_collection = document.getElementsByClassName( of_these_elements );
		for ( var this_tag of the_whole_tag_collection ) {
			this_tag.style.zIndex = "all:revert;";
		}
		i_was_the_last_item_arranged.style.zIndex = my_zIndex;
	}

	reset_all_the_styles_to_defaults() {
		document.documentElement.style = "all:revert;";
	}

	move_me_to_the_root_zStack( me ){
		var the_old_me = me;
		var the_new_me = the_old_me.cloneNode( true );
		document.body.appendChild( the_new_me );
		the_old_me.parentElement.removeChild( me );
		the_new_me.style.zIndex = parseInt( the_new_me.parentElement.style.zIndex ) + 100;
		me = the_new_me;
	}

	get_me_the_correct_JS_class_name( for_this_className ) { // move this to startup
		switch( for_this_className ) {
			case "navbar"			:	return "NavBar";
			case "navlist"			:	return "NavList";
			case "navmenu"			:	return "NavMenu";
			case "navitem"			:	return "NavItem";
			case "navlink"			:	return "NavLink";
			case "menubar"			:	return "MenuBar";
			case "menulist"		:	return "MenuList";
			case "menulink"		:	return "MenuLink";
			case "menuitem"		:	return "MenuItem";
			case "archives navbar"	:	return "Archives_NavBar";
			case "archives navlist"	:	return "Archives_NavList";
			case "archives navmenu"	:	return "Archives_NavMenu";
			case "archives navitem"	:	return "Archives_NavItem";
			case "archives navlink"	:	return "Archives_NavLink";
			default				:	return for_this_className;
		}
	}
}