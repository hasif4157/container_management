<?php
require_once('settings.php');

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
     $dollar_cl = $_POST['dollar_cl'];
     
    $sql = "INSERT INTO `ex_agent` (`created`, `created_time`, `modified`, `modified_time`, `agn_no`,`agn_name`,`comp_name`,
	`agn_email`,`agn_phone`,`agn_fax`,`agn_city`,`naira_bl`,`naira_cl`,`dollar_bl`,`dollar_cl`)
        VALUES (now(),now(),now(),now(), '".$agn_no."', '".$agn_name."', '".$comp_name."', '".$agn_email."', '".$agn_phone."','".$agn_fax."','".$agn_city."','".$naira_bl."'"
            . ",'".$naira_cl."','".$dollar_bl."','".$dollar_cl."')";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>