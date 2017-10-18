<?php
require_once('settings.php');

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
     
   
    $sql = "INSERT INTO `ex_clients` (`created`, `created_time`, `modified`, `modified_time`, `cust_no`,`cust_name`,`cust_category`,
	`cust_addr`,`cust_email`,`cust_phone`,`cust_city`,`cust_state`,`cust_country`,`cust_zip`,`cust_web`)
        VALUES (now(),now(),now(),now(), '".$cust_no."', '".$cust_name."', '".$cust_cat."', '".$cust_addr."', '".$cust_email."','".$cust_phone."','".$cust_city."','".$cust_state."'"
            . ",'".$cust_country."','".$cust_zip."','".$cust_web."')";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>