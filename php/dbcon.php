<?php  
$servername= "localhost";
$username= "username";
$password="password";
$dbName="ChatMe";
$con= new mysqli($servername,$username,$password,$dbName);
if ($con->connect_error) 
{
	echo "<h2>Sorry We Have Some Problem In The Server</h2>";
}
?>
