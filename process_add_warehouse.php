<?php
require_once('settings.php');

if(isset($_REQUEST['json'])){
    $database=new database();
    $json=$_REQUEST['json'];
    $array=json_decode($json, true);
    if($array){
    $con=explode(',',$array['container']);
    $arriv=explode(',',$array['arrival']);
    $cls=explode(',',$array['closing']);
    $dest=explode(',',$array['destination']);
    $whosave=explode(',',$array['whosaved']);
   
    for($i=0;$i<count($con);$i++){
        $con_arr=[
            'created'=>$date,
            'created_time'=>$time,
            'modified'=>$date,
            'modified_time'=>$time,
            'container_no'=>$con[$i],
            'arrival_date'=>$arriv[$i],
            'closing_date'=>$cls[$i],
            'destination'=>$dest[$i],
            'who_saved'=>$whosave[$i],
            'status'=>1
         ];
        $res=$database->insert(container_list, $con_arr);
        
    }
    if($res){
        echo 1;
    }
    }
} 

?>
