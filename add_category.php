<?php
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
                    <a href="manage_category.php">Manage Category</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Category</span>
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
        <h1 class="page-title">Add Category
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div id="prefix_1241741341198" class="add_category custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Category Data Added Successfully
        </div>
        <div class="row">
            
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="add_category" enctype="multipart/form-data">
                <div class="col-md-6">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
                          
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">

                                            </span>
                                            <input type="text" name="add_cat" class="form-control" placeholder="Enter Category Name"> </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn blue">Submit</button>
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
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
include('footer.php');
?>
<script>
    $('#add_category').submit(function (e) {
        e.preventDefault();

        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to Add Category?',
            title: 'Add Category',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'addCategory.php'
                        , data: data
                        , cache: false
                        , contentType: false
                        , processData: false
                        , type: 'POST'
                        , success: function (data) {
                            $('#divLoading').removeClass('show');
                            if (data == 1) {
                                $('.add_category').show();
                                $('.add_category').fadeOut(3000);
                                window.setTimeout(function () {

                                    // Move to a new location or you can do something else
                                    window.location.href = "manage_category.php";

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