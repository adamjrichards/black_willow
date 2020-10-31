/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "_BW_CARGO",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/
	
class Cargo {
	constructor( the_status = "empty" ) {
		this.my_status = the_status;
		this.my_slots = new Map();
	}
	add_this_to_my_cargo( the_new_cargo, under_this_label ) {
		this.my_slots.set( under_this_label, the_new_cargo );
	}
}