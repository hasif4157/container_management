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
        <h1 class="page-title">Edit Staff
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="edit_staff" enctype="multipart/form-data">
                <div class="col-md-9">
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="up_id" value="<?=$edit_id?>">
                                        Employee No# <input type="text" name="emp_no" class="form-control red" value="<?= $res_ed['emp_no']; ?>" readonly>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Staff Name</label>
                                        <input type="text" name="st_name" value="<?= $res_ed['st_name']; ?>" class="form-control spinner" placeholder="Staff Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reporting To</label>
                                        <select class="form-control" name="rp_to">
                                            <option>--select--</option>
                                            <option value="india">India</option>
                                            <option value="dxb">DXB</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Employee Type</label>
                                        <select class="form-control" name="emp_type">
                                            <option>--select employee type--</option>
                                            <?php
                                            $sql_emp = mysqli_query($conn, "SELECT emp_type FROM emp_type where id !=''");
                                            while ($row_emp = mysqli_fetch_array($sql_emp)) {
                                                 ?>
                                            <option value="<?= $row_emp['emp_type']; ?>" <?php echo $row_emp['emp_type'] == $res_ed['emp_type'] ? 'selected="selected"' : '' ?>><?= $row_emp['emp_type'];?></option>
                                        <?php }
                                        ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name="st_desgn" value="<?= $res_ed['designation']; ?>" class="form-control spinner" placeholder="Designation">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Department</label>
                                        <select class="form-control" name="department">
                                            <option>--select department--</option>
                                            <?php
                                            $sql_dept = mysqli_query($conn, "SELECT department FROM ex_department where id !=''");
                                            while ($row_dept = mysqli_fetch_array($sql_dept)) {
                                                 ?>
                                            <option value="<?= $row_dept['department']; ?>" <?php echo $row_dept['department'] == $res_ed['department'] ? 'selected="selected"' : '' ?>><?= $row_dept['department'] ?></option>
                                        <?php }
                                        ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Visa Status</label>
                                        <select class="form-control" name="visa_status">
                                            <option>--select visa status--</option>
                                            <option value="Visit Visa" <?php echo $res_ed['visa_status'] == 'Visit Visa' ? 'selected="selected"' : '' ?>>Visit Visa</option>
                                            <option value="Employment Visa" <?php echo $res_ed['visa_status'] == 'Employment Visa' ? 'selected="selected"' : '' ?>>Employment Visa</option>
                                            <option value="Father Sponsor" <?php echo $res_ed['visa_status'] == 'Father Sponsor' ? 'selected="selected"' : '' ?>>Father Sponsor</option>
                                            <option value="Husband/Wife Sponsor" <?php echo $res_ed['visa_status'] == 'Husband/Wife Sponsor' ? 'selected="selected"' : '' ?>>Husband/Wife Sponsor</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">

                                        <label>Date of Joining(dd-mm-yyyy)</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="" type="text" value="<?=$res_ed['doj']?>" name="doj"  placeholder="Joining Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Web Page</label>
                                        <input type="text" name="web_page" value="<?=$res_ed['web_pages']?>" class="form-control spinner" placeholder="www.excellentwaycargo.com">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Working Method</label>
                                        <select class="form-control" name="work_method">
                                            <option>--select working method--</option>
                                            <option value="full time" <?php echo $res_ed['working_method'] == 'full time' ? 'selected="selected"' : '' ?>>Full Time</option>
                                            <option value="part time" <?php echo $res_ed['working_method'] == 'part time' ? 'selected="selected"' : '' ?>>Part Time</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emergency Contact Number</label>
                                        <input type="text" name="st_ecn" class="form-control spinner" value="<?=$res_ed['ecn']?>" placeholder="Emergency Contact Number">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Mobile</label>
                                        <input type="text" name="st_mobile" class="form-control spinner" value="<?=$res_ed['mobile']?>" placeholder="Mobile Number">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Office Email</label>
                                        <input type="text" name="off_email" class="form-control spinner" value="<?=$res_ed['off_email']?>" placeholder="Office Email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Office Phone</label>
                                        <input type="text" name="off_phone" class="form-control spinner" value="<?=$res_ed['off_phone']?>" placeholder="Office Phone">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="st_gender">
                                            <option>--select gender--</option>
                                            <option  value="male" <?php echo $res_ed['gender'] == 'male' ? 'selected="selected"' : '' ?>>Male</option>
                                            <option value="female" <?php echo $res_ed['gender'] == 'female' ? 'selected="selected"' : '' ?>>Female</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>City</label>
                                        <input type="text" name="st_city" class="form-control spinner" value="<?=$res_ed['city']?>" placeholder="Enter City">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Home Phone</label>
                                        <input type="text" name="hm_phone" class="form-control spinner" value="<?=$res_ed['hm_phone']?>" placeholder="Home Phone">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>State</label>
                                        <input type="text" name="st_state" class="form-control spinner" value="<?=$res_ed['state']?>" placeholder="Enter State">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Personal Email</label>
                                        <input type="text" name="pr_email" class="form-control spinner" value="<?=$res_ed['pr_email']?>" placeholder="Personal Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Postal</label>
                                        <input type="text" name="postal" class="form-control spinner" value="<?=$res_ed['postal']?>" placeholder="Postal">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" name="st_country">
                                            <option>--select country--</option>
                                            <?php
                                            $sql_pc_filt = mysqli_query($conn, "SELECT country_name FROM apps_countries where id !=''");
                                            while ($row_pc_filt = mysqli_fetch_array($sql_pc_filt)) {
                                                 ?>
                                            <option value="<?= $row_pc_filt['country_name']; ?>" <?php echo $row_pc_filt['country_name'] == $res_ed['country'] ? 'selected="selected"' : '' ?>><?= $row_pc_filt['country_name'] ?></option>
                                        <?php }
                                        ?>

                                        </select>
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
                <div class="form-actions">
                    <button type="submit" class="btn blue">Update</button>
                    <button type="button" class="btn default">Cancel</button>
                </div> 
            </form>

        </div>


        <div id="prefix_1241741341198" class="edit_staff custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Staff Data Edited Successfully
        </div>

    </div>
    <!-- END DASHBOARD STATS 1-->






</div>

<?php
include('footer.php');
?>
<script>

    $('#edit_staff').submit(function (e) {
        e.preventDefault();

        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to edit the Staff Details?',
            title: 'Edit Staff Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    //$('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_edit_staff.php'
                        , data: data
                        , cache: false
                        , contentType: false
                        , processData: false
                        , type: 'POST'
                        , success: function (data) {
                            $('#divLoading').removeClass('show');
                            $('.edit_staff').show();
                            $('.edit_staff').fadeOut(3000);
                            window.setTimeout(function () {

                                // Move to a new location or you can do something else
                                window.location.href = "manage_staff.php";

                            }, 3100);

                        }
                    });
                }
            }
        });
        return false;
    });
</script>
</body>

</html>