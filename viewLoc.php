<?php
require_once('settings.php');
include('header.php');

$edit_id = $_GET['id'];
$sql_ed = "select * from ex_location where id=$edit_id";
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
                    <a href="manage_location.php">Manage Location</a>
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
        <h1 class="page-title">View Location
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
            
            <div class="col-md-6">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">

                    <div class="portlet-body form">
                        
                            <div class="form-body">
                               
                                <div class="form-group">
                                    <label>Location Name</label>
                                    <div class="input-group">
                                        <input type="text" name="loc_name" class="form-control" value="<?=$res_ed['loc_name'];?>" readonly> </div>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="loc_addr" rows="3" readonly><?=$res_ed['loc_addr'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="input-group">
                                        <input type="text" name="loc_email" class="form-control" value="<?=$res_ed['loc_email'];?>" readonly> </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div class="input-group">
                                       <input type="text" name="loc_phone" value="<?=$res_ed['loc_phone'];?>" class="form-control" readonly> 
                                    </div>
                                </div>
                               

                                <div class="form-group">
                                    <label>Fax</label>
                                    <div class="input-group">
                                        <input type="text" name="loc_fax" class="form-control"  readonly> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <div class="input-group">
                                     <input type="text" name="loc_city" class="form-control" value="<?=$res_ed['loc_city'];?>" readonly> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>State</label>
                                    <div class="input-group">
                                       
                                        <input type="text" name="loc_state" class="form-control" value="<?=$res_ed['loc_state'];?>" readonly> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Country</label>
                                    <div class="input-group">
                                        
                                        <input type="text" name="loc_state" class="form-control" value="<?=$res_ed['loc_country'];?>" readonly> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-fax" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="loc_zip" value="<?=$res_ed['loc_zip'];?>" class="form-control" readonly> 
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Contact Person</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="loc_cp" class="form-control" value="<?=$res_ed['loc_cp'];?>" readonly> 
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Contact Person Phone</label>
                                    <div class="input-group">
                                       <input type="text" name="loc_cpp" class="form-control" value="<?=$res_ed['loc_cpp'];?>"  readonly> 
                                    </div>
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


</body>


</html>
