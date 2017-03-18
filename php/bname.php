<?php
session_start();
?>
<?php require 'dbcon.php';

$bname_u_id=$row['id'];
$bname_my_id=$_SESSION["id_store"];
 
$sql1="SELECT fn_to_id,fn_from_id,friends_id FROM tbid".$bname_my_id." ";
$result1 = $con->query($sql1);

if($result1 === false) 
        {
        trigger_error('Wrong SQL: ' . $sql1 . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$result1->data_seek(0);
		  while ($row1 = $result1->fetch_assoc())
		    {
		   		
		   	if ($row1['fn_to_id']==$bname_u_id )  { $bname= "Request Sent"; }

		   	if ($row1['fn_from_id']==$bname_u_id )  { $bname= "Accept"; }

		   	if ($row1['friends_id']==$bname_u_id )  { $bname= "Friend"; }
			   		
		    }
		  // Free result set
		  mysqli_free_result($result1);
		}





require 'discon.php'; ?>