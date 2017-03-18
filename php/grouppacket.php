<?php session_start();require 'dbcon.php'; 





$countM="select num from ".$_SESSION["GCTNc"]." where id='1'";

$ctr=$con->query($countM);

if($ctr === false) 
	{
		trigger_error('Wrong SQL: '. $countM . ' Error: ' . $con->error, E_USER_ERROR);
	}else
	{
		$ctr->data_seek(0);
		while ($row = $ctr->fetch_assoc())
			{
				$info=$row['num'];
			}mysqli_free_result($ctr);
		}
echo $info;
require 'discon.php';?>