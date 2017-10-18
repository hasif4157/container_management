<?php
require_once('settings.php');
     $databae=new database();
     $sel_cont = $_POST['sel_cont'];
     
     
     $sql = "select * from ex_container where id=$sel_cont";
	$res=$databae->select_query_array($sql);
        $con_no=$res[0]->container_no;
        $con_sz=trim($res[0]->con_size);
        $con_ld=$res[0]->load_date;
        $con_sd=$res[0]->sail_date;
        $con_cd=$res[0]->close_date;
        $con_op=$res[0]->origin_port;
        $con_dp=$res[0]->desn_port;
        $con_st=$res[0]->con_status;
        
        $arr_cont=[$con_no,$con_sz,$con_ld,$con_sd,$con_cd,$con_op,$con_dp,$con_st];
        echo json_encode($arr_cont);
        
?>
