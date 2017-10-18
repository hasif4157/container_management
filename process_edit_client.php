<?php
require_once('settings.php');
     $up_id=$_POST['up_id'];
     $cust_no = $_POST['cust_no'];
     $cust_name = $_POST['cust_name'];
     $cust_cat = $_POST['cust_cat'];
     $cust_addr = $_POST['cust_addr'];
     $cust_email = $_POST['cust_email'];
     $cust_phone = $_POST['cust_phone'];
     $cust_city = $_POST['cust_city'];
     $cust_state = $_POST['cust_state'];
     $cust_country = $_POST['cust_country'];
     $cust_zip = $_POST['cust_zip'];
     $cust_web = $_POST['cust_web'];
     
   
    $sql = "UPDATE `ex_clients` SET `cust_name`='".$cust_name."',`cust_category`='".$cust_cat."',`cust_addr`='".$cust_addr."',`cust_email`='".$cust_email."',`cust_phone`='".$cust_phone."',`cust_city`='".$cust_city."',`cust_state`='".$cust_state."',`cust_country`='".$cust_country."',`cust_zip`='".$cust_zip."',`cust_web`='".$cust_web."',`modified`=now(),`modified_time`=now() WHERE id=$up_id";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>