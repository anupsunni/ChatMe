<?php  require 'dbcon.php'; 
session_start();
$my_id=$_SESSION["id_store"];
$me_name=$_SESSION["name_store"];
?>
<?php  

$friend_id=$_POST['bt_chat_id'];
$_SESSION["friend_id_store"]=$friend_id;
$chat_table_name= "chtb".(($friend_id>$my_id) ? $my_id."and".$friend_id : $friend_id."and".$my_id);


$sql_create_chatTableLastSeen=
"
CREATE TABLE IF NOT EXISTS `".$chat_table_name."ls`
(
num int NOT NULL AUTO_INCREMENT PRIMARY KEY,
person varchar(255),
id int,
date varchar(255),
time varchar(255),
date2 varchar(255),
time2 varchar(255)
)
";
$chatTableLastSeen=$con->query($sql_create_chatTableLastSeen);



$sql_create_chatTable=
"
CREATE TABLE IF NOT EXISTS `".$chat_table_name."`
(
num int NOT NULL AUTO_INCREMENT PRIMARY KEY,
sender varchar(255),
sender_id int(6),
message varchar(255),
date varchar(255),
time varchar(255),
date2 varchar(255),
time2 varchar(255)
)
";
$resultCTTB=$con->query($sql_create_chatTable);

if ($resultCTTB==true) {
	
	echo '1'; 
	$_SESSION["CTN"]=$chat_table_name;
}
$Get_Name_From_user=
"
select name,id from user where id='".$friend_id."'
";

$getName2=$con->query($Get_Name_From_user);
if($getName2 === false) 
        {
        trigger_error('Wrong SQL: ' .$Get_Name_From_user . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$getName2->data_seek(0);
		  while ($row = $getName2->fetch_assoc())
		    {
		    	
		   	if ($row['id']===$friend_id ) 
			   		{ $friendname2=$row['name']; }
		    }
		  // Free result set
		  mysqli_free_result($getName2);
		}
$_SESSION["fname"]=$friendname2;


$sql_create_chatTableCounter=
"
CREATE TABLE IF NOT EXISTS `".$_SESSION["CTN"]."count`
(
id int NOT NULL AUTO_INCREMENT,
num int(6),
PRIMARY KEY (id)
)
";
$resultCTTB=$con->query($sql_create_chatTableCounter);

$sql_countM=
"
select count(*) as count from ".$_SESSION["CTN"]."
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
insert into ".$_SESSION["CTN"]."count (num)
values ('0')
";
$InsertCount=$con->query($sql_insertCountM);
}

$sql_GetCount=
"
select count(*)as countls from ".$_SESSION["CTN"]."ls
";
$GC=$con->query($sql_GetCount);

if($GC === false) 
        {
        trigger_error('Wrong SQL: ' . $sql_GetCount . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$GC->data_seek(0);
		  while ($row = $GC->fetch_assoc())
		    {
		   		$countLS=$row['countls'];			   		
		    }
		  // Free result set
		  mysqli_free_result($GC);
		}


if ($countLS==0) {
	$sql_insertP1=
	"
		insert into `".$_SESSION["CTN"]."ls` (person,id,date,time,date2,time2)
		values ('".$_SESSION["name_store"]."','".$_SESSION["id_store"]."','".date("d/m/Y")."','".date("h:i:sa")."','".date("Ymd")."','".time()."')
	";
	$sql_insertP2=
	"
		insert into `".$_SESSION["CTN"]."ls` (person,id,date,time,date2,time2)
		values ('".$_SESSION["fname"]."','".$_SESSION["friend_id_store"]."','0','0','0','0')
	";
	$LS1=$con->query($sql_insertP1);
	$LS2=$con->query($sql_insertP2);

}else if ($countLS==2){
	
	$sql_insertP=
	"
		update `".$_SESSION["CTN"]."ls`
		set date='".date("d/m/Y")."' , time='".date("h:i:sa")."' , date2='".date("Ymd")."' , time2='".time()."'
		where id='".$_SESSION["id_store"]."'
	";
	$LS=$con->query($sql_insertP);

}



require 'discon.php';


?>