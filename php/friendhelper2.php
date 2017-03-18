<script type="text/javascript">
	$(document).ready(function(){
    $(".chatbutton").click(function(){
    	
        var bt_chat_id = $(this).attr("id");
       
        
        $.post('php/chat2.php',{bt_chat_id:bt_chat_id},function(data) {
        	if (data) 
        	{ 
        		window.open("chatbox.php","_self");
        	};
        	
        });

    });
});
</script>

<?php
$my_id=$_SESSION["id_store"];
?>

<?php  require 'dbcon.php'; 


echo "<h2 id='hdrs'>Friends</h2>";

$sql_friends=
"
select friends,friends_id from tbid".$my_id."

";
$friends = $con->query($sql_friends);
if($friends === false) 
        {
        trigger_error('Wrong SQL: ' . $sql_friends . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$friends->data_seek(0);
             	
		    while ($row = $friends->fetch_assoc())
		    {
		   		if ($row["friends_id"]!=null) {
		   			echo "<button class='chatbutton' id='".$row["friends_id"]."'>".$row["friends"]."</button>  ";
		   		}
		   		   		
			   		
		    }
		    
		  // Free result set
		  mysqli_free_result($friends);
		}

require 'discon.php'
?>