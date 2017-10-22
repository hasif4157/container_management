<?php
require_once('settings.php');

if(isset($_REQUEST['json'])){
    $database=new database();
    $json=$_REQUEST['json'];
    $array=json_decode($json, true);
    if($array){
        
       $ins_order=[
            'created'=>$date,
            'created_time'=>$time,
            'modified'=>$date,
            'modified_time'=>$time,
            'user_id'=>$array['user_id'],
            'order_no'=>$array['order_no'],
            'order_date'=>$array['order_date'],
            'agent_id'=>$array['agent_id'],
            'container_id'=>$array['container_id'],
            'fr_loc'=>$array['fr_loc'],
            'to_loc'=>$array['to_loc'],
            'cus_id'=>$array['cus_id'],
            'bank_id'=>$array['bank_id'],
            'item_desc'=>$array['item_desc'],
            'line'=>$array['line'],
            'or_qty'=>$array['or_qty'],
            'agn_freight'=>$array['agn_freight'],
            'comp_freight'=>$array['comp_freight'],
            'comn_freight'=>$array['comn_freight'],
            'agn_clearence'=>$array['agn_clearence'],
            'comp_clearence'=>$array['comp_clearence'],
            'comn_clearence'=>$array['comn_clearence'],
            'paid_amt'=>$array['paid_amt']
            ];
        
        
      $res=$database->insert('ex_order', $ins_order);
      if($res){
          echo 1;
      }
       
    }
} 

?>
