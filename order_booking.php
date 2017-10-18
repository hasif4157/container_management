<?php
require_once('settings.php');
include('header.php');
$database=new database();
$sql_orno = "SELECT * FROM ex_order order by id desc limit 1";
$num_orno = $database->rows($sql_orno);
$qry_orno = $database->select_query_array($sql_orno);

if ($num_orno > 0) {
    $str = $qry_orno[0]->id + 1;
    $order_no = "EX-" . str_pad($str, 5, "0", STR_PAD_LEFT);
} else {
    $str = 1;
    $order_no = "EX-" . str_pad($str, 5, "0", STR_PAD_LEFT);
}
$user_id = $_SESSION['user_id'];
//agent number
$sql_agnno = "SELECT id FROM ex_agent order by id desc limit 1";
$num_agntno = $database->rows($sql_agnno);
$qry_agnno = $database->select_query_array($sql_agnno);

if ($num_agntno > 0) {
    $str = $qry_agnno[0]->id + 1;
    $agn_no = "AG" . str_pad($str, 5, "0", STR_PAD_LEFT);
} else {
    $str = 1;
    $agn_no = "AG" . str_pad($str, 5, "0", STR_PAD_LEFT);
}

//customer number
$sql_custno = "SELECT id FROM ex_clients order by id desc limit 1";
$num_custno = $database->rows($sql_custno);
$qry_custno = $database->select_query_array($sql_custno);

if ($num_custno > 0) {
    $str = $qry_custno[0]->id + 1;
    $cust_no = "CUS" . str_pad($str, 5, "0", STR_PAD_LEFT);
} else {
    $str = 1;
    $cust_no = "CUS" . str_pad($str, 5, "0", STR_PAD_LEFT);
}
?>


<!-- model agent-->
<form method="POST" action="" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data">
    <div id="stack1" class="modal fade" tabindex="-1" data-focus-on="input:first">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Create New Agent</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="text" name="agn_no" id="ag_no" class="form-control red" value="<?= $agn_no; ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text"  name="agn_name" id="ag_name" class="form-control" placeholder="Enter Name">  </div>
            <div class="form-group">
                <input type="text"  name="comp_name" id="comp_name" class="form-control" placeholder="Enter Company Name">  </div>
            <div class="form-group">
                <input type="text"  name="agn_email" id="ag_email" class="form-control" placeholder="Enter Email">  </div>
            <div class="form-group">
                <input type="text"  name="agn_phone" id="ag_phone" class="form-control" placeholder="Enter Phone">  </div>
        </div>

        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
            <button type="submit" id="add_agent" class="btn blue">Quick Save</button>
        </div>
    </div>
  
</form>

<!-- model customer-->
<form action=""  enctype="multipart/form-data">
    <div id="stack2" class="modal fade" tabindex="-1" data-focus-on="input:first">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Create New Customer</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="text" name="cust_no" id="cust_no" class="form-control red" value="<?= $cust_no ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text"  name="cust_name" id="cust_name" class="form-control" placeholder="Enter Name">  </div>
            <div class="form-group">
                <input type="text"  name="cust_addr" id="cust_addr" class="form-control" placeholder="Enter Address">  </div>
            <div class="form-group">
                <input type="text" name="cust_email" id="cust_email" class="form-control" placeholder="Enter Email">  </div>
            <div class="form-group">
                <input type="text" name="cust_phone" id="cust_phone" class="form-control" placeholder="Enter Phone">  </div>
                <div class="form-group">
                    <input type="text" name="cust_cp" id="cust_cp" class="form-control" placeholder="Enter Contact Person Mobile Number">  </div>
        </div>

        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
            <button type="submit" id="add_cus" class="btn blue">Quick Save</button>
        </div>
    </div>
  
</form>
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
       
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">

                                <div class="form-body">
                                    <div class="form-group">
                                        <label>
                                            <input type="hidden" id="user_id" name="user_id" value="<?=$user_id?>">
                                            Order No# <input type="text" name="order_no" id="order_no" class="form-control red" value="<?= $order_no ?>" readonly>
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
                                        <label>Select Agent <a href="#" id="addagent" class="btn btn-outline dark" data-target="#stack1" data-toggle="modal" style="text-decoration: underline; font-size: 12px;
                                                               margin-left: 30px;" class="small-link">Create Agent</a></label>
                                        <div id="err_agn">
                                            <select  class="selectpicker" id="sel_agn" name="or_selagn" data-live-search="true" title="select Agent">
                                                <?php
                                                $sql_agent = "SELECT * FROM ex_agent";
                                                $row_agent=$database->select_query_array($sql_agent);
                                                for($i=0;$i<count($row_agent);$i++){
                                                    echo "<option value='" . $row_agent[$i]->id . "'>" . $row_agent[$i]->agn_name . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <table>
                                        <tbody><tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Agent Email</span><br>
                                                    <input type="hidden" name="or_agnum" id="or_agnum" value="" class="form-control" readonly>
                                                    <input type="hidden" name="or_agent" id="or_agent" value="" class="form-control" readonly>
                                                    <input type="text" name="agn_email" id="agn_email" value="" class="form-control" readonly>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Agent Mobile</span><br>
                                                    <input type="text" name="agn_mobile" id="agn_mobile" value="" class="form-control" readonly>
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
                                                $sql_container = "SELECT * FROM ex_container";
                                                $row_container=$database->select_query_array($sql_container);
                                                for($i=0;$i<count($row_container);$i++){
                                                    echo "<option value='" . $row_container[$i]->id . "'>" . $row_container[$i]->container_no . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <table>
                                        <tbody><tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Container#</span><br>
                                                    <input type="text"  name="cont_no" id="cont_no" value="" class="form-control" readonly>
                                                </td>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Container Size</span><br>
                                                    <input type="text" name="cont_sz" id="cont_sz" value="" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Loading Date</span><br>
                                                    <input type="text" name="cont_ld" id="cont_ld" value="" class="form-control" readonly>
                                                </td>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Sailing Date</span><br>
                                                    <input type="text" name="cont_sd" id="cont_sd" value="" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Closing Date</span><br>
                                                    <input type="text" name="cont_cd" id="cont_cd" value="" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Origin Port</span><br>
                                                    <input type="text" name="cont_op" id="cont_op" value="" class="form-control" readonly>
                                                </td>
                                                <td valign="top" style="min-width: 140px;" >
                                                    <span>Destination Port</span><br>
                                                    <input type="text" name="cont_dp" id="cont_dp" value="" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" valign="top" style="min-width: 140px;">
                                                    <span>Container Status</span><br>
                                                    <input type="text" name="cont_cs" id="cont_cs" value="" class="form-control" readonly>
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
                                            <select id="from_locationid" name="from_locationid" class="selectpicker" data-live-search="true" title="select from location">
                                                <?php
                                                $sql_frloc = "SELECT * FROM from_location";
                                                $row_frloc=$database->select_query_array($sql_frloc);
                                                for($i=0;$i<count($row_frloc);$i++){
                                                    echo "<option value='" . $row_frloc[$i]->id . "'>" . strtoupper($row_frloc[$i]->loc_name) . "</option>";
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
                                            <select id="to_locationid" name="to_locationid" class="selectpicker" data-live-search="true" title="select to location">
                                                <?php
                                                $sql_toloc = "SELECT * FROM to_location";
                                                $row_toloc=$database->select_query_array($sql_toloc);
                                                for($i=0;$i<count($row_toloc);$i++){
                                                    echo "<option value='" . $row_toloc[$i]->id . "'>" . strtoupper($row_toloc[$i]->loc_name) . "</option>";
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
                                        <label>Customers <a href="#" id="addclient" class="btn btn-outline dark" data-target="#stack2" data-toggle="modal" style="text-decoration: underline; font-size: 12px;
                                                            margin-left: 30px;" class="small-link">Create Customer</a></label>
                                        <div id="err_cus">
                                            <select id="sel_cus" name="or_selcus" class="selectpicker" data-live-search="true" title="select bank details">
                                                <?php
                                                $sql_cl = "SELECT * FROM ex_clients";
                                                $row_cl=$database->select_query_array($sql_cl);
                                                for($i=0;$i<count($row_cl);$i++) {
                                                    echo "<option value='" . $row_cl[$i]->id . "'>" . strtoupper($row_cl[$i]->cust_name) . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <table>
                                        <tbody><tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Customer Email</span><br>
                                                    <input type="hidden" name="cus_no" id="cus_no" value="" class="form-control" readonly>
                                                    <input type="hidden" name="or_customer" id="or_customer" value="" class="form-control" readonly>
                                                    <input type="text" name="cus_email" id="cus_email" value="" class="form-control" readonly>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Customer Mobile</span><br>
                                                    <input type="text" name="cus_mobile" id="cus_mobile" value="" class="form-control" readonly>
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
                                                $sql_bk ="SELECT * FROM ex_bank where id !=''";
                                                $row_bk=$database->select_query_array($sql_bk);
                                                for($i=0;$i<count($row_bk);$i++){
                                                    echo "<option value='" . $row_bk[$i]->id . "'>" . strtoupper($row_bk[$i]->bank_name) . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <table>
                                        <tbody><tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Sort Code</span><br>
                                                    <input type="hidden" name="bank_name" id="bank_name" value="" class="form-control" readonly>
                                                    <input type="text" name="sort_code" id="sort_code" value="" class="form-control" readonly>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Naira Account(&#8358;)</span><br>
                                                    <input type="text" name="naira_ac" id="naira_ac" value="" class="form-control" readonly>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Dollar Account($)</span><br>
                                                    <input type="text" name="dollar_ac" id="dollar_ac" value="" class="form-control" readonly>
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
                                        <textarea class="form-control" name="item_desc" id="item_desc" rows="3"></textarea>
                                    </div>

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
                                        <label class="mt-checkbox"> Lines
                                            <input type="checkbox" value="1" name="test" class="chk_line">
                                            <span></span>
                                            <textarea class="form-control" name="line" rows="3" cols="30" id="ord_line" readonly></textarea>
                                        </label>


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

                                    <div class="form-group">
                                        <label>Total Sum</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="tot_sum" id="tot_sum" class="form-control" placeholder="0.00"> </div>
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
                        <button type="submit" id="ins_order" class="btn blue">Submit</button>
                        <button type="button" class="btn default">Cancel</button>
                    </div>
                </div>
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

        $('.fright,.clearence').on('keyup', function () {
            tot_sum1();
            tot_sum2();
            tot_sum();
        });

    });

//total sum/commn 
    function tot_sum1() {
        var ag_fright = $('#ag_fright').val();
        var cm_fright = $('#cm_fright').val();
        if (ag_fright == '') {
            ag_fright = 0;
        }
        if (cm_fright == '') {
            cm_fright = 0;
        }
        var tot1 = parseInt(ag_fright) - parseInt(cm_fright);
        $('#comn_fr').val(tot1);
    }

    function tot_sum2() {
        var ag_clearence = $('#ag_clearence').val();
        var cm_clearence = $('#cm_clearence').val();
        if (ag_clearence == '') {
            ag_clearence = 0;
        }
        if (cm_clearence == '') {
            cm_clearence = 0;
        }
        var tot2 = parseInt(ag_clearence) - parseInt(cm_clearence);
        $('#comn_cl').val(tot2);
    }

    function tot_sum() {
        var ag_fright = $('#ag_fright').val();
        var ag_clearence = $('#ag_clearence').val();
        if (ag_fright == '') {
            ag_fright = 0;
        }
        if (ag_clearence == '') {
            ag_clearence = 0;
        }
        var data = {status: 'get_val'};
        $.ajax({
            url: "settings.php",
            type: 'POST',
            data: data,
            async: false,
            success: function (data) {
                var ex_rate = data;
                var tot = (parseInt(ag_fright) * parseFloat(ex_rate)) + (parseInt(ag_clearence));
                $('#tot_sum').val(tot);
           }
        });
    }

    $('#sel_cont').on('change', function () {
        var sel_cont = $(this).val();
        var url = 'get_continfo.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_cont: sel_cont}, function (data) {
            $('#divLoading').removeClass('show');

            var json_cont = jQuery.parseJSON(data);
            $('#cont_no').val(json_cont[0]);
            $('#cont_sz').val(json_cont[1]);
            $('#cont_ld').val(json_cont[2]);
            $('#cont_sd').val(json_cont[3]);
            $('#cont_cd').val(json_cont[4]);
            $('#cont_op').val(json_cont[5]);
            $('#cont_dp').val(json_cont[6]);
            $('#cont_cs').val(json_cont[7]);
        });

    });

    $('#from_locationid').on('change', function () {
        var sel_frloc = $(this).val();
        var url = 'get_frloc.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_frloc: sel_frloc}, function (data) {
            $('#divLoading').removeClass('show');
            $('#fr_loc').html(data);
        });

    });
    $('#to_locationid').on('change', function () {
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
            $('#bank_name').val(json_bn[0]);
            $('#sort_code').val(json_bn[1]);
            $('#naira_ac').val(json_bn[2]);
            $('#dollar_ac').val(json_bn[3]);

        });

    });

    $('#sel_cus').on('change', function () {
        var sel_cus = $(this).val();
        var url = 'get_cus.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_cus: sel_cus}, function (data) {
            $('#divLoading').removeClass('show');
            var json_cus = jQuery.parseJSON(data);
            $('#cus_no').val(json_cus[0]);
            $('#or_customer').val(json_cus[1]);
            $('#cus_email').val(json_cus[2]);
            $('#cus_mobile').val(json_cus[3]);
        });

    });

    $('#sel_agn').on('change', function () {
        var sel_agn = $(this).val();
        var url = 'get_agn.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_agn: sel_agn}, function (data) {
            $('#divLoading').removeClass('show');
            var json = jQuery.parseJSON(data);
            $('#or_agnum').val(json[0]);
            $('#or_agent').val(json[1]);
            $('#agn_email').val(json[2]);
            $('#agn_mobile').val(json[3]);


        });

    });



</script>

<script>
    //line check/uncheck
    $(document).ready(function () {
        var ckbox = $('.chk_line');
        $('.chk_line').on('click', function () {
            if (ckbox.is(':checked')) {
                $('#ord_line').attr('readonly', false);
            } else {
                $('#ord_line').attr('readonly', true);
            }
        });
    });
</script>
</body>


</html>
