<?php
require_once('settings.php');
     $up_id=$_POST['up_id'];
     $emp_no = $_POST['emp_no'];
     $st_name = $_POST['st_name'];
     $rp_to= $_POST['rp_to'];
     $emp_type = $_POST['emp_type'];
     $st_desgn = $_POST['st_desgn'];
     $department = $_POST['department'];
     $visa_status = $_POST['visa_status'];
     $doj = $_POST['doj'];
     $web_page = $_POST['web_page'];
     $work_method = $_POST['work_method'];
     $st_ecn = $_POST['st_ecn'];
     $st_mobile = $_POST['st_mobile'];
     $off_email = $_POST['off_email'];
     $off_phone = $_POST['off_phone'];
     $st_gender = $_POST['st_gender'];
     $st_city = $_POST['st_city'];
     $hm_phone = $_POST['hm_phone'];
     $st_state = $_POST['st_state'];
     $pr_email = $_POST['pr_email'];
     $postal = $_POST['postal'];
     $st_country = $_POST['st_country'];
     
   
    $sql = "UPDATE `ex_staff` SET `st_name`='".$st_name."',`reporting_to`='".$rp_to."',`emp_type`='".$emp_type."',`department`='".$department."',`designation`='".$st_desgn."',`doj`='".$doj."',`visa_status`='".$visa_status."',`working_method`='".$work_method."',`web_pages`='".$web_page."',`mobile`='".$st_mobile."',`ecn`='".$st_ecn."',`off_phone`='".$off_phone."',`off_email`='".$off_email."',`gender`='".$st_gender."',`city`='".$st_city."',`hm_phone`='".$hm_phone."',`state`='".$st_state."',`country`='".$st_country."',`pr_email`='".$pr_email."',`postal`='".$postal."',`modified`=now(),`modified_time`=now() WHERE id=$up_id";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>