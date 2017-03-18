<?php
session_start();
?>

<?php require 'dbcon.php';

$u_id=$_POST['u_id'];
$u_nm=$_POST['u_nm'];
$my_id=$_SESSION["id_store"];
$my_nm=$_SESSION["name_store"];
if ($u_id!=$my_id)
{ 
$test=$u_nm.' '.$u_id;
$sql_userTB="

insert into tbid".$u_id." (fn_from, fn_from_id)
values ('".$my_nm."','".$my_id."')
";
$sql_myTB ="

insert into tbid".$my_id." (fn_to, fn_to_id)
values ('".$u_nm."','".$u_id."')
";

if ($con->query($sql_userTB) === TRUE && $con->query($sql_myTB)=== TRUE) {
    /*echo "Request Sent"*/;
} else {
    echo "Error: " . $sql_userTB . "<br>" . $con->error;
   /* echo "Some Problem In The Server";*/
}
}else{
echo "stop";
}


require 'discon.php'; ?>