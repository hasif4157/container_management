<?php
require_once('settings.php');
include('header.php');
if (isset($_POST['process']) && $_POST['process'] == '1') {

    $ad_status = $_POST['ad_status'];
    $ad_orno = $_POST['ad_orno'];
    $ad_agno = $_POST['ad_agno'];
    $ad_cus = $_POST['ad_cus'];
    $ad_contno = $_POST['ad_contno'];
    $ad_agname = $_POST['ad_agname'];
    $ad_cusph = $_POST['ad_cusph'];
    $ad_agph = $_POST['ad_agph'];
    $ad_qty = $_POST['ad_qty'];

    if (!empty($ad_status)) {
        $adv_st = "AND order_status='" . $ad_status . "'";
    } else {
        $adv_st = '';
    }

    if (!empty($ad_orno)) {
        $adv_orno = "AND order_no='" . $ad_orno . "'";
    } else {
        $adv_orno = '';
    }

    if (!empty($ad_agno)) {
        $adv_agno = "AND or_agnum='" . $ad_agno . "'";
    } else {
        $adv_agno = '';
    }

    if (!empty($ad_cus)) {
        $adv_cus = "AND or_customer='" . $ad_cus . "'";
    } else {
        $adv_cus = '';
    }


    if (!empty($ad_contno)) {
        $adv_contno = "AND cont_no='" . $ad_contno . "'";
    } else {
        $adv_contno = '';
    }

    if (!empty($ad_agname)) {
        $adv_agname = "AND or_agent='" . $ad_agname . "'";
    } else {
        $adv_agname = '';
    }

    if (!empty($ad_cusph)) {
        $adv_cusph = "AND cus_mobile='" . $ad_cusph . "'";
    } else {
        $adv_cusph = '';
    }

    if (!empty($ad_agph)) {
        $adv_agph = "AND agn_mobile='" . $ad_agph . "'";
    } else {
        $adv_agph = '';
    }


    $sql_order = "SELECT * FROM ex_order where id != '' $adv_st $adv_orno $adv_agno $adv_cus $adv_contno $adv_agname $adv_cusph  ORDER BY id desc";
    $qry_order = mysqli_query($conn, $sql_order);
    $num_rows = mysqli_num_rows($qry_order);
} else {
    $sql_order = "SELECT * FROM ex_order ORDER BY id desc";
    $qry_order = mysqli_query($conn, $sql_order);
    $num_rows = mysqli_num_rows($qry_order);
}
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
                    <span>Manage Order Booking</span>
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
        <div class="form-group">
            <a href="order_booking.php" class="btn green-meadow btn-sm">New Order Booking</a>
            <a href="exorder_xls.php" class="btn green-meadow btn-sm">Export</a>
        </div>


        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <form method="post" name="search_form" class="color_search " action="#">
                <div class="col-md-12">

                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <div class="portlet light bordered">
                        <span class="caption-subject bold uppercase">Advance Search</span>
                        <div class="portlet-body form">

                            <div class="form-body">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="ad_status">
                                            <option value="">--select status--</option>
                                            <option value="On Transit">On Transit</option>
                                            <option value="Clearing InProcess">Clearing InProcess</option>
                                            <option value="Not Ready for collection">Not Ready for collection</option>
                                            <option value="Ready for collection">Ready for collection</option>
                                            <option value="Collected">Collected</option>
                                            <option value="Commision Paid">Commision Paid</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Order No#</label>
                                        <div class="input-group">
                                            <input type="text" name="ad_orno" class="form-control" placeholder="Order No#"> </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Agent No#</label>
                                        <div class="input-group">
                                            <input type="text" name="ad_agno" class="form-control" placeholder="Agent No#"> </div>
                                    </div>
                                </div>
                                <div class="col-md-3">	
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <div class="input-group">
                                            <input type="text" name="ad_cus" class="form-control" placeholder="Enter Customer Name"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Container No#</label>
                                        <div class="input-group">
                                            <input type="text" name="ad_contno" class="form-control" placeholder="Container No#"> </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Agent Name</label>
                                        <div class="input-group">
                                            <input type="text" name="ad_agname" class="form-control" placeholder="Enter Agent Name"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Customer Phone</label>
                                        <div class="input-group">
                                            <input type="text" name="ad_cusph" class="form-control" placeholder="Enter Customer Phone"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Agent Phone</label>
                                        <div class="input-group">
                                            <input type="text" name="ad_agph" class="form-control" placeholder="Enter Customer Phone"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <div class="input-group">
                                            <input type="text" name="ad_qty" class="form-control" placeholder="Enter Quantity"> 
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <button type="submit" class="btn blue mrg15">Search</button>
                                        <button type="button" class="btn default">Cancel</button>
                                        <input type="hidden" name="process" value="1" />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>


                </div>
            </form>
        </div>
        <div class="clearfix"></div>
        <div class="row">


            <div class="table-scrollable">
                <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Sl No.</th>
                            <th scope="col">Order No#/Order Date</th>
                            <th scope="col">Freight Chrg</th>
                            <th scope="col">Clearing Chrg</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Container#/Container Status</th>
                            <th scope="col">Agent Details</th>
                            <th scope="col">Prepared By</th>
                            <th scope="col">Remarks</th>
                            <th scope="col">AWB</th>
                            <th scope="col">Action</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $slno = 1;
                        if ($num_rows > 0) {
                            while ($row_order = $qry_order->fetch_assoc()) {
                                $id = $row_order['id'];
                                ?>
                                <tr class="text-center" id="delid_<?= $id ?>">
                                    <td id="delid_<?= $id ?>"><?= $slno ?></td>
                                    <td id="delid_<?= $id ?>"><?= $row_order['order_no'] . "<br>" . $row_order['order_date']; ?></td>
                                    <td id="delid_<?= $id ?>"><?= $row_order['agn_freight'] ?></td>
                                    <td id="delid_<?= $id ?>"><?= $row_order['agn_clearence'] ?></td>
                                    <td id="delid_<?= $id ?>"><?= $row_order['order_status'] ?></td>
                                    <td id="delid_<?= $id ?>"><?= $row_order['or_customer'] ?></td>
                                    <td id="delid_<?= $id ?>"><?= $row_order['or_qty'] ?></td>
                                    <td id="delid_<?= $id ?>"><?= $row_order['cont_no'] . "<br>" . $row_order['cont_cs']; ?> </td>
                                    <td id="delid_<?= $id ?>"><?= $row_order['or_agent']; ?></td>
                                    <td id="delid_<?= $id ?>"><?= $row_order['order_no'] ?></td>
                                    <td id="delid_<?= $id ?>">Remark</td>
                                    <td id="delid_<?= $id ?>"><a href="awb.php?id=<?= $id; ?>" class="delete" id="<?= $id ?>">
                                            AWB
                                        </a></td>

                                    <?php
                                    $sql_orpr = mysqli_query($conn, "SELECT * from crm_owner where id='" .$_SESSION['user_id']. "'");
                                    $res_orpr = mysqli_fetch_array($sql_orpr);
                                    $view_or = "disnone";
                                    $edit_or = "disnone";
                                    $delete_or = "disnone";
                                    $privilege_array = '';
                                    $privilege_explode = explode(",", $res_orpr['privileges']);
                                    for ($j = 0; $j <= 44; $j++) {
                                        if (!empty($privilege_explode[$j])) {
                                            if ($privilege_explode[$j] == 33) {
                                                $view_or = "";
                                            }
                                            if ($privilege_explode[$j] == 34) {
                                                $edit_or = "";
                                            }
                                            if ($privilege_explode[$j] == 35) {
                                                $delete_or = "";
                                            }
                                        }
                                    }
                                    ?>

                                    <td id="delid_<?= $id ?>"> 
                                        <a href="order_details.php?id=<?= $id; ?>" class="delete <?= $view_or?>" id="<?= $id ?>" >
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="javascript:;" class="delete <?= $edit_or?>" id="<?= $id; ?>" onClick="delete_row('<?= $id; ?>')">
                                            <i class="fa fa-trash-o fa_font" aria-hidden="true"></i>
                                        </a>

                                        <a href="viewLoc.php?id=<?= $id; ?>" class="delete <?= $delete_or?>" id="<?= $id ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a> </td>



                                </tr>
        <?php
        $slno++;
    }
}
?>
                    </tbody>
                </table>
            </div>






        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->


    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
include('footer.php');
?>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    function delete_row(id) {

        var del_id = id;
        var url = 'deleteOrder.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to delete the Order?',
            title: 'Delete Order',
            callback: function ($this, type, e) {
                if (type == 'yes') {

                    $.post(url, {del_id: del_id}, function (data) {
                        $('#delid_' + id).hide(2000);
                        window.setTimeout(function () {

                            // Move to a new location or you can do something else
                            location.reload();

                        }, 2100);

                    });
                }
            }
        });
    }
</script>
</body>


</html>
