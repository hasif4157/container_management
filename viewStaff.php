<?php
require_once('settings.php');
include('header.php');
$edit_id = $_GET['id'];
$sql_ed = "select * from ex_staff where id=$edit_id";
$qry_ed = $conn->query($sql_ed);
$res_ed = $qry_ed->fetch_array();
?>


<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div id="get_data"></div>
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
                    <a href="manage_staff.php">Manage Staff</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Staff</span>
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
        <h1 class="page-title">View Staff
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

                <div class="col-md-9">
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>
                                       Employee No# <input type="text" name="emp_no" class="form-control red" value="<?= $res_ed['emp_no']; ?>" readonly>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Staff Name</label>
                                        <input type="text" name="st_name" value="<?= $res_ed['st_name']; ?>" class="form-control spinner" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reporting To</label>
                                        <input type="text" name="st_name" value="<?= $res_ed['reporting_to']; ?>" class="form-control spinner" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Employee Type</label>
                                        <input type="text" name="st_name" value="<?= $res_ed['emp_type']; ?>" class="form-control spinner" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name="st_desgn" value="<?= $res_ed['designation']; ?>" class="form-control spinner" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Department</label>
                                        <input type="text" name="st_desgn" value="<?= $res_ed['department']; ?>" class="form-control spinner" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Visa Status</label>
                                        <input type="text" name="st_desgn" value="<?= $res_ed['visa_status']; ?>" class="form-control spinner" readonly>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">

                                        <label>Date of Joining(dd-mm-yyyy)</label>
                                        <input type="text" name="st_desgn" value="<?= $res_ed['doj']; ?>" class="form-control spinner" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Web Page</label>
                                        <input type="text" name="web_page" value="<?=$res_ed['web_pages']?>" class="form-control spinner"  readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Working Method</label>
                                        <input type="text" name="web_page" value="<?=$res_ed['working_method']?>" class="form-control spinner"  readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emergency Contact Number</label>
                                        <input type="text" name="st_ecn" class="form-control spinner" value="<?=$res_ed['ecn']?>"  readonly>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Mobile</label>
                                        <input type="text" name="st_mobile" class="form-control spinner" value="<?=$res_ed['mobile']?>"  readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Office Email</label>
                                        <input type="text" name="off_email" class="form-control spinner" value="<?=$res_ed['off_email']?>"  readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Office Phone</label>
                                        <input type="text" name="off_phone" class="form-control spinner" value="<?=$res_ed['off_phone']?>" readonly>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input type="text" name="off_phone" class="form-control spinner" value="<?=$res_ed['gender']?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>City</label>
                                        <input type="text" name="st_city" class="form-control spinner" value="<?=$res_ed['city']?>"  readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Home Phone</label>
                                        <input type="text" name="hm_phone" class="form-control spinner" value="<?=$res_ed['hm_phone']?>"  readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>State</label>
                                        <input type="text" name="st_state" class="form-control spinner" value="<?=$res_ed['state']?>"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Personal Email</label>
                                        <input type="text" name="pr_email" class="form-control spinner" value="<?=$res_ed['pr_email']?>"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Postal</label>
                                        <input type="text" name="postal" class="form-control spinner" value="<?=$res_ed['postal']?>"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" name="postal" class="form-control spinner" value="<?=$res_ed['country']?>"  readonly>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="clearfix"></div>
                    </div>
                </div> 

                <div class="col-md-3">
                    <h5>Head of the Following Division</h5>  
                </div>
                <div class="clearfix"></div>
            

        </div>


        

    </div>
    <!-- END DASHBOARD STATS 1-->






</div>

<?php
include('footer.php');
?>

</body>

</html>