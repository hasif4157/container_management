<?php
require_once('settings.php');

if(isset($_REQUEST['json'])){
    $database=new database();
    $json=$_REQUEST['json'];
    $array=json_decode($json, true);
    if($array){
    
    $edit_arr=[
            'modified'=>$date,
            'modified_time'=>$time,
            'container_no'=>$array['container'],
            'arrival_date'=>$array['arrival'],
            'closing_date'=>$array['closing'],
            'destination'=>$array['destination'],
            'who_saved'=>$array['whosaved'],
            'status'=>1
         ];
    
        $condtn="id='".$array['cont_id']."'";
        $res=$database->update('container_list', $edit_arr, $condtn);
        
  
    if($res){
        echo 1;
    }
    }
} 

?>
