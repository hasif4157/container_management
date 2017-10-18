<?php
	require_once('settings.php');
   
	if($_POST['del_id'])
	{
	$id=$_POST['del_id'];
	$sql_client ="delete from ex_clients where id='$id'";
	$qry_client = $conn->query($sql_client);
        if($qry_client){
          echo 1;  
        }
        }
        else {
            echo 0;
        }
?>