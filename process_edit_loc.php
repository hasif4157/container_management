<?php
require_once('settings.php');
     $up_id=$_POST['up_id'];
     $loc_type = $_POST['loc_type'];
     $loc_name = $_POST['loc_name'];
     $loc_addr = $_POST['loc_addr'];
     $loc_email = $_POST['loc_email'];
     $loc_phone = $_POST['loc_phone'];
     $loc_fax = $_POST['loc_fax'];
     $loc_city = $_POST['loc_city'];
     $loc_state = $_POST['loc_state'];
     $loc_country = $_POST['loc_country'];
     $loc_zip = $_POST['loc_zip'];
     $loc_cp = $_POST['loc_cp'];
     $loc_cpp = $_POST['loc_cpp'];
     $color_code="#".$_POST['ord_color'];
   
    $sql = "UPDATE `ex_location` SET `loc_type`='".$loc_type."',`loc_name`='".$loc_name."',`loc_addr`='".$loc_addr."',`color_code`='".$color_code."',`loc_email`='".$loc_email."',`loc_phone`='".$loc_phone."',`loc_fax`='".$loc_fax."',`loc_city`='".$loc_city."',`loc_state`='".$loc_state."',`loc_country`='".$loc_country."',`loc_zip`='".$loc_zip."',`loc_cp`='".$loc_cp."',`loc_cpp`='".$loc_cpp."',`modified`=now(),`modified_time`=now() WHERE id=$up_id";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>
