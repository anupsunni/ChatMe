	$(document).ready(function(){
    $(".chat").click(function(){
    	
        var bt_chat_id = $(this).attr("id");
       
        
        $.post('php/chat2.php',{bt_chat_id:bt_chat_id},function(data) {
        	if (data) 
        	{ 
        		window.open("chatbox.php","_self");
        	};
        	
        });

    });
    $(".groupchat").click(function(){
        
        var grp_chat_id = $(this).attr("id");
        var grp_chat_nm = $(this).attr("name");
        
        $.post('php/groupchat.php',{grp_chat_id:grp_chat_id,grp_chat_nm:grp_chat_nm},function(data) {

            window.open("groupchatbox.php","_self");
        });

    });
});