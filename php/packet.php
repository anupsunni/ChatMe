<?php session_start();require 'dbcon.php'; 

$countM="select num from ".$_SESSION["CTN"]."count where id='1'";

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
		
		$sql_getLoginStatus="select lgn_stat from tbid".$_SESSION["friend_id_store"]." where num='1' ";
		$GLS = $con->query($sql_getLoginStatus); 
		if($GLS === false) 
			{
				trigger_error('Wrong SQL: ' . $sql_getLoginStatus . ' Error: ' . $con->error, E_USER_ERROR);
			}
			else
				{
					$GLS->data_seek(0);
					while ($row = $GLS->fetch_assoc())
						{
							$status=$row['lgn_stat'];
				}mysqli_free_result($GLS);
			}if ($status==1){$lstat='1';}else{$lstat='0';}$info.='fly'.$lstat;
echo $info;require 'discon.php';?>