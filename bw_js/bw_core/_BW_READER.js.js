/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "_BW_READER",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/
	
class _BW_READER {

	constructor( the_language ) {
		this.my_language = [ the_language ];
		this.my_input_file = the_input_file;
		this.my_output_file = the_output_file;
		
		the_params_map = new Map( [
			[ "the_language", this.my_language ], 
			[ "the_ouput_file", this.my_output_file ],    
			[ "the_input_file", this.my_input_file ]
		] );
		
		this.my_XHR_handler = new BW_XHR_Handler( the_params_map );
		this.my_fetch_handler = new BW_Fetch_Handler( the_params_map );
	}
	
	get_the_input_file() {
		
	}
	get_the_output_file() {
	}
	set_the_input_file( to_this ) {
		
	}
	set_the_output_file( to_this ) {
	}
}