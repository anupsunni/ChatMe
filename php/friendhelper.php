<?php
$my_id=$_SESSION["id_store"];
?>
<script type="text/javascript">
	$(document).ready(function(){
    $(".acptBT").click(function(){
    	
        var bt_id = $(this).attr("id");
       
        
        $.post('php/accept.php',{bt_id:bt_id},function(data) {
        	if (data) {

        		location.reload();
        	};
        	
        });

    });
});
</script>

<link rel="stylesheet" href="css/search.css" type="text/css">
<?php  require 'dbcon.php'; 


$sql_friends_request=
"
select fn_to,fn_to_id,fn_from,fn_from_id from tbid".$my_id."

";
$friend_req = $con->query($sql_friends_request);








if($friend_req === false) 
        {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$ctr=0;
        	$friend_req->data_seek(0);
        	$fnr_arr= array();
			echo "<table id='fnrq'>";
		  while ($row = $friend_req->fetch_assoc())
		    {
		   		if($row["fn_from"]!=null)
		    	{	$ctr++;
		   		echo "<tr><th>".$row["fn_from"]."</th><th>"."<button class='acptBT' id='".$row['fn_from_id']."'>Accept"."</th></tr>";    		
			   	}	
		    }
		    
		    if ($ctr==0) {
		    	# code...
		    	echo "<h5>---</h5>";
		    }
		    echo "</table>";
		  // Free result set
		  mysqli_free_result($friend_req);
		}





require 'discon.php';?>