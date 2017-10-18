<?php
include('header.php');
require_once('settings.php');
$edit_id = $_GET['id'];
$sql_ed = "select * from emp_type where id=$edit_id";
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
                    <a href="manage_emptype.php">Manage Employee Type</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Employee Type</span>
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
        <h1 class="page-title">Edit Employee Type
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div id="prefix_1241741341198" class="edit_emptype custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Employee Type Edited Successfully
        </div>
        <div class="row">
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="edit_emptype" enctype="multipart/form-data">
                <div class="col-md-6">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">

                            <div class="form-body">
                                <div class="form-group">
                                    <label>Employee Type Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">

                                        </span>
                                        <input  type="hidden" name="up_id" value="<?= $edit_id ?>">
                                        <input type="text" name="emp_type" class="form-control" value="<?= $res_ed['emp_type']; ?>" placeholder="Enter Employee Type Name"> </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn blue">Update</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>

                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <!-- END SAMPLE FORM PORTLET-->
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </form>
            <div class="col-md-6">



            </div>
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
<script>
    $('#edit_emptype').submit(function (e) {
        e.preventDefault();
        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to Edit the Employee Type?',
            title: 'Edit Employee Type',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'editEmptype.php'
                        , data: data
                        , cache: false
                        , contentType: false
                        , processData: false
                        , type: 'POST'
                        , success: function (data) {
                            $('#divLoading').removeClass('show');
                            if (data == 1) {
                                $('.edit_emptype').show();
                                $('.edit_emptype').fadeOut(3000);
                                window.setTimeout(function () {

                                    // Move to a new location or you can do something else
                                    window.location.href = "manage_emptype.php";
                                }, 3100);
                            }
                        }
                    });
                }
            }
        });
        return false;
    });
</script>
