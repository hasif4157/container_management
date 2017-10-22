<?php
require_once('settings.php');

if(isset($_REQUEST['json'])){
    $database=new database();
    $json=$_REQUEST['json'];
    $array=json_decode($json, true);
    if($array){
       
       $ins_bank=[
            'created'=>$date,
            'created_time'=>$time,
            'modified'=>$date,
            'modified_time'=>$time,
            'bank_name'=>$array['bank_name'],
            'bank_addr'=>$array['bank_addr'],
            'branch_name'=>$array['branch_name'],
            'sort_code'=>$array['sort_code'],
            'dollar_acc'=>$array['dollar_acc'],
            'naira_acc'=>$array['naira_acc'],
            'status'=>1
            ];
        
        
      $res=$database->insert('ex_bank', $ins_bank);
      if($res){
          echo 1;
      }
       
    }
} 

?>
