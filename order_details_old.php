<?php
require_once('settings.php');
include('header.php');
$edit_id = $_GET['id'];
$sql_ed = "select O.*,A.agn_name,A.agn_phone from ex_order O LEFT JOIN  ex_agent A ON A.id=O.or_agent where O.id=$edit_id";
$qry_ed = $conn->query($sql_ed);
$res_ed = $qry_ed->fetch_array();

$fr_loc = $res_ed['fr_loc'];
$to_loc = $res_ed['to_loc'];
$cus_id = $res_ed['or_customer'];
$bank_id = $res_ed['or_bank'];

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
        <h1 class="page-title">Order Booking
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
                                            Order No# <input type="text" name="order_no" class="form-control red" value="<?= $res_ed['order_no']; ?>" readonly>
                                        </label>
                                    </div>
                                       
                                           <input type="hidden" name="idorder" class="form-control red" value="<?= $res_ed['id']; ?>" readonly>
                                        

                                    <div class="form-group">

                                        <label>Order Date</label>
                                        <div class="input-group">

                                            <input type="text" name="order_date" value="<?= $res_ed['order_date']; ?>" class="form-control" placeholder="Agents Info"> 
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label>Agent Info</label>
                                        <div class="input-group">

                                            <input type="text" name="or_agent" value="<?=$res_ed['or_agent'] . "-" . $res_ed['agn_mobile'] ;?>" class="form-control wid300" placeholder="Agents Info" readonly> 
                                        </div>
                                    </div>

                                    <span>Prepared By Excellent Way Group</span> 
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-4" style="float:left !important;">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">


                                <div class="form-body">
                                    <label class="mt-checkbox"> Viewed
                                        <input type="checkbox" value="1" name="test">
                                        <span></span>
                                    </label>

                                    <div class="form-group">
                                        <label>CONTAINER INFO</label>
                                    </div>
                                   <table>
                                        <tbody><tr>
                                        <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Conatiner#</span><br>
                                                    <input type="text"  name="cont_no" id="cn_1" value="<?= $res_ed['cont_no']; ?>" class="form-control" readonly>
                                                </td>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Container Size</span><br>
                                        <input type="text" name="cont_sz" id="cn_2" value="<?= $res_ed['cont_sz'] ?>" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Loading Date</span><br>
                                                    <input type="text" name="cont_ld" id="cn_3" value="<?= $res_ed['cont_ld'] ?>" class="form-control" readonly>
                                                </td>
                                                <td valign="top" style="min-width: 140px;">
                                                    <span>Sailing Date</span><br>
                                                    <input type="text" name="cont_sd" id="cn_4" value="<?= $res_ed['cont_sd'] ?>" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Closing Date</span><br>
                                                    <input type="text" name="cont_cd" id="cn_5" value="<?= $res_ed['cont_cd'] ?>" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="min-width: 140px;" class="pdright5">
                                                    <span>Origin Port</span><br>
                                                    <input type="text" name="cont_op" id="cn_6" value="<?= $res_ed['cont_op'] ?>" class="form-control" readonly>
                                                </td>
                                                <td valign="top" style="min-width: 140px;" >
                                                    <span>Destination Port</span><br>
                                                    <input type="text" name="cont_dp" id="cn_7" value="<?= $res_ed['cont_dp'] ?>" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" valign="top" style="min-width: 140px;">
                                                    <span>Container Status</span><br>
                                                    <input type="text" name="cont_cs" id="cn_8" value="<?= $res_ed['cont_cs'] ?>" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" valign="top" style="min-width: 140px;">
                                                    <span>Arrival Date</span><br>
                                                    <input type="text" name="" id="cn_8" value="" class="form-control" readonly>
                                                </td>
                                            </tr>
                                        </tbody></table>

                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="portlet light bordered">

                            <div class="portlet-body form">
                                Last 10 locations of this container  
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">

                        <?php
                        $sql_frloc = mysqli_query($conn, "SELECT * FROM ex_location where id=$fr_loc");
                        $qry_frloc = mysqli_fetch_array($sql_frloc);
                        ?>
                        <div class="col-md-4" style="float:left !important;">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">

                                <div class="portlet-body form">

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>From Location(Branch)</label>
                                            <div class="input-group">
                                                <input type="text" name="or_agent" value="<?= $qry_frloc['loc_name']; ?>" class="form-control" placeholder="Agents Info" readonly/> 
                                            </div>
                                        </div>
                                        <table width="100%">
                                            <tbody><tr>
                                                    <td>
                                                        <span>Address:</span><br>
                                                        <textarea class="form-control" name="fr_addr" rows="5" cols="100" id="fr_loc" readonly><?= $qry_frloc['loc_addr']; ?></textarea>

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Phone:&nbsp;<?= $qry_frloc['loc_phone']; ?>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Location:&nbsp;<?= $qry_frloc['loc_name']; ?>
                                                    </td>

                                                </tr>

                                            </tbody></table>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <?php
                        $sql_toloc = mysqli_query($conn, "SELECT * FROM ex_location where id=$to_loc");
                        $qry_toloc = mysqli_fetch_array($sql_toloc);
                        ?>
                        <div class="col-md-4" style="float:left !important;">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">

                                <div class="portlet-body form">


                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>To Location(Branch)</label>
                                            <div class="input-group">
                                                <input type="text" name="or_agent" value="<?= $qry_toloc['loc_name'] ?>" class="form-control" placeholder="Agents Info" readonly/> 
                                            </div>
                                        </div>
                                        <table width="100%">
                                            <tbody><tr>
                                                    <td>
                                                        <span>Address:</span><br>
                                                        <textarea class="form-control" name="to_addr" rows="5" cols="100" id="to_loc" readonly><?= $qry_toloc['loc_addr'] ?></textarea>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Phone:&nbsp;<?= $qry_toloc['loc_phone']; ?>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Location:&nbsp;<?= $qry_toloc['loc_name']; ?>
                                                    </td>

                                                </tr>

                                            </tbody></table>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>
                <?php
                $sql_cus = mysqli_query($conn, "SELECT * FROM ex_clients where id=$cus_id");
                $qry_cus = mysqli_fetch_array($sql_cus);
                ?>
                <span class="caption-subject font-dark sbold uppercase">Customer Info </span>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4" style="float:left !important;">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">

                                <div class="portlet-body form">

                                    <div class="form-body">

                                        <div class="form-group">
                                            <label>Customers</label>
                                            <div class="input-group">
                                                <input type="text" name="or_agent" value="<?= $res_ed['or_customer']; ?>" class="form-control" placeholder="Customer Name" readonly/> 
                                            </div>
                                        </div>
                                        <table>
                                            <tbody><tr>
                                                    <td valign="top" style="min-width: 140px;">
                                                        <span>Customer Email</span><br>
                                                        <input type="text" name="cus_email" id="cus_1" value="<?= $res_ed['cus_email']; ?>" class="form-control" readonly>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td valign="top" style="min-width: 140px;">
                                                        <span>Customer Mobile</span><br>
                                                        <input type="text" name="cus_mobile" id="cus_2" value="<?= $res_ed['cus_mobile']; ?>" class="form-control" readonly>
                                                    </td>

                                                </tr>



                                            </tbody></table>
                                    </div>
                                </div>


                            </div>
                            <?php
                            $sql_bank = mysqli_query($conn, "SELECT * FROM ex_bank where id=$bank_id");
                            $qry_bank = mysqli_fetch_array($sql_bank);
                            ?>
                        </div><div class="col-md-4" style="float:left !important;">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">

                                <div class="portlet-body form">


                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Bank</label>
                                            <div class="input-group">
                                                <input type="text" name="or_agent" value="<?= $qry_bank['bank_name']; ?>" class="form-control" placeholder="Agents Info" readonly/> 
                                            </div>
                                        </div>
                                        <table>
                                            <tbody><tr>
                                                    <td valign="top" style="min-width: 140px;">
                                                        <span>Sort Code</span><br>
                                                        <input type="text" name="sort_code" id="bn_1" value="<?= $qry_bank['sort_code']; ?>" class="form-control" readonly>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td valign="top" style="min-width: 140px;">
                                                        <span>Naira Account(&#8358;)</span><br>
                                                        <input type="text" name="naira_ac" id="bn_2" value="<?= $qry_bank['naira_acc']; ?>" class="form-control" readonly>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td valign="top" style="min-width: 140px;">
                                                        <span>Dollar Account($)</span><br>
                                                        <input type="text" name="dollar_ac" id="bn_3" value="<?= $qry_bank['dollar_acc']; ?>" class="form-control" readonly>
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
                <textarea class="form-control" name="item_desc" rows="3"><?=$res_ed['item_desc'];?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-body">

                                        <div class="form-group">
                                            <label>Freight Charge:</label>
                                            <span><?=number_format($res_ed['agn_freight'],2);?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Clearing Charge:</label>
                                            <span><?=number_format($res_ed['agn_clearence'],2);?></span>
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
                                                <input type="text" name="or_qty" class="form-control" value="<?=$res_ed['or_qty'];?>" placeholder="Enter Quantity"> </div>
                                        </div>

                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>
                <span class="caption-subject font-dark sbold uppercase">Office Use</span>
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
                                                <input type="text" name="agn_freight" id="ag_fright" class="form-control fright" value="<?=$res_ed['agn_freight'];?>" placeholder="0.00"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Company Freight Charges</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="comp_freight" id="cm_fright" value="<?=$res_ed['comp_freight'];?>" class="form-control fright" placeholder="0.00"> </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Commission</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="comn_freight" id="comn_fr" value="<?=$res_ed['comn_freight'];?>" class="form-control" placeholder="0.00" readonly=""> </div>
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
                                                <input type="text" name="agn_clearence" id="ag_clearence" value="<?=$res_ed['agn_clearence'];?>" class="form-control clearence" placeholder="0.00"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Company Clearing Charges</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="comp_clearence" id="cm_clearence" value="<?=$res_ed['comp_clearence'];?>" class="form-control clearence" placeholder="0.00"> </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Commission</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="comn_clearence" id="comn_cl" value="<?=$res_ed['comn_clearence'];?>" class="form-control" placeholder="0.00" readonly=""> </div>
                                        </div>

                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-8">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">

                                <div class="form-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                    <label class="mt-checkbox"> Lines
                                        <input type="checkbox" value="1" name="test" class="chk_line">
                                        <span></span>
                                        <textarea class="form-control" name="comment" rows="3" cols="30" id="ord_line" readonly></textarea>
                                    </label>
                                           
                                         
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select  class="form-control" name="stat_type">
                                                <option>select Status type</option>
                                        <option value="On Transit"<?php if($res_ed['order_status']=="On Transit") {echo "selected"; } ?>>On Transit</option>
                                                <option value="Cleared"<?php if($res_ed['order_status']=="Cleared") {echo "selected"; } ?>>Cleared</option>
                                                <option value="Not Ready for Collection"<?php if($res_ed['order_status']=="Not Ready for Collection") {echo "selected"; } ?>>Not Ready for Collection</option>
                                                <option value="Ready for Collection"<?php if($res_ed['order_status']=="Ready for Collection") {echo "selected"; } ?>>Ready for Collection</option>
                                                <option value="Collected"<?php if($res_ed['order_status']=="Collected") {echo "selected"; } ?>>Collected</option>
                                                <option value="Commision Paid"<?php if($res_ed['order_status']=="Commision Paid") {echo "selected"; } ?>>Commision Paid</option>
                                                <option value="Reminder"<?php if($res_ed['order_status']=="Reminder") {echo "selected"; } ?>>Reminder</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Comment</label>
                                            <textarea class="form-control" name="comment" rows="3" ><?=$res_ed['comment'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Status Changed Date</label>
                                            <div class="input-group"> 

                                                <input type="text" name="stchange_date" class="form-control" value="<?=$res_ed['stchange_date'];?>" placeholder="Last Status Changed Date" readonly/> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Origin Date & Time</label>
                                            <div class="controls input-append date form_datetime" data-date="2010-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input class="" type="text" value="" name="org_date"  style="width:250px !important;" placeholder="Origin Date & Time" readonly>
                                                <span class="add-on"><i class="icon-remove"></i></span>
                                                <span class="add-on"><i class="icon-th"></i></span>
                                            </div>
                                            <input type="hidden" id="dtp_input1" value="" />
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <textarea class="form-control" name="remarks" rows="3"><?=$res_ed['remark'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Delivery Details</label>
                                            <textarea class="form-control" name="del_addr" rows="3"><?=$res_ed['del_details'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Customer Complaints</label>
                                            <textarea class="form-control" name="cus_com" rows="3"><?=$res_ed['cus_complaint'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dubai Payment Info</label>
                                            <textarea class="form-control" name="pay_info" rows="3"><?=$res_ed['dxb_payinfo'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Paid Amount</label>
                                            <div class="input-group">
                                                <input type="text" name="paid_amt" class="form-control" value="<?=$res_ed['paid_amt'];?>" placeholder="Paid Amount"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Invoice Number</label>
                                            <div class="input-group">
                                                <input type="text" name="invoice" class="form-control" value="<?=$res_ed['invoice_no'];?>" placeholder="Enter Phone Number"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                   <form action="sendsms.php" method="post" id="change-form">
                                       <input type="hidden" name="sms_orno" value="<?=$edit_id;?>" class="form-control"> 
                                       <input type="hidden" name="sms_usrno" value="<?= $res_ed['cus_mobile']; ?>" class="form-control"> 
                                    <div class="col-md-5 mrg15">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" rows="9" cols="100" name="messages"><?= $qry_toloc['loc_addr'] ?>,&nbsp;phone:<?= $qry_toloc['loc_phone']; ?>,pls pay to&nbsp;<?= $qry_bank['bank_name']; ?>
,Dollar_Acct#:&nbsp;<?= $qry_bank['dollar_acc']; ?>,&nbsp;Naira_Acct#:&nbsp;<?= $qry_bank['naira_acc']; ?>,Clearing Chrg=&nbsp;<?=number_format($res_ed['agn_clearence'],2);?>(Naira)-Thx(<?= $res_ed['order_no']; ?>)</textarea>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" name="send_sms" class="btn blue">Send SMS</button>
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Manual Message</label>
                                            <textarea class="form-control" rows="9" cols="100" name="manual_addr"></textarea>

                                        </div>

                                        <div class="input-group">
                                            <input type="text" name="manual_phone" class="form-control"> 
                                            <p class="font13">(Enter the phone number to send sms manually)</p>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" name="send_mnsms" class="btn blue">Send Manual SMS</button>
                                        </div>
                                    </div>
 </form>
                                    <div class="clearfix"></div>


                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->

                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->

                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
                        <div class="col-md-6">



                        </div>
                    </div>

                    <!-- END DASHBOARD STATS 1-->






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
            var splited_data = data.split('^');
            $('#cn_1').val(splited_data[0]);
            $('#cn_2').val(splited_data[1]);
            $('#cn_3').val(splited_data[2]);
            $('#cn_4').val(splited_data[3]);
            $('#cn_5').val(splited_data[4]);
            $('#cn_6').val(splited_data[5]);
            $('#cn_7').val(splited_data[6]);
            $('#cn_8').val(splited_data[7]);
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
            var splited_data = data.split('^');
            $('#bn_1').val(splited_data[0]);
            $('#bn_2').val(splited_data[1]);
            $('#bn_3').val(splited_data[2]);

        });

    });

    $('#sel_cus').on('change', function () {
        var sel_cus = $(this).val();
        var url = 'get_cus.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_cus: sel_cus}, function (data) {
            $('#divLoading').removeClass('show');
            var splited_data = data.split('^');
            $('#cus_1').val(splited_data[0]);
            $('#cus_2').val(splited_data[1]);
        });

    });


</script>

<script>

    $('#add_order').submit(function (e) {
        e.preventDefault();

        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to make new order?',
            title: 'New Order',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_edit_order.php'
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
        return false;
    });
    
    
    //line check/uncheck
    $(document).ready(function () {
         var ckbox = $('.chk_line');
    $('.chk_line').on('click',function () {
        if (ckbox.is(':checked')) {
             $('#ord_line').attr('readonly',false);
        } else {
           $('#ord_line').attr('readonly',true);
        }
    });
    });
</script>
</body>


</html>
