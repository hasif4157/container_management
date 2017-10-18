<?php
require_once('settings.php');
     $up_id=$_POST['up_id'];
     $emp_type = $_POST['emp_type'];
     
     
   
    $sql = "UPDATE `emp_type` SET `emp_type`='".$emp_type."',`modified`=now(),`modified_time`=now() WHERE id=$up_id";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>