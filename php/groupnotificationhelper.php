<?php  

$sql_messageCNT=
"
select count(*) as count , message, date , time  from ".$grpid."
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
	echo "<table><tr  id='".$grpid."' name='".$grpname."' class='groupchat'><td><strong>1</strong> new message in group <strong>'".$grpname."'</strong></td><td>".$datetime."</td><tr></table>";
		}
		else if ($count>1) {
	echo "<table><tr  id='".$grpid."' name='".$grpname."' class='groupchat'><td><strong>".$count."</strong> new messages in group <strong>'".$grpname."'</strong></td><td>".$datetime."</td><tr></table>";
		}

		if ($count==0) {
		$i++;
		}


?>