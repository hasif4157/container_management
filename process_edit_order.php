<?php
require_once('settings.php');

if (isset($_REQUEST['json'])) {
           $database=new database();
           $json = $_REQUEST['json'];
           $array = json_decode($json, true);
           if($array){
              
               
               $up_order=[
                    'order_no' => $array['order_no'],
                    'order_date' => $array['order_date'],
                    'agent_id' => $array['agent_id'],
                    'container_id' => $array['container_id'],
                    'arrival_date' => $array['arrival_date'],
                    'fr_loc' => $array['fr_loc'],
                    'to_loc' => $array['to_loc'],
                    'cus_id' => $array['cus_id'],
                    'bank_id' => $array['bank_id'],
                    'item_desc' => $array['item_desc'],
                    'or_qty' => $array['or_qty'],
                    'agn_freight' => $array['ag_fright'],
                    'comp_freight' => $array['cm_fright'],
                    'comn_freight' => $array['comn_fr'],
                    'agn_clearence' => $array['ag_clearence'],
                    'comp_clearence' => $array['cm_clearence'],
                    'comn_clearence' => $array['comn_cl'],
                    'order_status' => $array['chg_status'],
                    'stchange_date' => $array['stchange_date'],
                    'remark' => $array['remark'],
                    'orgn_datetime' => $array['orgn_datetime'],
                    'dxb_payinfo' => $array['dxb_payinfo'],
                    'paid_amt' => $array['paid_amt'],
                    'invoice_no' => $array['invoice_no'],
                    'line' => $array['ord_line'],
                    'tot_sum' => $array['tot_sum'],
                    'ord_view' => $array['ord_view']
               ];
             
    
               $cond="id='".$array['idorder']."'";
               $result=$database->update('ex_order', $up_order, $cond);
               if($result){
                   echo 1;
               }
               
            }
           
}
?>