
<!-- 
NOT IN USE
29-09-2016
CODE OF CHATIMPLODER CONTAINS REQUIRED CODES OF THIS FILE
ANUP
Hx
 -->
 
<?php  
session_start();


function getmessages()
{
require 'dbcon.php'; 

$Get_Messages=
"
select * from ".$_SESSION["CTN"]."
";
$messages= array();
$GetM=$con->query($Get_Messages);
if($GetM === false) 
        {
        trigger_error('Wrong SQL: ' . $Get_Messages . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$GetM->data_seek(0);
        	$i=0;
		  
		  while ($row = $GetM->fetch_assoc())
		    {
		    	$messages[$i]=$row['sender_id'];					$i+=1;
		   		$messages[$i]=$row['message'];	$i+=1;
		   		
		    }
		  // Free result set
		  mysqli_free_result($GetM);
		}


return $messages;

require 'discon.php'; 
}

?>
