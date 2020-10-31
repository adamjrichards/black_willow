/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "_BW_XHR",
	"my_defer" : "defer",
	"my_async" : "async",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class _BW_XHR {

	constructor( the_codepage_we_want, the_new_cargos_label = null, where_to_put_it = null, callback = null ) {
		this.my_codepage = the_params_array[ "the_codepage_we_want" ];
		this.my_label = the_params_array[ "the_new_cargos_label" ];
		this.my_location = the_params_array[ "where_to_put_it" ];
		this.my_query_string = the_params_array[ "the_query_string" ];

		if ( isNull( callback ) ) {
			callback = function( the_source_code ) {
				Object.defineProperty( ME.my_cargo, the_new_cargos_label, { writable: true, configurable: true, value: the_source_code.toString() } );
			}
		}
		this.callback = callback;
		this.callback = callback;
		this.my_XHR = new XMLHttpRequest();
		this.my_XHR.onreadystatechange = function() {
			if ( this.readyState === 4 || this.status === 200 ) {
				switch( this.my_file_extension.toLowerCase() ) {
					case "txt"	:	this.callback( responseText );
					case "js"		:	this.callback( responseHTML );
					case "json"	:	this.callback( JSON.parse( responseText ) );
					case "html"	:
					case "php"	:	this.callback( responseHTML );
						default	:	this.callback( response );
				}
			}
		}; // onreadystatechange()
		request_this.open( "POST", the_codepage_we_want, true );
		request_this.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
		request_this.send( the_new_cargos_label );
	}
}