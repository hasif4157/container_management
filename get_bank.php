<?php
require_once('settings.php');
     $database=new database();
     $sel_bank = $_POST['sel_bank'];
     
     
     $sql = "select * from ex_bank where id=$sel_bank";
     $res =$database->select_query_array($sql);
	
        $bank_name=$res[0]->bank_name;
        $sort_code=$res[0]->sort_code;
        $dollar_acc=$res[0]->dollar_acc;
        $naira_acc=$res[0]->naira_acc;
       
        $arr_bank=[$bank_name,$sort_code,$naira_acc,$dollar_acc];
        echo json_encode($arr_bank);
?>
