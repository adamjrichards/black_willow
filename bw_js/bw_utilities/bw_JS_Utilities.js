/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "bw_JS_Utilities",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class bw_JS_Utilities {

	is_this_a( the_type_of_thing, the_actual_thing ) {
		return the_actual_thing instanceof the_type_of_thing;
	}

	this_is_a_string( the_item_in_question ) {
		if ( typeof the_item_in_question === "string" ) {
			return true;
		}
		return false;
	}

	make_sure_this_is_an_element( the_whatever ) {
		if ( the_whatever instanceof HTMLElement ) {
			return the_whatever;
		} else {
			return document.getElementById( the_whatever );
		}
	}

	get_me_a_random_int( min, max ){
		return min + Math.ceil( Math.random() * ( max - min ) );
	}

	symbolize_in_global_scope( stuff ){ return Symbol( stuff ); }
	_symbolize = symbolize_in_global_scope.bind( globalThis );
}
/*/export { is_this_a, this_is_a_string, make_sure_this_is_an_element, get_me_a_random_int };/*/