<?php
require_once('settings.php');
include('header.php');
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
                            <th scope="col">Destination</th>
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
                        $database=new database();
                        $slno = 1;
                        $sql_order = "SELECT O.*,U.user_name,T.loc_name,C.cust_name,CN.container_no,CN.con_status,A.agn_name FROM ex_order O LEFT JOIN ex_agent A ON A.id=O.agent_id LEFT JOIN ex_container CN ON CN.id=O.container_id LEFT JOIN ex_clients C ON C.id=O.cus_id LEFT JOIN to_location T ON T.id=O.to_loc  LEFT JOIN crm_owner U ON U.id=O.user_id where O.status=1 ORDER BY O.id desc";
                        $order_res=$database->select_query_array($sql_order);
                      
                        $num_rows = $database->rows($sql_order);
                        if ($num_rows > 0) {

                            $goods_collected = "#ffffff";
                            $not_ready_for_collection = "#E8E51A";
                            $ready_for_collection = "green";
                            $Commission_paid = "#df0b0b";
                            $remarks = "#c510e6";
                            for($i=0;$i<count($order_res);$i++) {
                                $id = $order_res[$i]->id;
                                if ($order_res[$i]->order_status == "Collected" && $order_res[$i]->remark == NULL) {
                                    $row_colour = $goods_collected;
                                    
                                } else if ($order_res[$i]->order_status == "Not Ready for Collection" && $order_res[$i]->remark == NULL) {
                                    $row_colour = $not_ready_for_collection;
                                } else if ($order_res[$i]->order_status == "Ready for Collection" && $order_res[$i]->remark == NULL) {
                                    $row_colour = $ready_for_collection;
                                    $font_color = "color:#ffffff !important";
                                } else if ($order_res[$i]->order_status == "Commision Paid" && $order_res[$i]->remark == NULL) {
                                    $row_colour = $Commission_paid;
                                    $font_color = "color:#ffffff !important";
                                } else {
                                    $row_colour = $remarks;
                                }
                                ?>
                                <tr class="text-center" style="background:<?=$row_colour?> !important;<?=$font_color?>;"  id="delid_<?= $id ?>">
                                    <td style="background:<?=$row_colour?> !important;" id="delid_<?= $id ?>"><?= $slno ?></td>
                                    <td id="delid_<?= $id ?>"><?= $order_res[$i]->order_no . "<br>" .$order_res[$i]->order_date ?></td>
                                    <td id="delid_<?= $id ?>"><?= $order_res[$i]->agn_freight ?></td>
                                    <td id="delid_<?= $id ?>"><?= $order_res[$i]->agn_clearence ?></td>
                                    <td id="delid_<?= $id ?>"><?= $order_res[$i]->order_status ?></td>
                                    <td id="delid_<?= $id ?>"><?= $order_res[$i]->loc_name ?></td>
                                    <td id="delid_<?= $id ?>"><?= $order_res[$i]->cust_name ?></td>
                                    <td id="delid_<?= $id ?>"><?= $order_res[$i]->or_qty ?></td>
                                    <td id="delid_<?= $id ?>"><?= "#".$order_res[$i]->container_no . "<br>" . $order_res[$i]->con_status ?> </td>
                                    <td id="delid_<?= $id ?>"><?= $order_res[$i]->agn_name ?></td>
                                    <td id="delid_<?= $id ?>"><?= $order_res[$i]->user_name ?></td>
                                    <td id="delid_<?= $id ?>">
                                        <a href="#" data-toggle="tooltip" title="<?= $order_res[$i]->remark ?>"><?php 
                                        if($order_res[$i]->remark != ''){
                                        echo substr($order_res[$i]->remark, 0, 4)."....";
                                        }
                                        else {
                                            echo "NA";
                                        }
                                        ?></a>
                                    </td>
                                    <td id="delid_<?= $id ?>"><a href="awb.php?id=<?= $id; ?>" class="delete" id="<?= $id ?>">
                                            AWB
                                        </a></td>

        <?php
        $sql_orpr = "SELECT * from crm_owner where id='" . $_SESSION['user_id'] . "'";
        $orpr_res=$database->select_query_array($sql_orpr);
        
        $view_or = "disnone";
        $edit_or = "disnone";
        $delete_or = "disnone";
        $privilege_array = '';
        $privilege_explode = explode(",", $orpr_res[0]->privileges);
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
                                        <a href="order_details.php?id=<?= $id; ?>" class="delete <?= $view_or ?>" id="<?= $id ?>" >
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="javascript:;" class="delete <?= $edit_or ?>" id="<?= $id; ?>" onClick="delete_row('<?= $id; ?>')">
                                            <i class="fa fa-trash-o fa_font" aria-hidden="true"></i>
                                        </a>

                                        <a href="viewLoc.php?id=<?= $id; ?>" class="delete <?= $delete_or ?>" id="<?= $id ?>">
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

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    function delete_row(id) {

        var del_id = id;
        var status = "delete_or";
        var url = 'deleteOrder.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to delete the Order?',
            title: 'Delete Order',
            callback: function ($this, type, e) {
                if (type == 'yes') {

                    $.post(url, {del_id: del_id, status: status}, function (data) {
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
