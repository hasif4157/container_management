<?php
require_once('settings.php');

     $bank_name = $_POST['bank_name'];
     $bank_addr = $_POST['bank_addr'];
     $branch_name = $_POST['branch_name'];
     $sort_code = $_POST['sort_code'];
     $dollar_acc = $_POST['dollar_acc'];
     $naira_acc = $_POST['naira_acc'];
     
     
    $sql = "INSERT INTO `ex_bank` (`created`, `created_time`, `modified`, `modified_time`, `bank_name`,`bank_addr`,`branch_name`,
	`sort_code`,`dollar_acc`,`naira_acc`)
        VALUES (now(),now(),now(),now(), '".$bank_name."', '".$bank_addr."', '".$branch_name."', '".$sort_code."', '".$dollar_acc."','".$naira_acc."')";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>