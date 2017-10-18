<?php
require_once('settings.php');
include('header.php');
include('config/dbconn.php');
$database = new database();
$edit_id = $_GET['id'];
$sql_ed = "select O.*,A.*,B.*,CN.*,CU.*,T.id as to_id,T.loc_name as to_locname,T.loc_addr as to_locaddr,T.color_code to_colorcode,T.loc_phone as to_locphone,F.id as fr_id,F.loc_name as fr_locname,F.loc_addr as fr_locaddr,F.loc_phone as fr_locphone from ex_order O LEFT JOIN ex_clients CU ON CU.id=O.cus_id LEFT JOIN ex_container CN ON CN.id=O.container_id LEFT JOIN from_location F ON F.id=O.fr_loc LEFT JOIN to_location T ON T.id=O.to_loc LEFT JOIN ex_bank B ON B.id=O.bank_id LEFT JOIN  ex_agent A ON A.id=O.agent_id where O.id=$edit_id";
$res_ed = $database->select_query_array($sql_ed);

$fr_loc = $res_ed[0]->fr_loc;
$to_loc = $res_ed[0]->to_loc;
$cus_id = $res_ed[0]->or_customer;
$bank_id = $res_ed[0]->or_bank;

$user_id = $_SESSION['user_id'];
$sql_emp = "SELECT * FROM crm_owner where id=$user_id";
$qry_emp = $database->select_query_array($sql_emp);

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
                <input type="text" name="agn_no" id="agn_no" class="form-control red" value="<?= $agn_no; ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text"  name="agn_name" id="agn_name" class="form-control" placeholder="Enter Name">  </div>
            <div class="form-group">
                <input type="text"  name="comp_name" id="comp_name" class="form-control" placeholder="Enter Company Name">  </div>
            <div class="form-group">
                <input type="text"  name="agn_email" id="agn_email" class="form-control" placeholder="Enter Email">  </div>
            <div class="form-group">
                <input type="text"  name="agn_phone" id="agn_phone" class="form-control" placeholder="Enter Phone">  </div>
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
                    <a href="manage_order.php">View Orders</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Order Bookings Details</span>
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
        <h1 class="page-title">Order Booking Details</h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <input type="hidden" value="<?= $res_ed[0]->id ?>" id="order_id">
        <div style="background: <?= $res_ed[0]->to_colorcode ?>;">

            <div class="col-md-12 row">

                <!-- BEGIN SAMPLE FORM PORTLET-->

                <div class="portlet light bordered">
                    <span class="caption-subject font-dark sbold uppercase">Order  Info</span>
                    <div class="portlet-body form row">


                        <div class="col-md-4">
                            <div class="portlet light bordered">
                                <div class="portlet-body form">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label>
                                                Order No# <input type="text" name="order_no" id="order_no" class="form-control red" value="<?= $res_ed[0]->order_no; ?>" readonly>
                                            </label>
                                        </div>

                                        <input type="hidden" name="idorder" id="idorder" class="form-control red" value="<?= $edit_id;?>" readonly>
                                        <input type="hidden" id="old_status" value="<?= trim($res_ed[0]->order_status) ?>" name="old_status">
                                        <input type="hidden" id="user_name" value="<?= $qry_emp[0]->user_name; ?>" name="user_name">

                                        <div class="form-group">

                                            <label>Order Date</label>
                                            <div class="input-group">

                                                <input type="text" name="order_date" id="order_date" value="<?= $res_ed[0]->order_date; ?>" class="form-control" placeholder="Agents Info"> 
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label>Agent Info <a href="#" id="addagent" class="btn btn-outline dark" data-target="#stack1" data-toggle="modal" style="text-decoration: underline; font-size: 12px;
                                                                 margin-left: 30px;">Create New Agent</a></label>
                                            <div class="input-group">
                                                <div id="err_agn">
                                                    <select  class="selectpicker" id="sel_agent" name="agn_id" data-live-search="true" title="select Agent">
                                                        <?php
                                                        $sql_agent = "SELECT * FROM ex_agent where id!=''";
                                                        $row_agent = $database->select_query_array($sql_agent);
                                                        for ($i = 0; $i < count($row_agent); $i++) {
                                                            ?>
                                                            <option value="<?= $row_agent[$i]->id ?>" <?php
                                                            if (($row_agent[$i]->agn_name) == ($res_ed[0]->agn_name)) {
                                                                echo "selected";
                                                            }
                                                            ?>><?= $row_agent[$i]->agn_name . "-" . $res_ed[0]->agn_phone; ?></option>
                                                                <?php }
                                                                ?>
                                                    </select>
                                                </div>
                                                <table class="pdright5 mrg_top10">
                                                    <tbody><tr>
                                                            <td valign="top" style="min-width: 250px;" class="pdright5 mrg_top10">
                                                                <span>Agent Name</span><br>
                                                                <input type="hidden"  name="agnord_no" id="agnord_no" value="<?= $res_ed[0]->agn_no; ?>" class="form-control" readonly>
                                                                <input type="text"  name="agnord_name" id="agnord_name" value="<?= ucfirst($res_ed[0]->agn_name); ?>" class="form-control" readonly>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td valign="top" style="min-width: 250px;" class="pdright5">
                                                                <span>Agent Email</span><br>
                                                                <input type="text" name="agnord_email" id="agnord_email" value="<?= $res_ed[0]->agn_email ?>" class="form-control" readonly>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td valign="top" style="min-width: 250px;" class="pdright5">
                                                                <span>Agent Mobile</span><br>
                                                                <input type="text" name="agnord_mob" id="agnord_mob" value="<?= $res_ed[0]->agn_phone ?>" class="form-control" readonly>
                                                            </td>
                                                        </tr>

                                                    </tbody></table>
                                            </div>
                                        </div>
                                        <span>Prepared By Excellent Way Group</span> 
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>




                        <div class="col-md-4">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <?php
                                        if ($res_ed[0]->ord_view == 1) {
                                            $checked = "checked";
                                        }
                                        ?>
                                        <label class="mt-checkbox"> Viewed
                                            <input <?= $checked ?> type="checkbox" value="<?= $res_ed[0]->ord_view ?>" name="ord_view" id="ord_view">
                                            <span></span>
                                        </label>

                                        <div class="form-group">
                                            <label>CONTAINER INFO</label>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Container</label>
                                            <div id="err_cont">
                                                <select id="sel_cont" name="or_container"  class="selectpicker " data-live-search="true" title="select container">
                                                    <?php
                                                    $sql_container = "SELECT * FROM ex_container where id !=''";
                                                    $row_container = $database->select_query_array($sql_container);
                                                    for ($i = 0; $i < count($row_container); $i++) {
                                                        ?>
                                                        <option value="<?= $row_container[$i]->id ?>" <?php
                                                        if (($row_container[$i]->container_no) == ($res_ed[0]->container_no)) {
                                                            echo "selected";
                                                        }
                                                        ?>><?= $row_container[$i]->container_no ?></option>
                                                            <?php }
                                                            ?>                                          </select>
                                            </div>
                                        </div>

                                        <table>
                                            <tbody><tr>
                                                    <td valign="top" style="min-width: 140px;" class="pdright5">
                                                        <span>Conatiner#</span><br>
                                                        <input type="text"  name="cont_no" id="cont_no" value="<?= $res_ed[0]->container_no; ?>" class="form-control" readonly>
                                                    </td>
                                                    <td valign="top" style="min-width: 140px;">
                                                        <span>Container Size</span><br>
                                                        <input type="text" name="cont_sz" id="cont_sz" value="<?= $res_ed[0]->con_size ?>" class="form-control" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="min-width: 140px;" class="pdright5">
                                                        <span>Loading Date</span><br>
                                                        <input type="text" name="cont_ld" id="cont_ld" value="<?= $res_ed[0]->load_date ?>" class="form-control" readonly>
                                                    </td>
                                                    <td valign="top" style="min-width: 140px;">
                                                        <span>Sailing Date</span><br>
                                                        <input type="text" name="cont_sd" id="cont_sd" value="<?= $res_ed[0]->sail_date ?>" class="form-control" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="min-width: 140px;" class="pdright5">
                                                        <span>Closing Date</span><br>
                                                        <input type="text" name="cont_cd" id="cont_cd" value="<?= $res_ed[0]->close_date ?>" class="form-control" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="min-width: 140px;" class="pdright5">
                                                        <span>Origin Port</span><br>
                                                        <input type="text" name="cont_op" id="cont_op" value="<?= $res_ed[0]->origin_port ?>" class="form-control" readonly>
                                                    </td>
                                                    <td valign="top" style="min-width: 140px;" >
                                                        <span>Destination Port</span><br>
                                                        <input type="text" name="cont_dp" id="cont_dp" value="<?= $res_ed[0]->desn_port ?>" class="form-control" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" valign="top" style="min-width: 140px;">
                                                        <span>Container Status</span><br>
                                                        <input type="text" name="cont_cs" id="cont_cs" value="<?= $res_ed[0]->con_status ?>" class="form-control" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" valign="top" style="min-width: 140px;">
                                                        <span>Arrival Date</span><br>
                                                        <input type="text" name="arv_date" id="arv_date" value="" class="form-control" readonly>
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



                        <div class="col-md-12">


                            <div class="col-md-4"  >
                                <!-- BEGIN SAMPLE FORM PORTLET-->
                                <div class="portlet light bordered">

                                    <div class="portlet-body form">

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>From Location(Branch)</label>
                                                <div class="input-group">
                                                    <input type="hidden" name="fr_loc" id="fr_loc" value="<?= $fr_loc ?>" class="form-control" placeholder="Agents Info" readonly/> 
                                                    <input type="text" name="fr_locname" id="fr_locname" value="<?= $res_ed[0]->fr_locname ?>" class="form-control" placeholder="Agents Info" readonly/> 
                                                </div>
                                            </div>
                                            <table width="100%">
                                                <tbody><tr>
                                                        <td>
                                                            <span>Address:</span><br>
                                                            <textarea class="form-control" id="fr_addr" name="fr_addr" rows="5" cols="100"  readonly><?= $res_ed[0]->fr_locaddr; ?></textarea>

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Phone:&nbsp;<?= $res_ed[0]->fr_locphone ?>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Location:&nbsp;<?= $res_ed[0]->fr_locname ?>
                                                        </td>

                                                    </tr>

                                                </tbody></table>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="col-md-4" >
                                <!-- BEGIN SAMPLE FORM PORTLET-->
                                <div class="portlet light bordered">

                                    <div class="portlet-body form">


                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>To Location(Branch)</label>
                                                <div class="input-group">
                                                    <input type="hidden" name="to_loc" id="to_loc" value="<?= $to_loc; ?>">
                                                    <input type="text" class="form-control" name="loc_name" id="loc_name" value="<?= $res_ed[0]->to_locname ?>" readonly>

                                                </div>
                                            </div>
                                            <table width="100%">
                                                <tbody><tr>
                                                        <td>
                                                            <span>Address:</span><br>
                                                            <textarea class="form-control" id="to_addr" name="to_addr" rows="5" cols="100" readonly><?= $res_ed[0]->to_locaddr ?></textarea>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Phone:&nbsp;<?= $res_ed[0]->to_locphone ?>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Location:&nbsp;<?= $res_ed[0]->to_locname ?>
                                                        </td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>


            <div class="row">   
                <div class="col-md-8">   
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <span class="caption-subject font-dark sbold uppercase">Customer Info</span>
                            <div class="form-body row">


                                <div class="col-md-6">
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <div class="portlet light bordered">
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>Customers  <a href="#" id="addclient" class="btn btn-outline dark" data-target="#stack2" data-toggle="modal" style="text-decoration: underline; font-size: 12px;
                                                                         margin-left: 30px;">Create New Customer</a></label>
                                                    <div class="input-group">

                                                        <div id="err_cus">
                                                            <select id="sel_cus" name="or_selcus" class="selectpicker" data-live-search="true">
                                                                <?php
                                                                $sql_cus = "SELECT * FROM ex_clients where id !=''";
                                                                $row_cus = $database->select_query_array($sql_cus);
                                                                for ($i = 0; $i < count($row_cus); $i++) {
                                                                    ?>
                                                                    <option value="<?= $row_cus[$i]->id ?>" <?php
                                                                    if (($row_cus[$i]->cust_name) == ($res_ed[0]->cust_name)) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>><?= strtoupper($row_cus[$i]->cust_name) ?></option>
                                                                        <?php }
                                                                        ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table>
                                                    <tbody><tr>
                                                            <td valign="top" style="min-width: 140px;">
                                                                <span>Customer Email</span><br>
                                                                <input type="hidden" name="cus_no" id="cus_no" value="<?= $res_ed[0]->cus_id ?>" class="form-control" readonly>
                                                                <input type="hidden" name="cus_name" id="cus_name" value="<?= $res_ed[0]->cust_name ?>" class="form-control" readonly>
                                                                <input type="text" name="cus_email" id="cus_email" value="<?= $res_ed[0]->cust_email; ?>" class="form-control" readonly>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td valign="top" style="min-width: 140px;">
                                                                <span>Customer Mobile</span><br>
                                                                <input type="text" name="cus_mobile" id="cus_mobile" value="<?= $res_ed[0]->cust_phone; ?>" class="form-control" readonly>
                                                            </td>

                                                        </tr>


                                                    </tbody></table>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <div class="portlet light bordered">

                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>Bank</label>
                                                    <div id="err_bank">
                                                        <select id="sel_bank" class="form-control" name="or_bank">
                                                            <?php
                                                            $sql_bank = "SELECT * FROM ex_bank where id !=''";
                                                            $row_bank = $database->select_query_array($sql_bank);
                                                            for ($i = 0; $i < count($row_bank); $i++) {
                                                                ?>
                                                                <option value="<?= $row_bank[$i]->id ?>" <?php
                                                                if ($row_bank[$i]->bank_name == $res_ed[0]->bank_name) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?= strtoupper($row_bank[$i]->bank_name) ?></option>
                                                                    <?php }
                                                                    ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="bank_name" id="bank_name" value="<?= $res_ed[0]->bank_name; ?>" class="form-control" readonly>
                                                <table>
                                                    <tbody><tr>
                                                            <td valign="top" style="min-width: 140px;">
                                                                <span>Sort Code</span><br>
                                                                <input type="text" name="sort_code" id="sort_code" value="<?= $res_ed[0]->sort_code; ?>" class="form-control" readonly>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td valign="top" style="min-width: 140px;">
                                                                <span>Naira Account(&#8358;)</span><br>
                                                                <input type="text" name="naira_ac" id="naira_ac" value="<?= $res_ed[0]->naira_acc; ?>" class="form-control" readonly>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td valign="top" style="min-width: 140px;">
                                                                <span>Dollar Account($)</span><br>
                                                                <input type="text" name="dollar_ac" id="dollar_ac" value="<?= $res_ed[0]->dollar_acc; ?>" class="form-control" readonly>
                                                            </td>

                                                        </tr>


                                                    </tbody></table>

                                            </div>
                                        </div>


                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Item Description</label>
                                                <textarea class="form-control" id="item_desc" name="item_desc" rows="3"><?= $res_ed[0]->item_desc; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Freight Charge:</label>
                                                <span><?= number_format($res_ed[0]->agn_freight, 2); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Clearing Charge:</label>
                                                <span><?= number_format($res_ed[0]->agn_clearence, 2); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6" style="float:left !important;">
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
                                                        <input type="text" id="or_qty" name="or_qty" class="form-control" value="<?= $res_ed[0]->or_qty; ?>" placeholder="Enter Quantity"> </div>
                                                </div>

                                            </div>
                                        </div>

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
                            <span class="caption-subject font-dark sbold uppercase">Office Use</span>
                            <div class="form-body row">

                                <div class="col-md-6">
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
                                                        <input type="text" name="agn_freight" id="ag_fright" class="form-control fright groupOfTexbox" value="<?= $res_ed[0]->agn_freight; ?>" placeholder="0.00"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Company Freight Charges</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" name="comp_freight" id="cm_fright" value="<?= $res_ed[0]->comp_freight; ?>" class="form-control fright groupOfTexbox" placeholder="0.00"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Commission</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" name="comn_freight" id="comn_fr" value="<?= $res_ed[0]->comn_freight; ?>" class="form-control" placeholder="0.00" readonly=""> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
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
                                                        <input type="text" name="agn_clearence" id="ag_clearence" value="<?= $res_ed[0]->agn_clearence; ?>" class="form-control clearence groupOfTexbox" placeholder="0.00"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Company Clearing Charges</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" name="comp_clearence" id="cm_clearence" value="<?= $res_ed[0]->comp_clearence; ?>" class="form-control clearence groupOfTexbox" placeholder="0.00"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Commission</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" name="comn_clearence" id="comn_cl" value="<?= $res_ed[0]->comn_clearence; ?>" class="form-control" placeholder="0.00" readonly=""> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Total Sum</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" name="tot_sum" id="tot_sum" class="form-control" value="<?= $res_ed[0]->tot_sum; ?>" placeholder="0.00" readonly> </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mt-checkbox" style="margin-bottom:5px;">Lines
                                            <input type="checkbox" value="1" name="test" class="chk_line">
                                            <span></span>
                                        </label>
                                        <textarea class="form-control" name="line" rows="3" cols="30" id="ord_line" readonly><?= $res_ed[0]->line ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea class="form-control" name="remark" id="remark" rows="3"><?= $res_ed[0]->remark; ?></textarea>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Change Status</label>
                                        <select  class="form-control" name="status_type" id="chg_status">
                                            <option>select Status type</option>
                                            <option value="Not Ready for Collection" <?php
                                            if ((trim($res_ed[0]->order_status)) == "Not Ready for Collection") {
                                                echo "selected";
                                            }
                                            ?>>Not Ready for Collection</option>
                                            <option value="On Transit" <?php
                                            if ($res_ed[0]->order_status == "On Transit") {
                                                echo "selected";
                                            }
                                            ?>>On Transit</option>
                                            <option value="Cleared"<?php
                                            if ($res_ed[0]->order_status == "Cleared") {
                                                echo "selected";
                                            }
                                            ?>>Cleared</option>
                                            <option value="Not Ready for Collection"<?php
                                            if ($res_ed[0]->order_status == "Not Ready for Collection") {
                                                echo "selected";
                                            }
                                            ?>>Not Ready for Collection</option>
                                            <option value="Ready for Collection"<?php
                                            if ($res_ed[0]->order_status == "Ready for Collection") {
                                                echo "selected";
                                            }
                                            ?>>Ready for Collection</option>
                                            <option value="Collected"<?php
                                            if ($res_ed[0]->order_status == "Collected") {
                                                echo "selected";
                                            }
                                            ?>>Collected</option>
                                            <option value="Commision Paid"<?php
                                            if ($res_ed[0]->order_status == "Commision Paid") {
                                                echo "selected";
                                            }
                                            ?>>Commision Paid</option>
                                            <option value="Reminder"<?php
                                            if ($res_ed[0]->order_status == "Reminder") {
                                                echo "selected";
                                            }
                                            ?>>Reminder</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Status Changed Date</label>
                                        <input type="text" name="stchange_date" id="stchange_date" class="form-control" value="<?= $res_ed[0]->stchange_date ?>" placeholder="Last Status Changed Date" readonly/> 

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Origin Date & Time</label>
                                        <div class="controls input-append date form_datetime" data-date="2010-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="form-control" type="text" value="" id="orgn_datetime" name="orgn_datetime"   placeholder="Origin Date & Time" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>






                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dubai Payment Info</label>
                                    <textarea class="form-control" id="dxb_payinfo" name="dxb_payinfo" rows="5"><?= $res_ed[0]->dxb_payinfo ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Paid Amount</label>

                                    <input type="text" id="paid_amt" name="paid_amt" class="form-control" value="<?= $res_ed[0]->paid_amt ?>" placeholder="Paid Amount"> 

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Invoice Number</label>
                                    <input type="text" id="invoice_no" name="invoice_no" class="form-control" value="<?= $res_ed[0]->invoice_no ?>" placeholder="Enter Phone Number"> 

                                </div>
                            </div>

                            <div class="clearfix"></div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" id="up_order" class="btn blue">Update</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>
                            </div>
                            <!--complaint save/sms-->
                            <div class="col-md-12">	

                                <div class="portlet light bordered" style="border: 1px solid #c2cad8!important;">
                                    <div class="portlet-body form row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Delivery Details</label>
                                                <textarea class="form-control" id="del_details" name="del_details" rows="3"><?= $res_ed[0]->del_details ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Customer Complaints</label>
                                                <textarea class="form-control" id="cus_complaint" name="cus_complaint" rows="3"><?= $res_ed[0]->cus_complaint ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <button type="submit" name="" id="comp_sum" class="btn blue pull-right">Save/Send SMS</button>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>

                                <div class="clearfix"></div>

                            </div>
                            <!--end complaint save/sms-->                                                                       

                            <div class="clearfix"></div>


                        </div>

                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <!-- END SAMPLE FORM PORTLET-->
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <!-- END SAMPLE FORM PORTLET-->

                </div>

            </div>

            <!-- END DASHBOARD STATS 1-->






        </div>


        <div class="clearfix"></div> 
        <div class="row">

            <div class="col-md-12 pull-right">	

                <div class="portlet light bordered" style="border: 1px solid #c2cad8!important;">
                    <div class="portlet-body form row"> 



                        <form action="sendsms.php" accept-charset="UTF-8" class=" " method="post" name="form_sms" enctype="multipart/form-data" id="send_sms">
                            <input type="hidden" name="sms_orno" value="<?= $edit_id; ?>" class="form-control"> 
                            <input type="hidden" name="sms_usrno" value="<?= $res_ed[0]->cus_mobile ?>" class="form-control">
                            <input type="hidden" name="sms_status" value="send_sms" class="form-control"> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="9" cols="100" name="messages"><?= $res_ed[0]->to_locaddr ?>,&nbsp;phone:<?= $res_ed[0]->to_locphone ?>,pls pay to&nbsp;<?= $res_ed[0]->bank_name; ?>
,Dollar_Acct#:&nbsp;<?= $res_ed[0]->dollar_acc ?>,&nbsp;Naira_Acct#:&nbsp;<?= $res_ed[0]->naira_acc ?>,Clearing Chrg=&nbsp;<?= number_format($res_ed[0]->agn_clearence, 2); ?>(Naira)-Thx(<?= $res_ed[0]->order_no ?>)</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="send_sms" class="btn blue">Send SMS</button>
                                </div>

                            </div>
                        </form>
                        <form action="sendsms.php" accept-charset="UTF-8" class=" " method="post" name="form_mnsms" enctype="multipart/form-data" id="send_mnsms">
                            <input type="hidden" name="sms_orno" value="<?= $edit_id; ?>" class="form-control"> 
                            <input type="hidden" name="sms_status" value="manual_sms" class="form-control"> 
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Manual Message</label>
                                    <textarea class="form-control" rows="9" cols="100" id="manual_msg" name="manual_addr"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="manual_phone" id="manual_ph" class="form-control" placeholder="971500050000"> 
                                        <p class="font13">(Enter the phone number to send sms manually)</p>
                                    </div>

                                    <div class="col-md-6  form-group">
                                        <button type="submit" name="send_mnsms"  class="btn blue pull-right">Send Manual SMS</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"></div>
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
            var json_cn = jQuery.parseJSON(data);

            $('#cont_no').val(json_cn[0]);
            $('#cont_sz').val(json_cn[1]);
            $('#cont_ld').val(json_cn[2]);
            $('#cont_sd').val(json_cn[3]);
            $('#cont_cd').val(json_cn[4]);
            $('#cont_op').val(json_cn[5]);
            $('#cont_dp').val(json_cn[6]);
            $('#arv_date').val(json_cn[7]);
        });

    });

    $('#sel_agent').on('change', function () {

        var sel_agent = $(this).val();
        var status = "agent_info";
        var url = 'get_info.php';
        $('div#divLoading').addClass('show');
        $.post(url, {sel_agent: sel_agent, status: status}, function (data) {
            $('#divLoading').removeClass('show');
            var json_agn = jQuery.parseJSON(data);

            $('#agnord_no').val(json_agn[0]);
            $('#agnord_name').val(json_agn[1]);
            $('#agnord_email').val(json_agn[2]);
            $('#agnord_mob').val(json_agn[3]);

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
            var json_cus = jQuery.parseJSON(data)
            $('#cus_no').val(json_cus[0]);
            $('#or_customer').val(json_cus[1]);
            $('#cus_email').val(json_cus[2]);
            $('#cus_mobile').val(json_cus[3]);
        });

    });


</script>

<script>



    //update data
    $(document).ready(function () {
        $("#formID").submit(function () {

            Lobibox.confirm({
                iconClass: false,
                msg: 'Are you sure you want to edit the order booking details?',
                title: 'Edit Order Booking Details',
                callback: function ($this, type, e) {
                    if (type == 'yes') {
                        document.form_sub.submit();
                    }
                }
            });

            return false;
        });
    });

//sms
    $(document).ready(function () {
        $("#send_sms").submit(function () {

            Lobibox.confirm({
                iconClass: false,
                msg: 'Are you sure you want to sens SMS?',
                title: 'Send SMS',
                callback: function ($this, type, e) {
                    if (type == 'yes') {
                        document.form_sms.submit();
                    }
                }
            });

            return false;
        });
    });

    //manual sms
    $(document).ready(function () {
        $("#send_mnsms").submit(function () {
            if ($('#manual_msg').val() == '') {
                $('#manual_msg').css({'border': '1px solid red'});
                $('#manual_msg').focus();
            } else if ($('#manual_ph').val() == '') {
                $('#manual_msg').css({'border': '1px solid #ccc'});
                $('#manual_ph').css({'border': '1px solid red'});
                $('#manual_ph').focus();
            } else {
                Lobibox.confirm({
                    iconClass: false,
                    msg: 'Are you sure you want to sens Manual SMS?',
                    title: 'Send Manual SMS',
                    callback: function ($this, type, e) {
                        if (type == 'yes') {
                            document.form_mnsms.submit();
                        }
                    }
                });
            }
            return false;
        });
    });
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

//complaint save/sms

    $('#comp_sum').click(function () {
        alert("hiii");
    });

</script>
</body>
</html>
