<?php
session_start();
?>
<?php  
require 'dbcon.php';


$sql_UpdateLoginStatus=
"
UPDATE tbid".$_SESSION["id_store"]."
SET lgn_stat='0'
WHERE num='1';

";
$ULS = $con->query($sql_UpdateLoginStatus);

session_unset();
session_destroy(); 

header("Location: ../index.php");
require 'discon.php';
?>