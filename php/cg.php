<script src="bsjs/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		var grouptablename="";
		$(".chatbutton").click(function(){
			var bt_grp_chat_id = $(this).attr("id");
			grouptablename+="id"+bt_grp_chat_id;
			$(this).hide(500);
			/*alert(grouptablename);*/
			

		});

		$(".Create").click(function(){
			var gn=$(".GN").val();
			var ln=$(".LN").val();
			var gtn=grouptablename;
			/*alert(gn+" | "+ln+" | "+gtn);*/
		$.post('php/grouptablehelper.php',{gn:gn,ln:ln,gtn:gtn},
			function(info3) {
            
            
        
        });

		});
	});

</script>



<?php  require 'dbcon.php'; 

echo'<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	input{
		outline:1px #4A148C solid;
		max-width: 300px;
		min-width: 100px;
		width: 200px;
		margin-top: 5px;
	}

	</style>
</head>
<body>
<form>
	<input type="text" placeholder="Group Name" class="GN" >
	<input type="text" placeholder="Location" class="LN" ><br>
	<button style="font-size:18px;color:white;margin-top:10px; border-radius:5px; background-color: #4A148C;
border:2px #4A148C solid; width:100px;" class="Create"><strong>Create</strong></button>
	</form><br>
</body>

</html>';
$sql_friends=
"
select friends,friends_id from tbid".$_SESSION["id_store"]."

";
$friends = $con->query($sql_friends);
if($friends === false) 
        {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$friends->data_seek(0);
 	
		  while ($row = $friends->fetch_assoc())
		    {
		   		if ($row["friends_id"]!=null) {
		   			echo "<button style='color:white;margin-top:2px; border-radius:5px; background-color: #4A148C;
border:2px #4A148C solid;' class='chatbutton' id='".$row["friends_id"]."'>".$row["friends"]."</button>  ";
		   		}
		   		   		
			   		
		    }
		    
		  // Free result set
		  mysqli_free_result($friends);
		}

		 require 'discon.php'; 
?>