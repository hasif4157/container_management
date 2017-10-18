<?php
	require_once('settings.php');
   
	if($_POST['del_id'])
	{
	$id=$_POST['del_id'];
	$sql_emp ="delete from ex_department where id='$id'";
	$qry_emp = $conn->query($sql_emp);
        if($qry_emp){
          echo 1;  
        }
        }
        else {
            echo 0;
        }
?>