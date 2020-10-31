/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "BW_Listener_Stack_from_JSON",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class BW_Listener_Stack_from_JSON {

	constructor( the_JSON_source, callback = null ) {
		callback = function( the_JSON ) {
			Object.defineProperty( ME.my_cargo, "my_reader", { writable: true, configurable: true, value:  new DOM_Listener_JSON_Reader( the_JSON ) } );
			Object.defineProperty( ME.my_cargo, "my_stack", { writable: true, configurable: true, value: ME.my_cargo.my_reader.get_my_new_stack() } );
		}
		function the_fetch( the_JSON_source, callback ) {
			fetch( the_JSON_source, "the" ).then(
				function( response ) {
					return response.json();
				} ).then(
				function( the_JSON ) {
					callback( the_JSON );
				} );
		}
		let the_ME_fetch = the_fetch.bind( ME.myself );
		the_ME_fetch();
	}
	get_my_stack() {
		return ME.my_stack;
	}
}