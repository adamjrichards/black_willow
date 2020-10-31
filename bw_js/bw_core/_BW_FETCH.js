/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "_BW_FETCH",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/
	
class _BW_FETCH {

	constructor( callback = null ) {
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
		this.my_XHR.open( "POST", the_codepage_we_want, true );
		this.my_XHR.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
		if ( callback === null ) {
			callback = function( the_source_code ) {
				Object.defineProperty( ME.my_cargo, "MY_FETCH", { writable: true, configurable: true, value: the_source_code.toString() } );
			}
		}
		this.my_target_file;
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