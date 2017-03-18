<?php
session_start();
?>
<script type="text/javascript">
	$(document).ready(function(){
    $("button").click(function(){
    	
        var u_id = $(this).attr("id");
        var u_nm = $(this).attr("name");
        /*alert(u_nm);*/
        $.post('php/con_req.php',{u_id:u_id,u_nm:u_nm},function(info) {

   	    alert("Friend Request has been sent");
   	    location.reload();
   	    
        });

    });
});
</script>
<?php
require 'dbcon.php';

$i=0;
if (isset($_POST['search_inp']) && !empty($_POST['search_inp'])) 
{
$S_input=$_POST['search_inp'];
$search_query="
select id,name,email from user
where name like '%".$S_input."%'
";
$S_output= $con->query($search_query);



if ($S_output) {
	$S_res_cnt = $S_output->num_rows;
	$suffix= ($S_res_cnt!=1) ? 'es':'';

	if ($S_res_cnt==0) {
	echo "<strong>Sorry We Found No Match</strong>";
	}
else{
	echo "<strong>We found ".$S_res_cnt." match".$suffix." in total.</strong><br><br><table class='tablesearch'>";
	$S_output->data_seek(0);


	function BNAME($uid,$mid)
		    {
		    	require 'dbcon.php';
		    	$bname_u_id=$uid;
				$bname_my_id=$mid;

				$sql1="SELECT fn_to_id,fn_from_id,friends_id FROM tbid".$bname_my_id." ";
				$result1 = $con->query($sql1);

				if($result1 === false) 
		        {
		        trigger_error('Wrong SQL: ' . $sql1 . ' Error: ' . $con->error, E_USER_ERROR);
		        }else{
	        	$result1->data_seek(0);
	        	
	        	$Ret_bname='Connect';
			  	while ($ro = $result1->fetch_assoc())
			    {
			   		
			   	if ($ro['fn_to_id']==$bname_u_id ){ $Ret_bname= "Request Sent"; }
 				else if ($ro['fn_from_id']==$bname_u_id ){ $Ret_bname= "Request Received"; }
			   	else if ($ro['friends_id']==$bname_u_id ){ $Ret_bname= "Friend"; }
			   	else if ($bname_u_id==$bname_my_id ){ $Ret_bname= "It's You"; }
				
			    }
			    return $Ret_bname;

		  		// Free result set
		  		mysqli_free_result($result1);
				}
				require 'discon.php';
			}


	while ($row = $S_output->fetch_assoc())
		    {
		    	

		$bname = BNAME($row['id'],$_SESSION["id_store"]);
		//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		echo "<tr class='tablesearch'><th class='tablesearch'>".$row['name']."</th><th class='tablesearch'>".$row['email'].'</th><th class="tablesearch"><button class="tablesearch" id='.$row['id'].' name='.$row['name'].'>'.$bname.'</button></th><tr><br>';	
		    }
    echo "</table>";
		  // Free result set
		  mysqli_free_result($S_output);}
}




}
else {
	echo "<h4>Find Friends</h4>";
}
require 'discon.php';
?>