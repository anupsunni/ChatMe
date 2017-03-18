<?php session_start();
require 'dbcon.php';
$sql_insertP=
	"
		UPDATE ".$_SESSION["CTN"]."ls
		SET date='".date("d/m/Y")."' , time='".date("h:i:sa")."' , date2='".date("Ymd")."', time2='".time()."'
		WHERE id='".$_SESSION["id_store"]."'
	";

$sql_insert_noti=
	"
		UPDATE noti".$_SESSION["id_store"]."
		SET date='".date("Ymd")."' , time='".time()."'
		WHERE id='".$_SESSION["friend_id_store"]."'
	";

	if ($con->query($sql_insertP)==true&&$con->query($sql_insert_noti)) {
		echo true;
	}else{
		echo false;
	}
require 'discon.php';
?>