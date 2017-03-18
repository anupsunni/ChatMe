<?php  
session_start();
require 'dbcon.php';
$erase=$_POST['a'];
if ($erase) {
	
	$sql_ClearChat="delete from ".$_SESSION["CTN"]."";

if ($con->query($sql_ClearChat)===true) {
	# code...
	echo "Chat cleared";
	
}
else{echo "failed";}
}

$sql_UpdateCountM=
"
update ".$_SESSION["CTN"]."count
set num='0'
";
$UpdateCount=$con->query($sql_UpdateCountM);
require 'discon.php';
?>