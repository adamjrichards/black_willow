/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "_BW_LISTENER",
	"my_defer" : "",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class _BW_LISTENER {
	constructor( me = null, the_trigger = null ) {
		if ( me === null || typeof me === "string" ) {
			this.me = {};
		} else if ( me instanceof HTMLElement || typeof me == "object" ) {
			this.me = me;
		}
		if ( the_trigger !== null ) {
			this.my_trigger = this.the_trigger;
			me.my_trigger = this.the_trigger;
		}
	}
	get_my_listener() {
		return this.me;
	}
	set_my_action( the_action ) {
		this.the_action = the_action;
	}
	get_my_trigger() {
		return this.my_trigger;
	}
	set_my_trigger( the_trigger ) {
		this.my_trigger = the_trigger;
	}
}