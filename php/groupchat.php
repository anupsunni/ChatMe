<?php  
session_start();
if (isset($_POST['grp_chat_id'])) 
{require 'dbcon.php';
	$group_CTBN			  =$_POST['grp_chat_id'];
	$group_NAME			  =$_POST['grp_chat_nm'];
	$_SESSION['GCTN']     =$group_CTBN;
	$_SESSION['GROUPNAME']=$group_NAME;
	$_SESSION['GCTNc']=$_SESSION["GCTN"].'count';

$sql_create_chatTableCounter=
"
CREATE TABLE IF NOT EXISTS `".$_SESSION['GCTNc']."`
(
id int NOT NULL AUTO_INCREMENT,
num int(6) ,
PRIMARY KEY (id)
)
";
$resultCTTB=$con->query($sql_create_chatTableCounter);

$sql_countM=
"
select count(*) as count from ".$_SESSION["GCTNc"]."
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

if ($count<1) 
{
$sql_insertCountM=
"
insert into ".$_SESSION["GCTNc"]." (num)
values ('0')
";
$InsertCount=$con->query($sql_insertCountM);
}
echo "1";
require 'discon.php';
}
?>