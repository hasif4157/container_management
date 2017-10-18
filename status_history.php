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
                         <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Status History</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $slno = 1;
                    $sql_loc = "SELECT * FROM ex_order ORDER BY id desc";
                    $qry_loc = mysqli_query($conn, $sql_loc);
                    while ($row_loc = $qry_loc->fetch_assoc()) {
                        $id = $row_loc['id'];
                    ?>
                    <tr class="text-center">
                         <td><?php echo $slno; ?></td>
                            <td><?php echo $row_loc['order_no']; ?></td>
                             <td><?php echo $row_loc['order_status']; ?></td>
                            <td>
                            <a href="view_status_history.php?orderid=<?=$id;?>" class="delete <?= $delete_or?>" id="<?=$id?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>

                        </tr>
                        <?php $slno++;
                    } ?>
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

