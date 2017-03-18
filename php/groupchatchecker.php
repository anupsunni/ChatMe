<?php
require 'dbcon.php';

session_start();

$x=$_POST['mx'];
require 'dbcon.php'; 
$Get_Messages=
"select * from (select * from ".$_SESSION["GCTN"]." where sender is not null
 order by num desc
 limit ".$x.") as ok order by num
";

$messages= array();
$datetime= array();
$GetM=$con->query($Get_Messages);
if($GetM === false) {trigger_error('Wrong SQL: ' . $sql_OpenChat . ' Error: ' . $con->error, E_USER_ERROR);}
else
	{$GetM->data_seek(0);$i=0;$j=0;
		while ($row = $GetM->fetch_assoc())
			{
		$messages[$i]=$row['sender_id'];
		$i+=1;
		$messages[$i]=$row['sender'];	
		$i+=1;
		$messages[$i]=$row['message'];	
		$i+=1;
		$time=strtotime($row['time']);
		if ($row['date']==date("d/m/Y")) {
			$datetime[$j++]=date("h:ia",$time);
		}
		else{
		$datetime[$j++]=$row['date']." | ".date("h:ia",$time);}
		}mysqli_free_result($GetM);}
		
		
	    
$j=0;
$message_display= $messages;
for ($m=0; $m <sizeof($message_display) ; $m++) 
	    	{
	    		if ($message_display[$m]==$_SESSION["id_store"]) 
{
	echo "<div class='mdv'><span class='s'>".$message_display[$m+2]."</span><br style='font-size:30px;'><span class='st'>".$datetime[$j]."</span><br></div>";
}else{
	echo "<div class='mdv'><span class='r'>".$message_display[$m+1]." | ".$message_display[$m+2]."</span><br style='font-size:30px;'><span class='rt'>".$datetime[$j]."</span><br></div>";}
	    		$m+=2;$j++;
	    	}
	    	require 'discon.php';
	    	?>