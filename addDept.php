<?php
require_once('settings.php');

     $add_dept = $_POST['add_dept'];
     
     
     $sql = "INSERT INTO `ex_department` (`created`, `created_time`, `modified`, `modified_time`, `department`,`status`)
        VALUES (now(),now(),now(),now(), '".$add_dept."', '1')";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>

