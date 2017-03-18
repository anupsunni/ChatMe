<?php require 'dbcon.php';
session_start();
$button_id=$_POST['bt_id'];
$my_id=$_SESSION["id_store"];
$my_name=$_SESSION["name_store"];
$check=1;

 
$sql_del_fnfrom_mytable=
"
DELETE FROM tbid".$my_id."
WHERE fn_from_id='".$button_id."';
";
$Del_My_Table = $con->query($sql_del_fnfrom_mytable);
if($Del_My_Table === false){$check=0;}


$sql_del_fnfrom_FrnDtable=
"
DELETE FROM tbid".$button_id."
WHERE fn_to_id='".$my_id."';
";
$Del_Friend_Table = $con->query($sql_del_fnfrom_FrnDtable);

if($Del_Friend_Table === false){$check=0;}


$Get_Name_From_user=
"
select name,id from user where id='".$button_id."'
";
$getName=$con->query($Get_Name_From_user);




if($getName === false) 
        {$check=0;
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$getName->data_seek(0);
		  while ($row = $getName->fetch_assoc())
		    {
		    	
		   	if ($row['id']===$button_id ) 
			   		{ $friendname=$row['name']; }
		    }
		  // Free result set
		  mysqli_free_result($getName);
		}





$sql_addNameId_addtoUserTable=
"
insert into tbid".$my_id." (friends,friends_id)
values ('".$friendname."','".$button_id."')
";
$Add_To_UserTB = $con->query($sql_addNameId_addtoUserTable);
if($Add_To_UserTB === false){$check=0;}

$sql_addNameId_addtoMyTable=
"
insert into tbid".$button_id." (friends,friends_id)
values ('".$my_name."','".$my_id."')
";
$Add_To_MyTB = $con->query($sql_addNameId_addtoMyTable);

if($Add_To_MyTB === false){$check=0;}


$sql_addtoNoti_SELF=
"
insert into noti".$my_id." (id,name,date,time)
values ('".$button_id."','".$friendname."','".date("Ymd")."','".time()."')
";
$addtoNoti_SELF=$con->query($sql_addtoNoti_SELF);
if($addtoNoti_SELF=== false){$check=0;}

$sql_addtoNoti_FRIEND=
"
insert into noti".$button_id." (id,name,date,time)
values ('".$my_id."','".$my_name."','".date("Ymd")."','".time()."')
";
$addtoNoti_FRIEND=$con->query($sql_addtoNoti_FRIEND);
if($addtoNoti_FRIEND=== false){$check=0;}


echo $check;

require 'discon.php'; ?>