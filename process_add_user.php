<?php
require_once('settings.php');

if(isset($_REQUEST['json'])){
    $database=new database();
    $json=$_REQUEST['json'];
    $array=json_decode($json, true);
    if($array){
        
       $ins_user=[
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
        
        
      $res=$database->insert('crm_owner', $ins_user);
      if($res){
          echo 1;
      }
       
    }
} 

?>
