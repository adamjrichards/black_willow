/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "BW_XHR_Handler",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class BW_XHR_Handler extends _BW_XHR {

// the_params_array = [
//  the_codepage_we_want,
//   the_new_cargos_label = null,
//    where_to_put_it = null,
//     the_query_string = null,
//      callback = null ];

	constructor( the_params_array, the_callback = null ) {
		the_codepage_we_want = the_params_array[ "the_codepage_we_want" ];
		if ( the_params_array[ "the_new_cargos_label" ] === null ) {
			the_new_cargos_label = the_codepage_we_want.replace( ".", "_" );
		}
		if ( the_params_array[ "where_to_put_it" ] === null ) {
			where_to_put_it = the_codepage_we_want;
		}
		if ( the_params_array[ "the_query_string" ] === null ) {
			the_query_string = "";
		}
		if ( isNull( callback ) ) {
			the_callback = function( the_source_code ) {
				Object.defineProperty( ME.my_cargo, the_new_cargos_label, { writable: true, configurable: true, value: the_source_code.toString() } );
			}
		}
		super.constructor( the_codepage_we_want, the_new_cargos_label, where_to_put_it, the_query_string, the_callback );
	}
	make_the_request( the_request_params = null ) {
		if ( ! isNull( the_request_params ) ) {
			this.my_request_params = the_request_params;
		}
		this.my_XHR.send( this.my_request_params );
	}
	set_my_label( to_this ) {
		this.my_label = to_this;
	}
	set_my_location( to_this ) {
		this.my_location = to_this;
	}
	set_my_query_string_to_this( to_this ) {
		this.my_query_string_to_this = to_this;
	}
	set_my_request_params( to_these ) {
		this.my_label = to_these[ "the_label" ];
		this.my_location = to_these[ "the_location" ];
		this.my_query_string = to_these[ "the_query_string" ];
		this.my_request_params = [ this.my_label, this.my_location, this.my_query_string ];
	}
}