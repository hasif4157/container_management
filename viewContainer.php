<?php
require_once('settings.php');
include('header.php');

$edit_id = $_GET['id'];
$sql_ed = "select * from ex_container where id=$edit_id";
$qry_ed = $conn->query($sql_ed);
$res_ed = $qry_ed->fetch_array();
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
                    <a href="manage_container.php">Manage Container</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Container</span>
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
        <h1 class="page-title">Edit Container
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="edit_cotainer" enctype="multipart/form-data">
                <div class="col-md-9">
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="up_id" value="<?= $edit_id ?>">
                                        Container No# <input type="text" name="container_no" class="form-control red" value="<?= $res_ed['container_no'] ?>" readonly>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Loading Date</label>
                                        <input type="text" name="container_no" class="form-control" value="<?= $res_ed['load_date'] ?>" readonly>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination of Offloading</label>
                                        <input type="text" name="container_no" class="form-control" value="<?= $res_ed['desn_off'] ?>" readonly>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Sailing Date</label>
                                        <input type="text" name="container_no" class="form-control" value="<?= $res_ed['sail_date'] ?>" readonly>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Origin Port</label>
                                        <input type="text" name="origin_port" value="<?= $res_ed['origin_port'] ?>" class="form-control spinner" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Closing Date</label>
                                        <input type="text" name="origin_port" value="<?= $res_ed['close_date'] ?>" class="form-control spinner" readonly>
                                       
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination Port</label>
                                        <input type="text" name="desn_port" value="<?= $res_ed['desn_port'] ?>" class="form-control spinner" readonly>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">

                                        <label>Expected Date</label>
                                         <input type="text" name="desn_port" value="<?= $res_ed['exp_date'] ?>" class="form-control spinner" readonly>
                                        

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Origin Date & Time</label>
                                        <input type="text" name="desn_port" value="<?= $res_ed['org_date'] ?>" class="form-control spinner" readonly>
                                       
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Expected Date Of Offloading</label>
                                        <input type="text" name="desn_port" value="<?= $res_ed['exp_off'] ?>" class="form-control spinner" readonly>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination Date & Time</label>
                                        <input type="text" name="desn_port" value="<?= $res_ed['desn_date'] ?>" class="form-control spinner" readonly>
                                       
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Container Status</label>
                                        <input type="text" name="desn_port" value="<?= $res_ed['con_status'] ?>" class="form-control spinner" readonly>
                           
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Size</label>
                                        <input type="text" name="con_size" value="<?= $res_ed['con_size'] ?>" class="form-control spinner" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Clearing Agent Information</label>
                                        <textarea class="form-control" name="clr_agninfo" rows="3" readonly><?= $res_ed['clr_agninfo'] ?></textarea>
                                    </div>
                                </div>


                            </div>
                        </div> 
                        <div class="clearfix"></div>
                    </div>
                </div> 

                <div class="col-md-3">
                    <h5>Last 10 locations of this container</h5>  
                </div>
                <div class="clearfix"></div>
                <div class="form-actions">
                    <button type="submit" class="btn blue">Update</button>
                    <button type="button" class="btn default">Cancel</button>
                </div> 
            </form>

        </div>

        <!-- END DASHBOARD STATS 1-->




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


</body>

</html>