<?php
	require_once('settings.php');
   
	if($_POST['del_id'])
	{
	$id=$_POST['del_id'];
	$sql_user ="delete from crm_owner where id='$id'";
	$qry_user = $conn->query($sql_user);
        if($qry_user){
          echo 1;  
        }
        }
        else {
            echo 0;
        }
?>