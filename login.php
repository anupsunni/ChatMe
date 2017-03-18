<?php  require 'php/dbcon.php'; 
$Rmail=$_POST['EmAiL'];
$Rpass=$_POST['PaSs'];

$sql="SELECT email, password FROM user";	
$log=0;
$result = $con->query($sql);
if($result === false) 
        {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$result->data_seek(0);
		  while ($row = $result->fetch_assoc())
		    {
		   		
		   	if ($row['email']===$Rmail && $row['password']===$Rpass ) 
			   		{login(1,$Rmail);}
			   		
		    }
		  // Free result set
		  mysqli_free_result($result);
		}




function login($log,$Rmail){
require 'php/dbcon.php';
if ($log) {
	# code...
	$sql_getID=
"
select id,name from user
where email='".$Rmail."'
";

$id_fetch = $con->query($sql_getID);

if($id_fetch === false) 
        {
        trigger_error('Wrong SQL: ' . $sql_getID . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$id_fetch->data_seek(0);
		  while ($row = $id_fetch->fetch_assoc())
		    {
		   		
		   		$id=$row['id'];
		   		$name=$row['name'];			   		
		    }
		  // Free result set
		  mysqli_free_result($id_fetch);
		}
session_start();
$_SESSION["email_store"] = $Rmail;  //TO BE CHANGED    
$_SESSION["id_store"] = $id; 	    //TO BE CHANGED
$_SESSION["name_store"]=$name; 	    //TO BE CHANGED  

$sql_UpdateLoginStatus=
"
UPDATE tbid".$_SESSION["id_store"]."
SET lgn_stat='1'
WHERE num='1';

";
$ULS = $con->query($sql_UpdateLoginStatus);

header("Location: wall.php");
exit;

	
}
else
{
	echo "<h2>Invalid Username Or Password</h2>";
}

require 'php/discon.php';
}



require 'php/discon.php';?>