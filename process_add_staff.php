<?php
require_once('settings.php');
     $emp_no=$_POST['emp_no'];
     $st_name = $_POST['st_name'];
     $emp_type = $_POST['emp_type'];
     $department = $_POST['department'];
     $doj = $_POST['doj'];
     $work_method = $_POST['work_method'];
     $st_mobile = $_POST['st_mobile'];
     $off_phone = $_POST['off_phone'];
     $st_gender = $_POST['st_gender'];
     $hm_phone = $_POST['hm_phone'];
     $pr_email = $_POST['pr_email'];
     $rp_to = $_POST['rp_to'];
     $st_desgn = $_POST['st_desgn'];
     $visa_status = $_POST['visa_status'];
     $web_page = $_POST['web_page'];
     $st_ecn = $_POST['st_ecn'];
     $off_email = $_POST['off_email'];
     $st_city = $_POST['st_city'];
     $st_state = $_POST['st_state'];
     $postal = $_POST['postal'];
     $st_country = $_POST['st_country'];
     
  
   
    $sql = "INSERT INTO `ex_staff` (`created`, `created_time`, `modified`, `modified_time`, `emp_no`, `st_name`,`reporting_to`,`emp_type`,`department`,
	`designation`,`doj`,`visa_status`,`working_method`,`web_pages`,`mobile`,`ecn`,`off_phone`,`off_email`,`gender`,`city`,
        `hm_phone`,`state`,`country`,`pr_email`,`postal`)
        VALUES (now(),now(),now(),now(), '".$emp_no."', '".$st_name."', '".$rp_to."', '".$emp_type."', '".$department."', '".$st_desgn."', '".$doj."', '".$visa_status."','".$work_method."','".$web_page."','".$st_mobile."'"
            . ",'".$st_ecn."','".$off_phone."','".$off_email."','".$st_gender."','".$st_city."','".$hm_phone."','".$st_state."','".$st_country."','".$pr_email."','".$postal."')";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>