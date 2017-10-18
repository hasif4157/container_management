<?php
	require_once('settings.php');
   
	if($_POST['del_id'])
	{
	$id=$_POST['del_id'];
	$sql_staff ="delete from ex_staff where id='$id'";
	$qry_staff = $conn->query($sql_staff);
        if($qry_staff){
          echo 1;  
        }
        }
        else {
            echo 0;
        }
?>