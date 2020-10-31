/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "BW_DOM_Event_Stack",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class BW_DOM_Event_Stack {
	constructor( me = null, ...the_params ) {
		if ( me === null ) {
			this.me = {};
		} else if ( me instanceof HTMLElement ) {
			this.me = me;
		} else if ( typeof me === 'string' ){
			try {
				this.me = document.getElementById( me );
			} catch ( an_error ) {
				this.me = {};
			}
		}
		for ( let this_one in the_params ) {
			if ( this_one instanceof DOM_Event ) {
				this.me.defineProperty( `my_${this_one}`, this_one );
			}
		}
		console.log( this.me );
	
	}
	get_my_event_stack() {
		return this.my_event_stack;
	}
}