<?php
require_once('settings.php');

//$user_emp=$_POST['user_emp'];
$username=$_POST['user_name'];
$domain_name=$_POST['domain_name'];
$useremail=$_POST['user_email'];
$userpassword=$_POST['password'];
$employee=$_POST['employee'];
$description=$_POST['user_desc'];

 $privileges = $_POST['manage_staff'].','
	.$_POST['manage_staff_vw'].','
	.$_POST['manage_staff_ed'].','
	.$_POST['manage_staff_dl'].','
	.$_POST['manage_user'].','
	.$_POST['manage_user_vw'].','
	.$_POST['manage_user_ed'].','
	.$_POST['manage_user_dl'].','
	.$_POST['manage_agent'].','
	.$_POST['manage_agent_vw'].','
	.$_POST['manage_agent_ed'].','
	.$_POST['manage_agent_dl'].','
	.$_POST['manage_client'].','
	.$_POST['manage_client_vw'].','
	.$_POST['manage_client_ed'].','
	.$_POST['manage_client_dl'].','
	.$_POST['manage_bank'].','
	.$_POST['manage_bank_vw'].','
	.$_POST['manage_bank_ed'].','
	.$_POST['manage_bank_dl'].','
	.$_POST['manage_location'].','
	.$_POST['manage_location_vw'].','
        .$_POST['manage_location_ed'].','
	.$_POST['manage_location_dl'].','
	.$_POST['manage_container'].','
	.$_POST['manage_container_vw'].','
	.$_POST['manage_container_ed'].','
	.$_POST['manage_container_dl'].','
	.$_POST['manage_orbooking'].','
	.$_POST['manage_orbooking_vw'].','
        .$_POST['manage_orbooking_ed'].','
        .$_POST['manage_orbooking_dl'].','
	.$_POST['manage_salesinc'].','
	.$_POST['manage_salesinc_vw'].','
	.$_POST['manage_salesinc_ed'].','
	.$_POST['manage_salesinc_dl'].','
	.$_POST['manage_rcpvouch'].','
	.$_POST['manage_rcpvouch_vw'].','
	.$_POST['manage_rcpvouch_ed'].','
        .$_POST['manage_rcpvouch_dl'].','
        .$_POST['manage_payvouch'].','
	.$_POST['manage_payvouch_vw'].','
	.$_POST['manage_payvouch_ed'].','
	.$_POST['manage_payvouch_dl'];
 
 
 $sql = "INSERT INTO `crm_owner` (`created`, `created_time`, `modified`, `modified_time`,  `user_name`, `domain_name`,`user_email`,`password`,
	`employee`,`privileges`,`status`,`user_desc`) VALUES (now(),now(),now(),now(),'".$username."', '".$domain_name."', '".$useremail."', '".$userpassword."','".$employee."', '".$privileges."' ,1, '".$description."')";
 $res = $conn->query($sql);
 $user_id = $conn->insert_id;
 
/* if($user_id){
     
 $sql_emp = "UPDATE `ex_staff` SET `user_id`='".$user_id."' WHERE id=$user_emp";
	$res_emp = $conn->query($sql_emp);
        
       echo 1;
       
 }*/
 
?>
