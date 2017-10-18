<?php
	require_once('settings.php');
   
	if($_POST['del_id'])
	{
	$id=$_POST['del_id'];
	$sql_agent ="delete from ex_agent where id='$id'";
	$qry_agent = $conn->query($sql_agent);
        if($qry_agent){
          echo 1;  
        }
        }
        else {
            echo 0;
        }
?>