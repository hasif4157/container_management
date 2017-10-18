$('#up_order').click(function(){
  var json='';
  json=json+'{';
  var order_no=$('#order_no').val();
  json=json+'"order_no":"'+order_no+'",';
  var order_date=$('#order_date').val();
  json=json+'"order_date":"'+order_date+'",';
  var ord_view=$('#ord_view').val();
  json=json+'"ord_view":"'+ord_view+'",';
  var cont_id=$('#sel_cont').val();
  json=json+'"cont_id":"'+cont_id+'",';
  var cont_no=$('#cont_no').val();
  json=json+'"cont_no":"'+cont_no+'",';
  var cont_sz=$('#cont_sz').val();
  json=json+'"cont_sz":"'+cont_sz+'",';
  var cont_ld=$('#cont_ld').val();
  json=json+'"cont_ld":"'+cont_ld+'",';
  var cont_sd=$('#cont_sd').val();
  json=json+'"cont_sd":"'+cont_sd+'",';
  var cont_cd=$('#cont_cd').val();
  json=json+'"cont_cd":"'+cont_cd+'",';
  var cont_op=$('#cont_op').val();
  json=json+'"cont_op":"'+cont_op+'",';
  var cont_dp=$('#cont_dp').val();
  json=json+'"cont_dp":"'+cont_dp+'",';
  var cont_cs=$('#cont_cs').val();
  json=json+'"cont_cs":"'+cont_cs+'",';
  var arv_date=$('#arv_date').val();
  json=json+'"arv_date":"'+arv_date+'",';
  var agnord_no=$('#agnord_no').val();
  json=json+'"agnord_no":"'+agnord_no+'",';
  var agnord_name=$('#agnord_name').val();
  json=json+'"agnord_name":"'+agnord_name+'",';
  var agnord_email=$('#agnord_email').val();
  json=json+'"agnord_email":"'+agnord_email+'",';
  var agnord_mob=$('#agnord_mob').val();
  json=json+'"agnord_mob":"'+agnord_mob+'",';
  var fr_loc=$('#fr_loc').val();
  json=json+'"fr_loc":"'+fr_loc+'",';
  var to_loc=$('#to_loc').val();
  json=json+'"to_loc":"'+to_loc+'",';
  var cus_no=$('#cus_no').val();
  json=json+'"cus_no":"'+cus_no+'",';
  var cus_name=$('#cus_name').val();
  json=json+'"cus_name":"'+cus_name+'",';
  var cus_email=$('#cus_email').val();
  json=json+'"cus_email":"'+cus_email+'",';
  var cus_mobile=$('#cus_mobile').val();
  json=json+'"cus_mobile":"'+cus_mobile+'",';
  var bank_name=$('#bank_name').val();
  json=json+'"bank_name":"'+bank_name+'",';
  var sort_code=$('#sort_code').val();
  json=json+'"sort_code":"'+sort_code+'",';
  var naira_ac=$('#naira_ac').val();
  json=json+'"naira_ac":"'+naira_ac+'",';
  var dollar_ac=$('#dollar_ac').val();
  json=json+'"dollar_ac":"'+dollar_ac+'",';
  var item_desc=$('#item_desc').val();
  json=json+'"item_desc":"'+item_desc+'",';
  var or_qty=$('#or_qty').val();
  json=json+'"or_qty":"'+or_qty+'",';
  var ag_fright=$('#ag_fright').val();
  json=json+'"ag_fright":"'+ag_fright+'",';
  var cm_fright=$('#cm_fright').val();
  json=json+'"cm_fright":"'+cm_fright+'",';
  var comn_fr=$('#comn_fr').val();
  json=json+'"comn_fr":"'+comn_fr+'",';
  var ag_clearence=$('#ag_clearence').val();
  json=json+'"ag_clearence":"'+ag_clearence+'",';
  var cm_clearence=$('#cm_clearence').val();
  json=json+'"cm_clearence":"'+cm_clearence+'",';
  var comn_cl=$('#comn_cl').val();
  json=json+'"comn_cl":"'+comn_cl+'",';
  var tot_sum=$('#tot_sum').val();
  json=json+'"tot_sum":"'+tot_sum+'",';
  var ord_line=$('#ord_line').val();
  json=json+'"ord_line":"'+ord_line+'",';
  var remark=$('#remark').val();
  json=json+'"remark":"'+remark+'",';
  var chg_status=$('#chg_status').val();
  json=json+'"chg_status":"'+chg_status+'",';
  var stchange_date=$('#stchange_date').val();
  json=json+'"stchange_date":"'+stchange_date+'",';
  var orgn_datetime=$('#orgn_datetime').val();
  json=json+'"orgn_datetime":"'+orgn_datetime+'",';
  var dxb_payinfo=$('#dxb_payinfo').val();
  json=json+'"dxb_payinfo":"'+dxb_payinfo+'",';
  var paid_amt=$('#paid_amt').val();
  json=json+'"paid_amt":"'+paid_amt+'",';
  var paid_amt=$('#paid_amt').val();
  json=json+'"paid_amt":"'+paid_amt+'",';
  var invoice_no=$('#invoice_no').val();
  json=json+'"invoice_no":"'+invoice_no+'",';
  var idorder=$('#idorder').val();
  json=json+'"idorder":"'+idorder+'"';
  json=json+'}';
   $.ajax({
       url: "process_edit_order.php",
       async: true,
       type: 'POST',
       data: "json=" + encodeURIComponent(json),
       success: function (data) {
          if(data == 1){
                    Lobibox.notify('success', {
                        delay: false,
                        sound: true,
                         closeOnEsc:  window.setTimeout(function(){
window.location.href = "manage_order.php";

    }, 2000),
                       
                        title: 'Success',
                        msg: 'Success Message : Order Updated Successfully' 
                    });
                }
       }
        });
});



$('#ins_order').click(function(){
var json='';
json=json+'{';
var order_no=$('#order_no').val();
json=json+'"order_no":"'+order_no+'",';
var order_date=$('#order_date').val();
json=json+'"order_date":"'+order_date+'",';
var sel_agn=$('#sel_agn').val();
json=json+'"agent_id":"'+sel_agn+'",';
var sel_cont=$('#sel_cont').val();
json=json+'"container_id":"'+sel_cont+'",';
var fr_id=$('#from_locationid').val();
json=json+'"fr_loc":"'+fr_id+'",';
var to_id=$('#to_locationid').val();
json=json+'"to_loc":"'+to_id+'",';
var sel_cus=$('#sel_cus').val();
json=json+'"cus_id":"'+sel_cus+'",';
var sel_bank=$('#sel_bank').val();
json=json+'"bank_id":"'+sel_bank+'",';
var item_desc=$('#item_desc').val();
json=json+'"item_desc":"'+item_desc+'",';
var ord_line=$('#ord_line').val();
json=json+'"line":"'+ord_line+'",';
var or_qty=$('#or_qty').val();
json=json+'"or_qty":"'+or_qty+'",';
var ag_fright=$('#ag_fright').val();
json=json+'"agn_freight":"'+ag_fright+'",';
var cm_fright=$('#cm_fright').val();
json=json+'"comp_freight":"'+cm_fright+'",';
var comn_fr=$('#comn_fr').val();
json=json+'"comn_freight":"'+comn_fr+'",';
var ag_clearence=$('#ag_clearence').val();
json=json+'"agn_clearence":"'+ag_clearence+'",';
var cm_clearence=$('#cm_clearence').val();
json=json+'"comp_clearence":"'+cm_clearence+'",';
var comn_cl=$('#comn_cl').val();
json=json+'"comn_clearence":"'+comn_cl+'",';
var tot_sum=$('#tot_sum').val();
json=json+'"paid_amt":"'+tot_sum+'"';
json=json+'}';
$.ajax({
       url: "process_add_order.php",
       async: true,
       type: 'POST',
       data: "json=" + encodeURIComponent(json),
       success: function (data) {
        alert(data);
       }
        });

});
