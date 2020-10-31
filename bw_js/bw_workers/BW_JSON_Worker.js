/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "module",
	"my_name" : "BW_JSON_Worker",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class BW_JSON_Worker extends BW_Worker {

	constructor( the_browser_me, the_server_me ) {
		super.constructor( the_browser_me, the_server_me );
	}
	the_fetch( callback = null ) {
		fetch( my_source ).then(
			response => toString( response.json() )
		).then(
			data => {
				if ( callback !== null ) {
					callback = callback.bind( ME );
					callback( data );
				}
				return data;
			}
		).then(
			data => {
				ME.add_this_to_my_cargo( data );
				return ME.my_cargo;
			}
		);
	}
	the_callback( the_data ) {
		this.myself.innerHTML = `#code class='hide_me'>${ toString( the_data )}#/code>`;
	}
}