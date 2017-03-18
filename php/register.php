<?php 

$Rname=$_POST['reg_name'];
$Rpass=$_POST['reg_pass'];
$Rmail=$_POST['reg_email'];

require 'dbcon.php';

if (empty($Rname) || empty($Rpass) || empty($Rmail)) {
	# code...
	echo "<h1>invalid username Email and/or password..</h1>";
	return false;
}

$sql_addUser=
"
insert into user (email,name,password) 
values('".$Rmail."','".$Rname."','".$Rpass."')
";
if ($con->query($sql_addUser)===true) {
	# code...
	/*echo "<h1>hooray registered</h1>";*/
	$i=1;
	
}

$sql_getID=
"
select id from user
where email='".$Rmail."'
";

$id_fetch = $con->query($sql_getID);

if($id_fetch === false) 
        {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$id_fetch->data_seek(0);
		  while ($row = $id_fetch->fetch_assoc())
		    {
		   		
		   		$id=$row['id'];
		   		
			   		
		    }
		  // Free result set
		  mysqli_free_result($id_fetch);
		  $i++;
		}

$sql_mkTb=
"
CREATE TABLE tbid".$id."
(
num int NOT NULL AUTO_INCREMENT,
lgn_stat int , id int ,
name varchar(255),	email varchar(255),
friends varchar(255),	friends_id varchar(255),
groups varchar(255),	groups_id varchar(255),
fn_to varchar(255),		fn_to_id varchar(255),
fn_from varchar(255),	fn_from_id varchar(255),
PRIMARY KEY (num)
)
";
if ($con->query($sql_mkTb)===true) {
	# code...
	/*echo "hooray table created";	*/
	$i++;
}
$sql_FirstInsert=
"
insert into tbid".$id." (lgn_stat,id,name,email)
values ('0','".$id."','".$Rname."','".$Rmail."')
";


if ($con->query($sql_FirstInsert)===true) {
	# code...
	/*echo "Values inserted";	*/
	$i++;
}



/*21-10-2016 ANUP Hx*/

$sql_mkNotiTb=
"
CREATE TABLE noti".$id."
(
num int NOT NULL AUTO_INCREMENT,
id int ,
name varchar(255),
grpid varchar(255),
grpname varchar(255),	
date varchar(255),	
time varchar(255),	
PRIMARY KEY (num)
)
";
if ($con->query($sql_mkNotiTb)===true) {
	# code...
	/*echo "hooray table created";	*/
	$i++;
}

if ($i==5) {
	
	header('Location: ../success.php');

}

$con->close();?>