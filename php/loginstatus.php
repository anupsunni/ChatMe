<!-- 
NOT IN USE
20-10-2016
CODE OF PACKET.PHP CONTAINS REQUIRED CODES OF THIS FILE
ANUP
Hx
-->

 <?php  require 'dbcon.php'; session_start();

$sql_getLoginStatus=
"
select lgn_stat from tbid".$_SESSION["friend_id_store"]."
where num='1'
";
$GLS = $con->query($sql_getLoginStatus);

if($GLS === false) 
        {
        trigger_error('Wrong SQL: ' . $sql_getLoginStatus . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$GLS->data_seek(0);
		  while ($row = $GLS->fetch_assoc())
		    {
		   		
		   		$status=$row['lgn_stat'];		   		
		    }
		  // Free result set
		  mysqli_free_result($GLS);
		}
if ($status==1)
	{
		echo true;
	}
else
	{
		echo false;
	}


require 'discon.php';?>