<?php
require_once('settings.php');
     $databae=new database();
     $sel_agn = $_POST['sel_agn'];
     
     $sql_agn = "select * from ex_agent where id=$sel_agn";
	$res_agn=$databae->select_query_array($sql_agn);
        
        $agn_no=$res_agn[0]->agn_no;
        $agn_name=$res_agn[0]->agn_name;
        $agn_email=$res_agn[0]->agn_email;
        $agn_phone=$res_agn[0]->agn_phone;
        $arr=[$agn_no,$agn_name,$agn_email,$agn_phone];
        echo json_encode($arr);
       
?>
