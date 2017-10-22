<?php
require_once('settings.php');


if(isset($_REQUEST['json'])){
    $database=new database();
    $json=$_REQUEST['json'];
    $array=json_decode($json,true);
    if($array){
         
        $loc_arr=[
            'created' => $date,
            'created_time' => $time,
            'modified' => $date,
            'modified_time' => $time,
            'loc_name' => strtoupper($array['loc_name']),
            'loc_addr' => $array['loc_addr'],
            'loc_email' => $array['loc_email'],
            'loc_phone' => $array['loc_phone'],
            'loc_fax' => $array['loc_fax'],
            'loc_zip' => $array['loc_zip'],
            'loc_cp' => $array['loc_cp'],
            'loc_cpp' => $array['loc_cpp'],
            'color_code' => $array['ord_color'],
            'loc_type' => $array['loc_type'],
            'status' => 1
         ];
       
        if($array['loc_type'] == 1){
            
            $res_to=$database->insert('to_location', $loc_arr);
            if($res_to){
            echo 1;
        }
        }
        if($array['loc_type'] == 2){
            
            $res_fr=$database->insert('from_location', $loc_arr);
            if($res_fr){
            echo 1;
        }
        }
        
        
    }
}

?>