<?php
require_once('settings.php');
if($_POST['status'] == "agent_info"){
     $databae=new database();
     $sel_agent= $_POST['sel_agent'];
     
     
     $sql = "select * from ex_agent where id=$sel_agent";
	$res=$databae->select_query_array($sql);
        $agn_no=$res[0]->agn_no;
        $agn_name=$res[0]->agn_name;
        $agn_email=$res[0]->agn_email;
        $agn_phone=$res[0]->agn_phone;
        $arr_agn=[$agn_no,$agn_name,$agn_email,$agn_phone];
        echo json_encode($arr_agn);
}     
?>
