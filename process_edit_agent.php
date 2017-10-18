<?php
require_once('settings.php');
     $up_id=$_POST['up_id'];
     $agn_no = $_POST['agn_no'];
     $agn_name = $_POST['agn_name'];
     $comp_name = $_POST['comp_name'];
     $agn_email = $_POST['agn_email'];
     $agn_phone = $_POST['agn_phone'];
     $agn_fax = $_POST['agn_fax'];
     $agn_city = $_POST['agn_city'];
     $naira_bl = $_POST['naira_bl'];
     $naira_cl = $_POST['naira_cl'];
     $dollar_bl = $_POST['dollar_bl'];
     $dollar_cl = $_POST['dollar_cl'];;
     
   
    $sql = "UPDATE `ex_agent` SET `agn_no`='".$agn_no."',`agn_name`='".$agn_name."',`comp_name`='".$comp_name."',`agn_email`='".$agn_email."',`agn_phone`='".$agn_phone."',`agn_fax`='".$agn_fax."',`agn_city`='".$agn_city."',`naira_bl`='".$naira_bl."',`naira_cl`='".$naira_cl."',`dollar_bl`='".$dollar_bl."',`dollar_cl`='".$dollar_cl."',`modified`=now(),`modified_time`=now() WHERE id=$up_id";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>