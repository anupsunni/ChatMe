<?php session_start();
require 'dbcon.php';

$sql_insert_noti=
	"
		UPDATE noti".$_SESSION["id_store"]."
		SET date='".date("Ymd")."' , time='".time()."'
		WHERE grpid='".$_SESSION['GCTN']."'
	";

	if ($con->query($sql_insert_noti)) {
		echo true;
	}else{
		echo false;
	}
require 'discon.php';
?>