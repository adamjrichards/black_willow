/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "BW_Fetch_Handler",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class BW_Fetch_Handler extends _BW_FETCH {

	constructor( the_params_array, callback = null ) {
		this.my_codepage = the_params_array[ "the_codepage_we_want" ];
		this.my_label = the_params_array[ "the_new_cargos_label" ];
		this.my_location = the_params_array[ "where_to_put_it" ];
		this.my_query_string = the_params_array[ "the_query_string" ];
		if ( isNull( callback ) ) {
			callback = function( the_source_code ) {
				Object.defineProperty( ME.my_cargo, the_new_cargos_label, { writable: true, configurable: true, value: the_source_code.toString() } );
			}
		}
		this.my_callback = callback;
	}

	fetch_it( the_codepage_we_want, callback ) {
		this.my_file_extension = the_codepage_we_want.split( "." ).pop();
		fetch( the_codepage_we_want, callback ).then(
			function( response ) {
				switch( this.my_file_extension.toLowerCase() ) {
					case "txt"	:	return responseText;
					case "js"		:	return responseHTML;
					case "json"	:	return JSON.parse( responseText );
					case "html"	:
					case "php"	:	return responseHTML;
						default	:	return response;
				}
			} ).then(
			function( the_response ) {
				callback( the_response );
			} );
		//let the_ME_fetch =
			   fetch_it.bind( ME.myself )();
		//the_ME_fetch();
	}
}