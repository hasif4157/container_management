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
                    <span>Status History</span>
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
        </div>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
            <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover order_table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Sl No.</th>
                        <th scope="col" class="text-center">Order No</th>
                         <th scope="col" class="text-center">User</th>
                         <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $slno = 1;
                    $sql_loc = "SELECT * FROM ex_status_history where order_id='".$_GET['orderid']."'";
                    $qry_loc = mysqli_query($conn, $sql_loc);
                    $nums=mysqli_num_rows($qry_loc);
                    if($nums>0){
                    while ($row_loc = $qry_loc->fetch_array()) {
                        $id = $row_loc['id'];
                        
                        ?>
                    <tr class="text-center">
                         <td><?php echo $slno; ?></td>
                            <td><?php 
                            $sql_ord = "SELECT * FROM `ex_order` where id='".$_GET['orderid']."'";
                            $qry_ord = mysqli_query($conn, $sql_ord);
                            $row_ord = $qry_ord->fetch_assoc();
                            echo $row_ord['order_no'];
                            ?></td>
                            <td><?php 
                              $sql_user = "SELECT * FROM `crm_owner` where id='".$row_loc['user_id']."'";
                            $qry_user = mysqli_query($conn, $sql_user);
                            $row_user= $qry_user->fetch_assoc();
                            echo $row_user['user_name'];
                            ?></td>
                             <td><?php echo $row_loc['status_value']; ?></td>
                            <td>
                           <?php echo $row_loc['date']; ?>
                            </td>

                        </tr>
                        <?php $slno++;
                    }}else{ ?>
                    <tr><td colspan="5">No Data Available in the table</td></tr>
                    <? }?>
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
</body>
</html>

