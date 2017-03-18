<?php  

$name=$row['name'];
$id  =$row['id'];

$grpname=$row['grpname'];
$grpid  =$row['grpid'];

$date=$row['date'];
$time=$row['time'];
$my_id=$_SESSION['id_store'];


if ($id!=null) {
	# code...

$chat_table_name= "chtb".(($id>$my_id) ? $my_id."and".$id : $id."and".$my_id);

$sql_messageCNT=
"
select count(*) as count , message, date,time  from ".$chat_table_name."
where time2>'".$time."'
";

$ctr=$con->query($sql_messageCNT);

if($ctr === false) 
        {
        trigger_error('Wrong SQL: ' . $sql_messageCNT . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$ctr->data_seek(0);
		  while ($row = $ctr->fetch_assoc())
		    {
		   		$count=$row['count'];
		   		$message=$row['message'];
		   		$t=strtotime($row['time']);
		if ($row['date']==date("d/m/Y")) {
			$datetime=date("h:ia",$t);
		}else{
		$datetime=$row['date']." | ".date("h:ia",$t);}
				   		
		    }
		  // Free result set
		  mysqli_free_result($ctr);
		}
		if ($count==1) {echo '<script src="js/nsc.js"></script>';
	echo "<table><tr  id='".$id."' class='chat'><td><strong>'".$message."'</strong> message from ".$name."</td><td>".$datetime."</td><tr></table>";
		}
		else if ($count>1) {
	echo "<table><tr  id='".$id."' class='chat'><td><strong>".$count."</strong> new messages from ".$name."</td><td>".$datetime."</td><tr></table>";
		}

		if ($count==0) {
		$i++;
		}
}
else{
	
	require 'groupnotificationhelper.php';
}



		
?>