<?php
require_once('settings.php');

     $emp_type = $_POST['emp_type'];
     
     
     $sql = "INSERT INTO `emp_type` (`created`, `created_time`, `modified`, `modified_time`, `emp_type`,`status`)
        VALUES (now(),now(),now(),now(), '".$emp_type."', '1')";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>