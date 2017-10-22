<?php
require_once('settings.php');
include('header.php');
$database=new database();
$edit_id = $_GET['id'];
$loc_type=$_GET['loc_type'];
if($loc_type == 1){
$sql_ed = "select * from to_location where id=$edit_id";
$res_ed = $database->select_query_array($sql_ed);
}
if($loc_type == 2){
$sql_ed = "select * from from_location where id=$edit_id";
$res_ed = $database->select_query_array($sql_ed); 
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
        <h1 class="page-title">Edit Location
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
           
            <div class="col-md-6">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">

                    <div class="portlet-body form">
                        <input type="hidden" name="up_id" id="up_id" value="<?=$edit_id?>">
                            <div class="form-body">
                                <div class="form-group">
                                        <label>Location Type</label>
                                        <select class="form-control" id="loc_type" name="loc_type">
                                            <option>select location type</option>
                                            <option value="1" <?= $loc_type == 1 ? 'selected="selected"' : '' ?>>TO</option>
                                            <option value="2" <?= $loc_type == 2 ? 'selected="selected"' : '' ?>>From</option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>Location Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="loc_name" id="loc_name" class="form-control" value="<?=$res_ed[0]->loc_name;?>" placeholder="Enter Location Name"> </div>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="loc_addr" id="loc_addr" rows="3"><?=$res_ed[0]->loc_addr;?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="loc_email" id="loc_email" class="form-control" value="<?=$res_ed[0]->loc_email;?>" placeholder="Email Address"> </div>
                                </div>
                                 <div class="form-group">
                                        <label>Choose Color(You Can Set Background color to Order Details Page)</label>
                                        <div class="input-group">
                                           
                                            <input class="jscolor" name="ord_color" id="ord_color" value="<?=$res_ed[0]->color_code;?>"></div>
                                    </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="loc_phone" id="loc_phone" value="<?=$res_ed[0]->loc_phone;?>" class="form-control" placeholder="Enter Phone Number"> 
                                    </div>
                                </div>
                               

                                <div class="form-group">
                                    <label>Fax</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-fax" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="loc_fax" id="loc_fax" class="form-control" value="<?= $res_ed[0]->loc_fax;?>" placeholder="Enter Fax Number"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-fax" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="loc_zip" id="loc_zip" value="<?=$res_ed[0]->loc_zip;?>" class="form-control" placeholder="Enter Zip Code"> 
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Contact Person</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="loc_cp" id="loc_cp" class="form-control" value="<?=$res_ed[0]->loc_cp;?>" placeholder="Enter Contact Person Name"> 
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Contact Person Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="loc_cpp" id="loc_cpp" class="form-control" value="<?=$res_ed[0]->loc_cpp;?>" placeholder="Enter Contact Person Phone"> 
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" id="update_location" class="btn blue">Update</button>
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
