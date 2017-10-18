<?php
require_once('settings.php');
     $up_id=$_POST['up_id'];
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
     
   
    $sql = "UPDATE `ex_container` SET `container_no`='".$cont_no."',`load_date`='".$load_date."',`desn_off`='".$desn_off."',`sail_date`='".$sail_date."',`origin_port`='".$origin_port."',`close_date`='".$close_date."',`desn_port`='".$desn_port."',`exp_date`='".$exp_date."',`org_date`='".$org_date."',`exp_off`='".$exp_off."',`desn_date`='".$desn_date."',`con_status`='".$con_status."',`con_size`='".$con_size."',`clr_agninfo`='".$clr_agninfo."',`modified`=now(),`modified_time`=now() WHERE id=$up_id";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>
