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
                    <span>Locations</span>
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
        <h1 class="page-title">Add Location
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="add_loc" enctype="multipart/form-data">
                <div class="col-md-6">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
                          
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Location Type</label>
                                        <select  class="form-control" id="loc_type" name="loc_type">
                                            <option value="">select location type</option>
                                            <option value="1">TO</option>
                                            <option value="2">From</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Location Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" id="loc_name" name="loc_name" class="form-control" placeholder="Enter Location Name"> </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" id="loc_addr" name="loc_addr" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="loc_email" class="form-control" placeholder="Email Address"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Choose Color(You Can Set Background color to Order Details Page)</label>
                                        <div class="input-group">
                                           
                                            <input class="jscolor" name="ord_color" id="ord_color" style="width:80px !important;text-align:center;" value="000000"></div>
                                    </div>
                                    
                                     
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_phone[]" class="form-control" placeholder="Enter Phone Number"> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="javascript:;" class="btn btn-icon-only green" id="app_ph" title="Add More Phone">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div id="get_phdiv">
                                    </div>

                                    <div class="form-group">
                                        <label>Fax</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fax" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_fax" class="form-control" placeholder="Enter Fax Number"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>City</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_city" class="form-control" placeholder="Enter City"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>State</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_state" class="form-control" placeholder="Enter State"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Country</label>
                                        <div id="err_country">
                                        <select class="selectpicker" data-live-search="true" title="select country" id="loc_country" name="loc_country">
                                           
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
                                            <input type="text" name="loc_zip" class="form-control" placeholder="Enter Zip Code"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_cp" class="form-control" placeholder="Enter Contact Person Name"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Contact Person Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_cpp" class="form-control" placeholder="Enter Contact Person Phone"> 
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
    <div id="prefix_1241741341198" class="add_loc custom-alerts alert alert-success fade in" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        Location Added Successfully
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

    $('#add_loc').submit(function (e) {
        e.preventDefault();
        if ($('#loc_type').val() == '') {
            $('#loc_type').css({'border': '1px solid red'});
            $('#loc_type').focus();
        } else if ($('#loc_name').val() == '') {
            $('#loc_name').css({'border': '1px solid red'});
            $('#loc_name').focus();
        } else if ($('#loc_addr').val() == '') {
            $('#loc_addr').css({'border': '1px solid red'});
            $('#loc_addr').focus();
        }else if ($('#ord_color').val() == '') {
            $('#ord_color').css({'border': '1px solid red'});
            $('#ord_color').focus();
        } else {
            var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to add the Location?',
            title: 'Add Location',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_add_loc.php'
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
window.location.href = "manage_location.php";

    }, 2000),
                       
                        title: 'Success',
                        msg: 'Success Message : New Location Added Successfully' 
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
