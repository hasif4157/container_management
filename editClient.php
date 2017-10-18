<?php
require_once('settings.php');
include('header.php');

$edit_id = $_GET['id'];
$sql_ed = "select * from ex_clients where id=$edit_id";
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
                    <a href="manage_client.php">Manage Clients</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Client</span>
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
        <h1 class="page-title">Edit Client
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="edit_client" enctype="multipart/form-data">
                <div class="col-md-6">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">

                            <div class="form-body">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="up_id"  value="<?= $edit_id; ?>">
                                        Customer No# <input type="text" name="cust_no" class="form-control red" value="<?= $res_ed['cust_no'] ?>" readonly>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="cust_name" class="form-control" value="<?= $res_ed['cust_name'] ?>" placeholder="Enter Name"> </div>
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="cust_cat">
                                        <option>--select Category--</option>
                                        <option value="Office" <?php echo strtoupper($res_ed['cust_category']) == 'OFFICE' ? 'selected="selected"' : '' ?>>Office</option>
                                        <option value="Developer" <?php echo strtoupper($res_ed['cust_category']) == 'DEVELOPER' ? 'selected="selected"' : '' ?>>Developer</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="cust_addr" rows="3"><?= $res_ed['cust_addr']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="cust_email" class="form-control" value="<?= $res_ed['cust_email']; ?>" placeholder="Email Address"> </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="cust_phone" class="form-control" value="<?= $res_ed['cust_phone']; ?>" placeholder="Enter Phone Number"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="cust_city" class="form-control" value="<?= $res_ed['cust_city']; ?>" placeholder="Enter City"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>State</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="cust_state" class="form-control" value="<?= $res_ed['cust_state']; ?>" placeholder="Enter State"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control" name="cust_country">
                                        <option>--select country--</option>
                                        <?php
                                        $sql_country = mysqli_query($conn, "SELECT country_name FROM apps_countries where id !=''");
                                        while ($row_country = mysqli_fetch_array($sql_country)) {
                                            ?>
                                            <option value="<?= $row_country['country_name'] ?>" <?php echo $row_country['country_name'] == $res_ed['cust_country'] ? 'selected="selected"' : '' ?>><?= $row_country['country_name'] ?></option>
                                        <?php }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-fax" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="cust_zip" class="form-control" value="<?= $res_ed['cust_zip']; ?>" placeholder="Enter Zip Code"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Web Page</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-link" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="cust_web" class="form-control" value="<?= $res_ed['cust_web']; ?>" placeholder="enter web address"> 
                                    </div>
                                </div>



                                <div class="form-actions">
                                    <button type="submit" class="btn blue">Update</button>
                                    <a href="manage_client.php"><button type="button" class="btn default">Cancel</button></a>
                                </div>

                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                        <!-- BEGIN SAMPLE FORM PORTLET-->

                        <!-- END SAMPLE FORM PORTLET-->
                        <!-- BEGIN SAMPLE FORM PORTLET-->

                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                    <div class="col-md-6">



                    </div>
                </div>

            </form>
            <!-- END DASHBOARD STATS 1-->


        </div>
        <div id="prefix_1241741341198" class="edit_client custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Client Data Edited Successfully
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

    $('#edit_client').submit(function (e) {
        e.preventDefault();
        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to Edit the Client Data?',
            title: 'Edit Client Data',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_edit_client.php'
                        , data: data
                        , cache: false
                        , contentType: false
                        , processData: false
                        , type: 'POST'
                        , success: function (data) {
                            $('#divLoading').removeClass('show');
                            if(data == 1){
                    Lobibox.notify('success', {
                        delay: false,
                        sound: true,
                         closeOnEsc:  window.setTimeout(function(){
window.location.href = "manage_client.php";

    }, 2000),
                       
                        title: 'Success',
                        msg: 'Success Message : Client Edited Successfully' 
                    });
                }
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
