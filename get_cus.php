<?php
require_once('settings.php');
     $database=new database();
     $sel_cus = $_POST['sel_cus'];
     
     
     $sql_cus = "select * from ex_clients where id=$sel_cus";
        $res_cus =$database->select_query_array($sql_cus);
	
        $cust_no=$res_cus[0]->cust_no;
        $cust_name=$res_cus[0]->cust_name;
        $cust_email=$res_cus[0]->cust_email;
        $cust_phone=$res_cus[0]->cust_phone;
        
        $arr_cus=[$cust_no,$cust_name,$cust_email,$cust_phone];
        echo json_encode($arr_cus);
        
?>
