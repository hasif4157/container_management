<?php
require_once('settings.php');
     $up_id=$_POST['up_id'];
     $edit_dept = $_POST['edit_dept'];
     
     
   
    $sql = "UPDATE `ex_department` SET `department`='".$edit_dept."',`modified`=now(),`modified_time`=now() WHERE id=$up_id";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>