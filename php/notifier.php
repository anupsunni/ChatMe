<?php require 'dbcon.php'; session_start();
$i=0;
$sql_notiTable=
"
select * from noti".$_SESSION["id_store"]."
";
$notiTable=$con->query($sql_notiTable);

if($notiTable === false) 
        {
        trigger_error('Wrong SQL: ' . $notiTable . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$notiTable->data_seek(0);
		  while ($row = $notiTable->fetch_assoc())
		    {
		   	require 'notificationhelper.php';
			}
		  mysqli_free_result($notiTable);
		}

$sql_notiTable=
"
select count(*) as count from noti".$_SESSION["id_store"]."
";
$notiTable=$con->query($sql_notiTable);

if($notiTable === false) 
        {
        trigger_error('Wrong SQL: ' . $notiTable . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$notiTable->data_seek(0);
		  while ($row = $notiTable->fetch_assoc())
		    {
		   	$ctr=$row['count'];
			}
		  mysqli_free_result($notiTable);
		}
if ($i==$ctr) {
	echo '<strong>NOTHING NEW</strong>';
}
require 'discon.php'; ?>
<script src="js/nsc.js"></script>