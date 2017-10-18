<?php
require_once('settings.php');
include('header.php');

$sql_custno = mysqli_query($conn, "SELECT id FROM ex_clients order by id desc limit 1");
$num_custno = mysqli_num_rows($sql_custno);
$qry_custno = mysqli_fetch_array($sql_custno);

if ($num_custno > 0) {
    $str = $qry_custno['id'] + 1;
    $cust_no = "CUS" . str_pad($str, 5, "0", STR_PAD_LEFT);
} else {
    $str = 1;
    $cust_no = "CUS" . str_pad($str, 5, "0", STR_PAD_LEFT);
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
                    <a href="manage_client.php">Manage Clients</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Client</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm"  data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Add Client
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="add_client" enctype="multipart/form-data">
                <div class="col-md-6">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">

                            <div class="form-body">
                                <div class="form-group">
                                    <label>
                                        Customer No# <input type="text" name="cust_no" class="form-control red" value="<?= $cust_no ?>" readonly>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Name(Required)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" id="cust_name" name="cust_name" class="form-control" placeholder="Enter Name"> </div>
                                </div>

                                <div class="form-group">
                                    <label>Category(Required)</label>
                                    <select class="form-control" id="cust_cat" name="cust_cat">
                                        <option value="">--select Category--</option>
                                        <option value="Office">Office</option>
                                        <option value="Developer">Developer</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="cust_addr" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email(Required)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" id="cust_email" name="cust_email" class="form-control" placeholder="Email Address"> </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone(Required)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" id="cust_phone" name="cust_phone" class="form-control" placeholder="Ex:971500050000"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="cust_city" class="form-control" placeholder="Enter City"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>State</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="cust_state" class="form-control" placeholder="Enter State"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select Country</label>
                                    <div id="err_country">
                                    <select name="cust_country" class="selectpicker" data-live-search="true" title="select country">
                                        <?php
                                        $sql_country = mysqli_query($conn, "SELECT country_name FROM apps_countries where id !=''");
                                        while ($row_country = mysqli_fetch_array($sql_country)) {
                                            echo "<option value='" . $row_country['country_name'] . "'>" . $row_country['country_name'] . "</option>";
                                        }
                                        ?>

                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-fax" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="cust_zip" class="form-control" placeholder="Enter Zip Code"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Web Page</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-link" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="cust_web" class="form-control" placeholder="enter web address"> 
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
                    <div class="col-md-6">



                    </div>
                </div>

            </form>
            <!-- END DASHBOARD STATS 1-->

        </div>
        <div id="prefix_1241741341198" class="add_client custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Client Data Added Successfully
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

    $('#add_client').submit(function (e) {
        e.preventDefault();
        if ($('#cust_name').val() == '') {
            $('#cust_name').css({'border': '1px solid red'});
            $('#cust_name').focus();
        } else if ($('#cust_cat').val() == '') {
            $('#cust_cat').css({'border': '1px solid red'});
            $('#cust_cat').focus();
        } else if ($('#cust_email').val() == '') {
            $('#cust_email').css({'border': '1px solid red'});
            $('#cust_email').focus();
        } else if ($('#cust_phone').val() == '') {
            $('#cust_phone').css({'border': '1px solid red'});
            $('#cust_phone').focus();
        }  else {
            var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to add the Client Details?',
            title: 'Add Client Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_add_client.php'
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
                        msg: 'Success Message : New Client Added Successfully' 
                    });
                }
                          
                        }
                    });
                }
            }
        });
    }
        return false;
    });
</script>
</body>


</html>
