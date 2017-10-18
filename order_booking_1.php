<?php
require_once('settings.php');
include('header.php');

$sql_orno = mysqli_query($conn, "SELECT id FROM ex_order order by id desc limit 1");
$num_orno = mysqli_num_rows($sql_orno);
$qry_orno = mysqli_fetch_array($sql_orno);

if ($num_orno > 0) {
    $str = $qry_orno['id'] + 1;
    $order_no = "EX-" . str_pad($str, 5, "0", STR_PAD_LEFT);
} else {
    $str = 1;
    $order_no = "EX-" . str_pad($str, 5, "0", STR_PAD_LEFT);
}

$user_id = $_SESSION['user_id'];
$sql_emp = mysqli_query($conn, "SELECT * FROM crm_owner where id=$user_id");
$qry_emp = mysqli_fetch_array($sql_emp);
?>

<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->

<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->

        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.php">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="manage_order.php">Manage Order Bookings</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Order Bookings</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Add Order Bookings
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="add_order" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">

                                <div class="form-body">
                                    <div class="form-group">
                                        <label>
                                            Order No# <input type="text" name="order_no" class="form-control red" value="<?= $order_no ?>" readonly>
                                        </label>
                                    </div>


                                    <div class="form-group">

                                        <label>Order Date</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="form-control" id="order_date" name="order_date" type="text" value=""  placeholder="Order Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />

                                    </div>

                                    <div class="form-group">
                                        <label>Select Agent</label>
                                        <div id="err_agn">
                                        <select  class="selectpicker" id="sel_agn" name="or_selagn" data-live-search="true" title="select Agent">
                                            <?php
                                            $sql_agent = mysqli_query($conn, "SELECT * FROM ex_agent where id !=''");
                                            while ($row_agent = mysqli_fetch_array($sql_agent)) {
                                                echo "<option value='" . $row_agent['id'] . "'>" . $row_agent['agn_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                    
                                    <table>
                                        <tbody><tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Agent Email</span><br>
                                                    <input type="hidden" name="or_agnum" id="ag_1" value="" class="form-control" readonly>
                                                    <input type="hidden" name="or_agent" id="ag_2" value="" class="form-control" readonly>
                                                    <input type="text" name="agn_email" id="ag_3" value="" class="form-control" readonly>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Agent Mobile</span><br>
                                                    <input type="text" name="agn_mobile" id="ag_4" value="" class="form-control" readonly>
                                                </td>

                                            </tr>



                                        </tbody></table>

                                </div>
                            </div>


                        </div>

                    </div><div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">

                                <label>CONTAINER INFO</label>
                                <div class="form-body">

                                    <div class="form-group">
                                        <label>Select Container</label>
                                        <div id="err_cont">
                                        <select id="sel_cont" name="or_container"  class="selectpicker " data-live-search="true" title="select container">
                                            <?php
                                            $sql_container = mysqli_query($conn, "SELECT * FROM ex_container where id !=''");
                                            while ($row_container = mysqli_fetch_array($sql_container)) {
                                                echo "<option value='" . $row_container['id'] . "'>" . $row_container['container_no'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>


                                    <table>
                                        <tbody><tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Container#</span><br>
                                                    <input type="text"  name="cont_no" id="cn_1" value="" class="form-control" readonly>
                                                </td>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Container Size</span><br>
                                                    <input type="text" name="cont_sz" id="cn_2" value="" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Loading Date</span><br>
                                                    <input type="text" name="cont_ld" id="cn_3" value="" class="form-control" readonly>
                                                </td>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Sailing Date</span><br>
                                                    <input type="text" name="cont_sd" id="cn_4" value="" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Closing Date</span><br>
                                                    <input type="text" name="cont_cd" id="cn_5" value="" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Origin Port</span><br>
                                                    <input type="text" name="cont_op" id="cn_6" value="" class="form-control" readonly>
                                                </td>
                                                <td valign="top" style="min-width: 140px;" >
                                                    <span>Destination Port</span><br>
                                                    <input type="text" name="cont_dp" id="cn_7" value="" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" valign="top" style="min-width: 140px;">
                                                    <span>Container Status</span><br>
                                                    <input type="text" name="cont_cs" id="cn_8" value="" class="form-control" readonly>
                                                </td>
                                            </tr>
                                        </tbody></table>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">

                                <div class="form-body">
                                    <div class="form-group">
                                        <label>From Location(Branch)</label>
                                        <div id="err_frloc">
                                        <select id="sel_frloc" name="fr_loc" class="selectpicker" data-live-search="true" title="select from location">
                                            <?php
                                            $sql_frloc = mysqli_query($conn, "SELECT * FROM ex_location where id !='' AND loc_type=2");
                                            while ($row_frloc = mysqli_fetch_array($sql_frloc)) {
                                                echo "<option value='" . $row_frloc['id'] . "'>" . strtoupper($row_frloc['loc_name']) . "</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                    <table width="100%">
                                        <tbody><tr>
                                                <td>
                                                    <span>Address:</span><br>
                                                    <textarea class="form-control" name="fr_addr" rows="3" id="fr_loc" readonly></textarea>

                                                </td>

                                            </tr>


                                        </tbody></table>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">


                                <div class="form-body">
                                    <div class="form-group">
                                        <label>To Location(Branch)</label>
                                        <div id="err_toloc">
                                        <select id="sel_toloc" name="to_loc" class="selectpicker" data-live-search="true" title="select to location">
                                            <?php
                                            $sql_loc = mysqli_query($conn, "SELECT * FROM ex_location where id !='' AND loc_type=1");
                                            while ($row_loc = mysqli_fetch_array($sql_loc)) {
                                                echo "<option value='" . $row_loc['id'] . "'>" . strtoupper($row_loc['loc_name']) . "</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                    <table width="100%">
                                        <tbody><tr>
                                                <td>
                                                    <span>Address:</span><br>
                                                    <textarea class="form-control" name="to_addr" rows="3" id="to_loc" readonly></textarea>
                                                </td>

                                            </tr>


                                        </tbody></table>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">

                                <div class="form-body">

                                    <div class="form-group">
                                        <label>Customers</label>
                                        <div id="err_cus">
                                        <select id="sel_cus" name="or_selcus" class="selectpicker" data-live-search="true" title="select bank details">
                                            <?php
                                            $sql_cus = mysqli_query($conn, "SELECT * FROM ex_clients where id !=''");
                                            while ($row_cus = mysqli_fetch_array($sql_cus)) {
                                                echo "<option value='" . $row_cus['id'] . "'>" . strtoupper($row_cus['cust_name']) . "</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                    <table>
                                        <tbody><tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Customer Email</span><br>
                                                    <input type="hidden" name="cus_no" id="cus_1" value="" class="form-control" readonly>
                                                    <input type="hidden" name="or_customer" id="cus_2" value="" class="form-control" readonly>
                                                    <input type="text" name="cus_email" id="cus_3" value="" class="form-control" readonly>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Customer Mobile</span><br>
                                                    <input type="text" name="cus_mobile" id="cus_4" value="" class="form-control" readonly>
                                                </td>

                                            </tr>



                                        </tbody></table>
                                </div>
                            </div>


                        </div>

                    </div><div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">


                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Bank</label>
                                        <div id="err_bank">
                                        <select id="sel_bank" name="or_bank"  class="selectpicker" data-live-search="true" title="select bank details">
                                            <?php
                                            $sql_bank = mysqli_query($conn, "SELECT * FROM ex_bank where id !=''");
                                            while ($row_bank = mysqli_fetch_array($sql_bank)) {
                                                echo "<option value='" . $row_bank['id'] . "'>" . strtoupper($row_bank['bank_name']) . "</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                    <table>
                                        <tbody><tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Sort Code</span><br>
                                                    <input type="hidden" name="bank_name" id="bn_1" value="" class="form-control" readonly>
                                                    <input type="text" name="sort_code" id="bn_2" value="" class="form-control" readonly>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Naira Account(&#8358;)</span><br>
                                                    <input type="text" name="naira_ac" id="bn_3" value="" class="form-control" readonly>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Dollar Account($)</span><br>
                                                    <input type="text" name="dollar_ac" id="bn_4" value="" class="form-control" readonly>
                                                </td>

                                            </tr>


                                        </tbody></table>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">

                                <div class="form-body">

                                    <div class="form-group">
                                        <label>Item Description</label>
                                        <textarea class="form-control" name="item_desc" rows="3"></textarea>
                                    </div>

                                </div>
                            </div>


                        </div>

                    </div><div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">


                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" id="or_qty" name="or_qty" class="form-control" placeholder="Enter Quantity"> </div>
                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">

                                <div class="form-body">

                                    <div class="form-group">
                                        <label>Agent Freight Charges</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="agn_freight" id="ag_fright" class="form-control fright" placeholder="0.00"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Company Freight Charges</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="comp_freight" id="cm_fright" class="form-control fright" placeholder="0.00"> </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Commission</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="comn_freight" id="comn_fr" value="" class="form-control" placeholder="0.00" readonly=""> </div>
                                    </div>

                                </div>
                            </div>


                        </div>

                    </div><div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">


                                <div class="form-body">

                                    <div class="form-group">
                                        <label>Agent Clearing Charges</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="agn_clearence" id="ag_clearence" class="form-control clearence" placeholder="0.00"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Company Clearing Charges</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="comp_clearence" id="cm_clearence" class="form-control clearence" placeholder="0.00"> </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Commission</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="comn_clearence" id="comn_cl" class="form-control" placeholder="0.00" readonly=""> </div>
                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-actions">
                        <button type="submit" class="btn blue">Submit</button>
                        <button type="button" class="btn default">Cancel</button>
                    </div>
                </div>
            </div> 
        </form>
        <div id="prefix_1241741341198" class="add_order custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            New Order Added Successfully
        </div>
    </div>


    <!-- END CONTENT BODY -->
</div>

<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->


<!-- END QUICK SIDEBAR -->

<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
include('footer.php');
?>
<script>
    $(document).ready(function () {

        $('.fright').on('keyup', function () {
            var agent_fr = $('#ag_fright').val();
            var company_fr = $('#cm_fright').val();
            if ((agent_fr != '') && (company_fr != ''))
                var com_fr = agent_fr - company_fr;
            $('#comn_fr').val(com_fr.toFixed(2));

        });

        $('.clearence').on('keyup', function () {
            var agent_cl = $('#ag_clearence').val();
            var company_cl = $('#cm_clearence').val();
            if ((agent_cl != '') && (company_cl != ''))
                var com_cl = agent_cl - company_cl;
            $('#comn_cl').val(com_cl.toFixed(2));

        });

    });


    $('#sel_cont').on('change', function () {
        var sel_cont = $(this).val();
        var url = 'get_continfo.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_cont: sel_cont}, function (data) {
            $('#divLoading').removeClass('show');

            var json_cont = jQuery.parseJSON(data);
            $('#cn_1').val(json_cont[0]);
            $('#cn_2').val(json_cont[1]);
            $('#cn_3').val(json_cont[2]);
            $('#cn_4').val(json_cont[3]);
            $('#cn_5').val(json_cont[4]);
            $('#cn_6').val(json_cont[5]);
            $('#cn_7').val(json_cont[6]);
            $('#cn_8').val(json_cont[7]);
        });

    });

    $('#sel_frloc').on('change', function () {
        var sel_frloc = $(this).val();
        var url = 'get_frloc.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_frloc: sel_frloc}, function (data) {
            $('#divLoading').removeClass('show');
            $('#fr_loc').html(data);
        });

    });
    $('#sel_toloc').on('change', function () {
        var sel_toloc = $(this).val();
        var url = 'get_toloc.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_toloc: sel_toloc}, function (data) {
            $('#divLoading').removeClass('show');
            $('#to_loc').html(data);
        });

    });

    $('#sel_bank').on('change', function () {
        var sel_bank = $(this).val();
        var url = 'get_bank.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_bank: sel_bank}, function (data) {
            $('#divLoading').removeClass('show');
            var json_bn = jQuery.parseJSON(data);
            $('#bn_1').val(json_bn[0]);
            $('#bn_2').val(json_bn[1]);
            $('#bn_3').val(json_bn[2]);
            $('#bn_4').val(json_bn[3]);

        });

    });

    $('#sel_cus').on('change', function () {
        var sel_cus = $(this).val();
        var url = 'get_cus.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_cus: sel_cus}, function (data) {
            $('#divLoading').removeClass('show');
            var json_cus = jQuery.parseJSON(data);
            $('#cus_1').val(json_cus[0]);
            $('#cus_2').val(json_cus[1]);
            $('#cus_3').val(json_cus[2]);
            $('#cus_4').val(json_cus[3]);
        });

    });

    $('#sel_agn').on('change', function () {
        var sel_agn = $(this).val();
        var url = 'get_agn.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_agn: sel_agn}, function (data) {
            $('#divLoading').removeClass('show');
            var json = jQuery.parseJSON(data);
            $('#ag_1').val(json[0]);
            $('#ag_2').val(json[1]);
            $('#ag_3').val(json[2]);
            $('#ag_4').val(json[3]);


        });

    });



</script>

<script>

    $('#add_order').submit(function (e) {
        e.preventDefault();
        if ($('#order_date').val() == '') {
            $('#order_date').css({'border': '1px solid red'});
            $('#order_date').focus();
        } else if ($('#sel_agn').val() == '') {
            $('#err_agn').css({'border': '1px solid red','width':'222px'});
            $('#err_agn').focus();
        } else if ($('#sel_cont').val() == '') {
            $('#err_cont').css({'border': '1px solid red','width':'222px'});
            $('#err_cont').focus();
        } else if ($('#sel_frloc').val() == '') {
            $('#err_frloc').css({'border': '1px solid red','width':'222px'});
            $('#err_frloc').focus();
        } else if ($('#sel_toloc').val() == '') {
            $('#err_toloc').css({'border': '1px solid red','width':'222px'});
            $('#err_toloc').focus();
        } else if ($('#sel_cus').val() == '') {
            $('#err_cus').css({'border': '1px solid red','width':'222px'});
            $('#err_cus').focus();
        }else if ($('#sel_bank').val() == '') {
            $('#err_bank').css({'border': '1px solid red','width':'222px'});
            $('#err_bank').focus();
        }else if ($('#or_qty').val() == '') {
            $('#or_qty').css({'border': '1px solid red'});
            $('#or_qty').focus();
        } else {
            var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to make new order?',
            title: 'New Order',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_add_order.php'
                        , data: data
                        , cache: false
                        , contentType: false
                        , processData: false
                        , type: 'POST'
                        , success: function (data) {
                            $('#divLoading').removeClass('show');

                            if (data == 1) {
                                $('.add_order').show();
                                $('.add_order').fadeOut(3000);
                                window.setTimeout(function () {

                                    // Move to a new location or you can do something else
                                    window.location.href = "manage_order.php";

                                }, 3100);
                            }
                        }
                    });
                }
            }
        });
    }
        return false;
    });
</script>
</body>


</html>
