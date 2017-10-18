$('#up_order').on('click',function () {
    var json = '';
    json = json + '{';
    var order_no = $('#order_no').val();
    json = json + '"order_no":"' + order_no + '",';
    var order_date = $('#order_date').val();
    json = json + '"order_date":"' + order_date + '",';
    var ord_view = $('#ord_view').val();
    json = json + '"ord_view":"' + ord_view + '",';
    var cont_id = $('#sel_cont').val();
    json = json + '"container_id":"' + cont_id + '",';
    var arv_date = $('#arv_date').val();
    json = json + '"arrival_date":"' + arv_date + '",';
    var sel_agent = $('#sel_agent').val();
    json = json + '"agent_id":"' + sel_agent + '",';
    var fr_loc = $('#fr_loc').val();
    json = json + '"fr_loc":"' + fr_loc + '",';
    var to_loc = $('#to_loc').val();
    json = json + '"to_loc":"' + to_loc + '",';
    var sel_cus = $('#sel_cus').val();
    json = json + '"cus_id":"' + sel_cus + '",';
    var sel_bank = $('#sel_bank').val();
    json = json + '"bank_id":"' + sel_bank + '",';
    var item_desc = $('#item_desc').val();
    json = json + '"item_desc":"' + item_desc + '",';
    var or_qty = $('#or_qty').val();
    json = json + '"or_qty":"' + or_qty + '",';
    var ag_fright = $('#ag_fright').val();
    json = json + '"ag_fright":"' + ag_fright + '",';
    var cm_fright = $('#cm_fright').val();
    json = json + '"cm_fright":"' + cm_fright + '",';
    var comn_fr = $('#comn_fr').val();
    json = json + '"comn_fr":"' + comn_fr + '",';
    var ag_clearence = $('#ag_clearence').val();
    json = json + '"ag_clearence":"' + ag_clearence + '",';
    var cm_clearence = $('#cm_clearence').val();
    json = json + '"cm_clearence":"' + cm_clearence + '",';
    var comn_cl = $('#comn_cl').val();
    json = json + '"comn_cl":"' + comn_cl + '",';
    var tot_sum = $('#tot_sum').val();
    json = json + '"tot_sum":"' + tot_sum + '",';
    var ord_line = $('#ord_line').val();
    json = json + '"ord_line":"' + ord_line + '",';
    var remark = $('#remark').val();
    json = json + '"remark":"' + remark + '",';
    var chg_status = $('#chg_status').val();
    json = json + '"chg_status":"' + chg_status + '",';
    var stchange_date = $('#stchange_date').val();
    json = json + '"stchange_date":"' + stchange_date + '",';
    var orgn_datetime = $('#orgn_datetime').val();
    json = json + '"orgn_datetime":"' + orgn_datetime + '",';
    var dxb_payinfo = $('#dxb_payinfo').val();
    json = json + '"dxb_payinfo":"' + dxb_payinfo + '",';
    var paid_amt = $('#paid_amt').val();
    json = json + '"paid_amt":"' + paid_amt + '",';
    var paid_amt = $('#paid_amt').val();
    json = json + '"paid_amt":"' + paid_amt + '",';
    var invoice_no = $('#invoice_no').val();
    json = json + '"invoice_no":"' + invoice_no + '",';
    var idorder = $('#idorder').val();
    json = json + '"idorder":"' + idorder + '"';
    json = json + '}';
    Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to edit the order details?',
            title: 'Edit Order Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
    $.ajax({
        url: "process_edit_order.php",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            if (data == 1) {
                Lobibox.notify('success', {
                    delay: false,
                    sound: true,
                    closeOnEsc: window.setTimeout(function () {
                        window.location.href = "manage_order.php";

                    }, 2000),

                    title: 'Success',
                    msg: 'Success Message : Order Updated Successfully'
                });
            }
        }
    });
                }
            }
        });
});



$('#ins_order').on('click', function () {

    var json = '';
    json = json + '{';

    var user_id = $('#user_id').val();
    json = json + '"user_id":"' + user_id + '",';
    var order_no = $('#order_no').val();
    json = json + '"order_no":"' + order_no + '",';
    var order_date = $('#order_date').val();
    json = json + '"order_date":"' + order_date + '",';
    var sel_agn = $('#sel_agn').val();
    json = json + '"agent_id":"' + sel_agn + '",';
    var sel_cont = $('#sel_cont').val();
    json = json + '"container_id":"' + sel_cont + '",';
    var fr_id = $('#from_locationid').val();
    json = json + '"fr_loc":"' + fr_id + '",';
    var to_id = $('#to_locationid').val();
    json = json + '"to_loc":"' + to_id + '",';
    var sel_cus = $('#sel_cus').val();
    json = json + '"cus_id":"' + sel_cus + '",';
    var sel_bank = $('#sel_bank').val();
    json = json + '"bank_id":"' + sel_bank + '",';
    var item_desc = $('#item_desc').val();
    json = json + '"item_desc":"' + item_desc + '",';
    var ord_line = $('#ord_line').val();
    json = json + '"line":"' + ord_line + '",';
    var or_qty = $('#or_qty').val();
    json = json + '"or_qty":"' + or_qty + '",';
    var ag_fright = $('#ag_fright').val();
    json = json + '"agn_freight":"' + ag_fright + '",';
    var cm_fright = $('#cm_fright').val();
    json = json + '"comp_freight":"' + cm_fright + '",';
    var comn_fr = $('#comn_fr').val();
    json = json + '"comn_freight":"' + comn_fr + '",';
    var ag_clearence = $('#ag_clearence').val();
    json = json + '"agn_clearence":"' + ag_clearence + '",';
    var cm_clearence = $('#cm_clearence').val();
    json = json + '"comp_clearence":"' + cm_clearence + '",';
    var comn_cl = $('#comn_cl').val();
    json = json + '"comn_clearence":"' + comn_cl + '",';
    var tot_sum = $('#tot_sum').val();
    json = json + '"paid_amt":"' + tot_sum + '"';
    json = json + '}';
    $.ajax({
        url: "process_add_order.php",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            if (data == 1) {
                Lobibox.notify('success', {
                    delay: false,
                    sound: true,
                    closeOnEsc: window.setTimeout(function () {
                        window.location.href = "manage_order.php";

                    }, 2000),

                    title: 'Success',
                    msg: 'Success Message : New Order Added Successfully'
                });
            }
        }
    });


});
