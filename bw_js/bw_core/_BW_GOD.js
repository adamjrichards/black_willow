/* Script tag attributes *****************************************************************
BEGIN
{
	"my_MIMEType" : "text/javascript",
	"my_name" : "_BW_GOD",
	"my_defer" : "defer",
	"my_async" : "",
	"my_other_attributes" : ""
}
END
*****************************************************************************************/

class _BW_GOD {

	constructor() {
		this.my_children = new Map();
		this.my_only_draggable;
		this.my_active_ME;
	}
	
	make_sure_all_the_others_are_dead(){
		this.my_children.clear();
	}

	there_is_only_one_draggable_element_at_a_time( me ) {
		make_sure_all_the_others_are_dead();
		this.my_only_one = new Draggable_Element( me );
		if( typeof this_is_the_draggable_element_now === "object" ) {
			this_is_the_draggable_element_now.bring_me_to_the_front();
		}
	}
}