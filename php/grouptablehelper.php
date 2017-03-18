<?php require 'dbcon.php';
session_start();
$gn=$_POST['gn'];
$ln=$_POST['ln'];
$gtn=$_POST['gtn'];

$sql_AddGrpTb=
"
insert into ".$dbName.".group (grp_name,grp_loc,admin_id,admin_name)
values ('".$gn."','".$ln."','".$_SESSION["id_store"]."','".$_SESSION["name_store"]."')
";
$AGT = $con->query($sql_AddGrpTb);

/*echo $sql_AddGrpTb;*/

$sql_getGrpId=
"
select grp_id from ".$dbName.".group
where grp_name='".$gn."'
and admin_id='".$_SESSION["id_store"]."'
";
$GID = $con->query($sql_getGrpId);

if($GID === false) 
        {
        trigger_error('Wrong SQL: ' . $sql_getGrpId . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$GID->data_seek(0);
		  while ($row = $GID->fetch_assoc())
		    {
		   		$gnid=$row['grp_id'];	
		    }
		  // Free result set
		  mysqli_free_result($GID);
		}
$GroupId= array();
$GroupId=explode("id",$gtn);
$GroupId[0]=$_SESSION["id_store"];

/*print_r($GroupId);
*/
/*$sql_AddGrpTb=
"
insert into ".$dbName.".tbid".$_SESSION["id_store"]." (groups,groups_id)
values ('".$gn."','".$gnid."')
";
$AGT = $con->query($sql_AddGrpTb);*/

for ($i=0; $i <sizeof($GroupId) ; $i++) 
	{ 

		$sql_AddGrpTb=
		"
		insert into ".$dbName.".tbid".$GroupId[$i]." (groups,groups_id)
		values ('".$gn."','grp".$gnid."chat')
		";

		$AGT = $con->query($sql_AddGrpTb);

		

		$sql_AddGrpNotiTb=
		"
		insert into ".$dbName.".noti".$GroupId[$i]." (grpname,grpid,date,time)
		values ('".$gn."','"."grp".$gnid."chat','".date("Ymd")."','".time()."')
		";

		$AGNT = $con->query($sql_AddGrpNotiTb);
		
	}

$sql_createGroupTable=
"
CREATE TABLE grp".$gnid."mem
(
num int NOT NULL AUTO_INCREMENT,
members varchar(255),	mem_id varchar(255),
date varchar(255),
time varchar(255),
date2 varchar(255),
time2 varchar(255),
PRIMARY KEY (num)
)
";
$CGT = $con->query($sql_createGroupTable);

$sql_createGroupChatTable=
"
CREATE TABLE grp".$gnid."chat
(
num int NOT NULL AUTO_INCREMENT,
sender varchar(255),	sender_id varchar(255), message varchar(255),
date varchar(255),
time varchar(255),
date2 varchar(255),
time2 varchar(255),
PRIMARY KEY (num)
)
";
$CHAT_TABLE = $con->query($sql_createGroupChatTable);

for ($i=0; $i <sizeof($GroupId) ; $i++) 
{ 

	$sql_getNameId=
	"
	select id,name from user
	where id='".$GroupId[$i]."'
	";

	$name_fetch = $con->query($sql_getNameId);

	if($name_fetch === false) 
	        {
	        trigger_error('Wrong SQL: ' . $sql_getNameId . ' Error: ' . $con->error, E_USER_ERROR);
	        }else{
	        	$name_fetch->data_seek(0);
			  while ($row = $name_fetch->fetch_assoc())
			    {
			   		$name=$row['name'];			   		
			    }
			  // Free result set
			  mysqli_free_result($name_fetch);
			}


	$sql_addMembers=
	"
	insert into grp".$gnid."mem (members,mem_id)
	values ('".$name."','".$GroupId[$i]."')
	";
	$add_Members = $con->query($sql_addMembers);
}

header('Location: groups.php');

require 'discon.php'; ?>