<?php
	require_once('settings.php');
   
	if($_POST['del_id'])
	{
	$id=$_POST['del_id'];
	$sql_loc ="delete from ex_location where id='$id'";
	$qry_loc= $conn->query($sql_loc);
        if($qry_loc){
          echo 1;  
        }
        }
        else {
            echo 0;
        }
?>