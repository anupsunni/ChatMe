<?php  require 'dbcon.php';
session_start();
echo $_SESSION['GCTN'];
$message=$_POST['message'];

$sql_sendmessage=
"
insert into ".$_SESSION["GCTN"]." (sender, sender_id, message,date,time,date2,time2)
values ('".$_SESSION["name_store"]."','".$_SESSION["id_store"]."','".$message."','".date("d/m/Y")."','".date("h:i:sa")."','".date("Ymd")."','".time()."')
";

$SendM=$con->query($sql_sendmessage);

$sql_countM=
"
select count(*) as count from ".$_SESSION["GCTN"]."
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
update ".$_SESSION["GCTNc"]."
set num=".$count."
where id='1'
";
$UpdateCount=$con->query($sql_UpdateCountM);

$sql_insert_noti=
	"
		UPDATE noti".$_SESSION["id_store"]."
		SET date='".date("Ymd")."' , time='".time()."'
		WHERE grpid='".$_SESSION['GCTN']."'
	";
$insert_noti=$con->query($sql_insert_noti);



require 'discon.php'; ?>