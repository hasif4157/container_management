<?php
require_once('settings.php');

if(isset($_REQUEST['json'])){
    $database=new database();
    $json=$_REQUEST['json'];
    $array=json_decode($json, true);
    if($array){
        
       $up_user=[
            'created'=>$date,
            'created_time'=>$time,
            'modified'=>$date,
            'modified_time'=>$time,
            'user_name'=>$array['user_name'],
            'domain_name'=>$array['domain_name'],
            'user_email'=>$array['user_email'],
            'password'=>$array['password'],
            'employee'=>$array['emp_type'],
            'user_desc'=>$array['user_desc'],
            'privileges'=>$array['privilege'],
            'status'=>1
            ];
        
      $condtn="id='".$array['up_id']."'";
      $res=$database->update('crm_owner', $up_user, $condtn);
      if($res){
          echo 1;
      }
       
    }
} 

?>
