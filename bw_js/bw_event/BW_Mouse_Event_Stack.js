/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "BW_DOM_Mouse_Event_Stack",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/
class BW_DOM_Mouse_Event_Stack extends BW_DOM_Event_Stack {
	my_mouseenter() {
		console.log( "rewind mouseenter" );
	}
	my_mouseleave() {
		console.log( "rewind mouseleave" );
	}
	my_mouseover() {
		console.log( "rewind mouseover" );
	}
	my_mouseout() {
		console.log( "rewind mouseout" );
	}
	my_mousedown() {
		console.log( "rewind mousedown" );
	}
	my_mouseup() {
		console.log( "rewind mouseup" );
	}
	my_mousemove() {
		console.log( "rewind mousemove" );
	}
	my_click() {
		console.log( "rewind click" );
	}
	my_doubleclick() {
		console.log( "rewind doubleclick" );
	}
}