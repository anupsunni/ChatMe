<?php  require 'dbcon.php'; 
session_start();
$message = $_POST['message'];
$sql_sendmessage=
"
insert into ".$_SESSION["CTN"]." (sender, sender_id, message,date,time,date2,time2)
values ('".$_SESSION["name_store"]."','".$_SESSION["id_store"]."','".$message."','".date("d/m/Y")."','".date("h:i:sa")."','".date("Ymd")."','".time()."')
";

$SendM=$con->query($sql_sendmessage);

$sql_insert_noti=
	"
		UPDATE noti".$_SESSION["id_store"]."
		SET date='".date("Ymd")."' , time='".time()."'
		WHERE id='".$_SESSION["friend_id_store"]."'
	";

$insert_noti=$con->query($sql_insert_noti);

$sql_countM=
"
select count(*) as count from ".$_SESSION["CTN"]."
";

$ctr=$con->query($sql_countM);

if($ctr === false) 
        {
        trigger_error('Wrong SQL: ' . $sql_countM . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$ctr->data_seek(0);
		  while ($row = $ctr->fetch_assoc())
		    {
		   		$count=$row['count'];			   		
		    }
		  // Free result set
		  mysqli_free_result($ctr);
		}

$sql_UpdateCountM=
"
update ".$_SESSION["CTN"]."count
set num=".$count."
where id='1'
";
$UpdateCount=$con->query($sql_UpdateCountM);




if ($SendM==true) {
	# code...
	echo "hehe";
}


require 'discon.php';?>