<?php
require_once('settings.php');
     $date=date('Y-m-d');
     $time=date('H:i:s');
     $ex_rate = $_POST['ex_rate'];
     
     
     $sql = "INSERT INTO `exchange_rate` (`created`, `created_time`, `modified`, `modified_time`, `amount`,`status`)
        VALUES ('".$date."','".$time."','".$date."','".$time."', '".$ex_rate."', '1')";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>