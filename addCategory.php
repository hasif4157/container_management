<?php
require_once('settings.php');

     $add_cat = $_POST['add_cat'];
     
     
     $sql = "INSERT INTO `ex_category` (`created`, `created_time`, `modified`, `modified_time`, `category`,`status`)
        VALUES (now(),now(),now(),now(), '".$add_cat."', '1')";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>