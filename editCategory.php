<?php
require_once('settings.php');
     $up_id=$_POST['up_id'];
     $edit_cat = $_POST['edit_cat'];
     
     
   
    $sql = "UPDATE `ex_category` SET `category`='".$edit_cat."',`modified`=now(),`modified_time`=now() WHERE id=$up_id";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>