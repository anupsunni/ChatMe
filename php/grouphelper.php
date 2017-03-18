<script type="text/javascript">
	$(document).ready(function(){
    $(".groupchatbutton").click(function(){
    	
        var grp_chat_id = $(this).attr("id");
        var grp_chat_nm = $(this).attr("name");
        
        $.post('php/groupchat.php',{grp_chat_id:grp_chat_id,grp_chat_nm:grp_chat_nm},function(data) {
        	/*if (data) 
        	{ 
        		window.open("chatbox.php","_self");
        	};*/
        	/*alert(data);*/
        	window.open("groupchatbox.php","_self");
        });

    });
});
</script>
<?php  require 'dbcon.php';


echo "<br>----------------------------<br>";



$sql_getGroupList=
"
select groups,groups_id from tbid".$_SESSION["id_store"]."
WHERE groups IS NOT NULL
";
$sql_GGL=$con->query($sql_getGroupList);
if($sql_GGL === false) 
        {
        trigger_error('Wrong SQL: ' . $sql_friends . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$sql_GGL->data_seek(0);
             	
		    while ($row = $sql_GGL->fetch_assoc())
		    {
		   	
		   echo "<button class='groupchatbutton' style=' border-radius:5px; background-color: #4A148C;
border:2px #4A148C solid;color:white; font-size:19px; text-align:center; min-width:100px;' name='".$row["groups"]."' id='".$row["groups_id"]."'>".$row["groups"]."</button>  ";
		   		
		   		   		
			   		
		    }
		    
		  // Free result set
		  mysqli_free_result($sql_GGL);
		}

require 'discon.php';?>