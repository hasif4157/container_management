<?php
require_once('settings.php');

if(isset($_REQUEST['json'])){
    $database=new database();
    $json=$_REQUEST['json'];
    $array=json_decode($json, true);
    if($array){
        
       $ins_container=[
            'created'=>$date,
            'created_time'=>$time,
            'modified'=>$date,
            'modified_time'=>$time,
            'container_id'=>$array['container_id'],
            'desn_off'=>$array['desn_off'],
            'sail_date'=>$array['sail_date'],
            'origin_port'=>$array['origin_port'],
            'desn_port'=>$array['desn_port'],
            'exp_date'=>$array['exp_date'],
            'org_date'=>$array['org_date'],
            'exp_off'=>$array['exp_off'],
            'desn_date'=>$array['desn_date'],
            'con_status'=>$array['con_status'],
            'con_size'=>$array['con_size'],
            'clr_agninfo'=>$array['clr_agninfo'],
            'status'=>1
            ];
        
        
      $res=$database->insert('ex_container', $ins_container);
      if($res){
          echo 1;
      }
       
    }
} 

?>
