<?php
require_once('settings.php');
include('header.php');
$database=new database();
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
      
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Add Location
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
                                        <textarea class="form-control" id="loc_addr" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="loc_email" id="loc_email" class="form-control" placeholder="Email Address"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Choose Color(You Can Set Background color to Order Details Page)</label>
                                        <div class="input-group">
                                           
                                            <input class="jscolor" name="ord_color" id="ord_color" style="width:80px !important;text-align:center;" value="FFFFF"></div>
                                    </div>
                                    
                                     
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_phone" id="loc_phone" class="form-control" placeholder="add more number with comma"> 
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fax" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_fax" id="loc_fax" class="form-control" placeholder="Enter Fax Number"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fax" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_zip" id="loc_zip" class="form-control" placeholder="Enter Zip Code"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_cp" id="loc_cp" class="form-control" placeholder="Enter Contact Person Name"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Contact Person Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="loc_cpp" id="loc_cpp" class="form-control" placeholder="Enter Contact Person Phone"> 
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" id="add_location" class="btn blue">Submit</button>
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
