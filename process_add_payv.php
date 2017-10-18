<?php
require_once('settings.php');

     $payv_no = $_POST['payv_no'];
     $agn_id = $_POST['agn_id'];
     $payment_date = $_POST['payment_date'];
     $pay_desc = $_POST['pay_desc'];
     $grand_tot = $_POST['grand_tot'];
     
     $order_no = $_POST['order_no'];
     $arr_count=count($order_no);
     $customer = $_POST['customer'];
     $cont_no = $_POST['cont_no'];
     $fr_comn = $_POST['fr_comn'];
     $payfr_comn = $_POST['payfr_comn'];
     $payfr_disc = $_POST['payfr_disc'];
     $payfr_sum = $_POST['payfr_sum'];
     $clr_comn = $_POST['clr_comn'];
     $payclr_comn = $_POST['payclr_comn'];
     $payclr_disc = $_POST['payclr_disc'];
     $payclr_sum = $_POST['payclr_sum'];
     
     
   
    $sql_pay = "INSERT INTO `pay_voucher` (`created`, `created_time`, `modified`, `modified_time`, `payv_no`,`agn_id`,`payment_date`,
	`pay_desc`,`grand_tot`)
        VALUES (now(),now(),now(),now(), '".$payv_no."', '".$agn_id."', '".$payment_date."', '".$pay_desc."', '".$grand_tot."')";
	$res_pay = $conn->query($sql_pay);
        $pv_id = mysqli_insert_id($conn);
        
        if($res_pay){
            for($i=0;$i<$arr_count;$i++){
              $sql_payv = "INSERT INTO `payvouch_data` (`created`, `created_time`, `modified`, `modified_time`, `pv_id`,`order_no`,`customer`,
	`cont_no`,`fr_comn`,`payfr_comn`,`payfr_disc`,`payfr_sum`,`clr_comn`,`payclr_comn`,`payclr_disc`,`payclr_sum`)
        VALUES (now(),now(),now(),now(), '".$pv_id."', '".$order_no[$i]."', '".$customer[$i]."', '".$cont_no[$i]."', '".$fr_comn[$i]."', '".$payfr_comn[$i]."', '".$payfr_disc[$i]."', '".$payfr_sum[$i]."', '".$clr_comn[$i]."', '".$payclr_comn[$i]."', '".$payclr_disc[$i]."', '".$payclr_sum[$i]."')";
	$res_payv = $conn->query($sql_payv);  
                
            }
            echo 1;
        }

?>