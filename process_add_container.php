<?php
require_once('settings.php');
     $cont_no=$_POST['container_no'];
     $load_date = $_POST['load_date'];
     $desn_off = $_POST['desn_off'];
     $sail_date = $_POST['sail_date'];
     $origin_port = $_POST['origin_port'];
     $close_date = $_POST['close_date'];
     $desn_port = $_POST['desn_port'];
     $exp_date = $_POST['exp_date'];
     $org_date = $_POST['org_date'];
     $exp_off = $_POST['exp_off'];
     $desn_date = $_POST['desn_date'];
     $con_status = $_POST['con_status'];
     $con_size = $_POST['con_size'];
     $clr_agninfo = $_POST['clr_agninfo'];
     
     
  
   
    $sql = "INSERT INTO `ex_container` (`created`, `created_time`, `modified`, `modified_time`, `container_no`, `load_date`,`desn_off`,`sail_date`,`origin_port`,
	`close_date`,`desn_port`,`exp_date`,`org_date`,`exp_off`,`desn_date`,`con_status`,`con_size`,`clr_agninfo`)
        VALUES (now(),now(),now(),now(), '".$cont_no."', '".$load_date."', '".$desn_off."', '".$sail_date."', '".$origin_port."', '".$close_date."', '".$desn_port."', '".$exp_date."','".$org_date."','".$exp_off."','".$desn_date."'"
            . ",'".$con_status."','".$con_size."','".$clr_agninfo."')";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>