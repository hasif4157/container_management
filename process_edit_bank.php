<?php
require_once('settings.php');
     $up_id=$_POST['up_id'];
     $bank_name = $_POST['bank_name'];
     $bank_addr = $_POST['bank_addr'];
     $branch_name = $_POST['branch_name'];
     $sort_code = $_POST['sort_code'];
     $dollar_acc = $_POST['dollar_acc'];
     $naira_acc = $_POST['naira_acc'];
     
   
    $sql = "UPDATE `ex_bank` SET `bank_name`='".$bank_name."',`bank_addr`='".$bank_addr."',`branch_name`='".$branch_name."',`sort_code`='".$sort_code."',`dollar_acc`='".$dollar_acc."',`naira_acc`='".$naira_acc."',`modified`=now(),`modified_time`=now() WHERE id=$up_id";
	$res = $conn->query($sql);
        
        if($res){
            echo 1;
        }

?>