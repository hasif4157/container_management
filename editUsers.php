<?php
require_once('settings.php');
include('header.php');

$edit_id = $_GET['id'];
$sql_ed = "select * from crm_owner where id=$edit_id";
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
                    <a href="manage_users.php">Manage Users</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Users</span>
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
        <h1 class="page-title">Edit Users
        </h1>
        
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
             <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="edit_user" enctype="multipart/form-data">
            <div class="col-md-5">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">

                    <div class="portlet-body form">
                      
                            <div class="form-body">
                                <div class="form-group">
                                    <label>User/Computer Name</label>
                                    <div class="input-group">
                                        <input type="hidden" name="up_id" value="<?=$edit_id?>">
                                        <input type="text" name="user_name" value="<?=$res_ed['user_name'];?>" class="form-control" placeholder="Enter Name"> </div>
                                </div>
                                <div class="form-group">
                                    <label>Workgroup/Domain Name</label>
                                    <div class="input-group">
                                        <input type="text" name="domain_name" value="<?=$res_ed['domain_name'];?>" class="form-control" placeholder="Enter Domain Name"> </div>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="user_email" value="<?=$res_ed['user_email'];?>" class="form-control" placeholder="Email Address"> </div>
                                </div>
                     
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" value="<?=$res_ed['password'];?>" class="form-control"  data-toggle="password" style="display: block;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <div class="input-group">
                                         <input type="password" id="password" name="cpassword" value="<?=$res_ed['password'];?>" class="form-control" data-toggle="password" style="display: block;">
                                        
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Employee</label>
                                    <select class="form-control" name="employee">
                                        <option>Select</option>
                                        
                                         <?php
                                        $sql_emp = mysqli_query($conn, "SELECT * FROM emp_type where id !=''");
                                        while ($row_emp = mysqli_fetch_array($sql_emp)) {
                                            ?>
                                            <option value="<?= $row_emp['id'] ?>" <?php echo $row_emp['id'] == $res_ed['employee'] ? 'selected="selected"' : '' ?>><?= $row_emp['emp_type'] ?></option>
                                        <?php }
                                        ?>
                                     
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="user_desc" rows="3"><?=$res_ed['user_desc'];?></textarea>
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
            <div class="col-md-7">
                <?php 
				            $privilege_array='';
				            $privilege_explode=explode("," , $res_ed['privileges']);
							
							$manage_staff='';
							$manage_user='';
							$manage_agent='';
							$manage_client='';
							$manage_bank='';
							$manage_location='';
							$manage_container='';
							$manage_orbooking='';
							$manage_salesinc='';
							$manage_rcpvouch='';
							$manage_payvouch='';
							$manage_staff_vw='';
							$manage_staff_ed='';
							$manage_staff_dl='';
							$manage_user_vw='';
							$manage_user_ed='';
							$manage_user_dl='';
							$manage_agent_vw='';
                                                        $manage_agent_ed='';
                                                        $manage_agent_dl='';
                                                        $manage_client_vw='';
                                                        $manage_client_ed='';
                                                        $manage_client_dl='';
                                                        $manage_bank_vw='';
                                                        $manage_bank_ed='';
                                                        $manage_bank_dl='';
                                                        $manage_location_vw='';
                                                        $manage_location_ed='';
                                                        $manage_location_dl='';
                                                        $manage_container_vw='';
                                                        $manage_container_ed='';
                                                        $manage_container_dl='';
                                                        $manage_orbooking_vw='';
                                                        $manage_orbooking_ed='';
                                                        $manage_orbooking_dl='';
                                                        $manage_salesinc_vw='';
                                                        $manage_salesinc_ed='';
                                                        $manage_salesinc_dl='';
                                                        $manage_rcpvouch_vw='';
                                                        $manage_rcpvouch_ed='';
                                                        $manage_rcpvouch_dl='';
                                                        $manage_payvouch_vw='';
                                                        $manage_payvouch_ed='';
                                                        $manage_payvouch_dl='';
                                                        
                                                        
							for($j=0;$j<=45;$j++)
							{
								if(!empty($privilege_explode[$j]))
								{
								
									if($privilege_explode[$j]==1)
									{
										$manage_staff="checked";
									}	
								
									if($privilege_explode[$j]==2)
									{
										$manage_user="checked";
									}
									if($privilege_explode[$j]==3)
									{
										$manage_agent="checked";
									}
									if($privilege_explode[$j]==4)
									{
										$manage_client="checked";
									}
									if($privilege_explode[$j]==5)
									{
										$manage_bank="checked";
									}
									if($privilege_explode[$j]==6)
									{
										$manage_location="checked";
									}
									if($privilege_explode[$j]==7)
									{
										$manage_container="checked";
									}
									if($privilege_explode[$j]==8)
									{
										$manage_orbooking="checked";
									}
									if($privilege_explode[$j]==9)
									{
										$manage_salesinc="checked";
									}
									if($privilege_explode[$j]==10)
									{
										$manage_rcpvouch="checked";
									}
									if($privilege_explode[$j]==11)
									{
										$manage_payvouch="checked";
									}
									if($privilege_explode[$j]==12)
									{
										$manage_staff_vw="checked";
									}
									if($privilege_explode[$j]==13)
									{
										$manage_staff_ed="checked";
									}
									if($privilege_explode[$j]==14)
									{
										$manage_staff_dl="checked";
									}
									if($privilege_explode[$j]==15)
									{
										$manage_user_vw="checked";
									}
									if($privilege_explode[$j]==16)
									{
										$manage_user_ed="checked";
									}
									if($privilege_explode[$j]==17)
									{
										$manage_user_dl="checked";
									}
									if($privilege_explode[$j]==18)
									{
										$manage_agent_vw="checked";
									}
									if($privilege_explode[$j]==19)
									{
										$manage_agent_ed="checked";
									}
									if($privilege_explode[$j]==20)
									{
										$manage_agent_dl="checked";
									}
									if($privilege_explode[$j]==21)
									{
										$manage_client_vw="checked";
									}
                                                                        if($privilege_explode[$j]==22)
									{
										$manage_client_ed="checked";
									}
                                                                        if($privilege_explode[$j]==23)
									{
										$manage_client_dl="checked";
									}
                                                                        if($privilege_explode[$j]==24)
									{
										$manage_bank_vw="checked";
									}
                                                                        if($privilege_explode[$j]==25)
									{
										$manage_bank_ed="checked";
									}
                                                                        if($privilege_explode[$j]==26)
									{
										$manage_bank_dl="checked";
									}
                                                                        if($privilege_explode[$j]==27)
									{
										$manage_location_vw="checked";
									}
                                                                        if($privilege_explode[$j]==28)
									{
										$manage_location_ed="checked";
									}
                                                                        if($privilege_explode[$j]==29)
									{
										$manage_location_dl="checked";
									}
                                                                        if($privilege_explode[$j]==30)
									{
										$manage_container_vw="checked";
									}
                                                                        if($privilege_explode[$j]==31)
									{
										$manage_container_ed="checked";
									}
                                                                        if($privilege_explode[$j]==32)
									{
										$manage_container_dl="checked";
									}
                                                                        
                                                                        if($privilege_explode[$j]==33)
									{
										$manage_orbooking_vw="checked";
									}
                                                                        if($privilege_explode[$j]==34)
									{
										$manage_orbooking_ed="checked";
									}
                                                                        if($privilege_explode[$j]==35)
									{
										$manage_orbooking_dl="checked";
									}
                                                                        if($privilege_explode[$j]==36)
									{
										$manage_salesinc_vw="checked";
									}
                                                                        if($privilege_explode[$j]==37)
									{
										$manage_salesinc_ed="checked";
									}
                                                                        if($privilege_explode[$j]==38)
									{
										$manage_salesinc_dl="checked";
									}
                                                                        if($privilege_explode[$j]==39)
									{
										$manage_rcpvouch_vw="checked";
									}
                                                                        if($privilege_explode[$j]==40)
									{
										$manage_rcpvouch_ed="checked";
									}
                                                                        if($privilege_explode[$j]==41)
									{
										$manage_rcpvouch_dl="checked";
									}
                                                                        if($privilege_explode[$j]==42)
									{
										$manage_payvouch_vw="checked";
									}
                                                                        if($privilege_explode[$j]==43)
									{
										$manage_payvouch_ed="checked";
									}
                                                                        if($privilege_explode[$j]==44)
									{
										$manage_payvouch_dl="checked";
									}
                                                                        
                                                                        
									
								}
							}
							
							?>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">
                            <div class="form-left">
                                <div class="form-field" style="padding-bottom:10px;">
                                    PRIVILEGES:
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;">
                                    <input name="manage_staff" type="checkbox" value="1" <?php echo !empty($manage_staff)?$manage_staff:'';?> />&nbsp;&nbsp;Manage Staff
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_staff_vw" type="checkbox" value="12" <?php echo !empty($manage_staff_vw)?$manage_staff_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_staff_ed" type="checkbox" value="13" <?php echo !empty($manage_staff_ed)?$manage_staff_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_staff_dl" type="checkbox" value="14" <?php echo !empty($manage_staff_ed)?$manage_staff_ed:'';?> />&nbsp;&nbsp;Delete
                                </div>


                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_user" type="checkbox" value="2" <?php echo !empty($manage_user)?$manage_user:'';?> />&nbsp;&nbsp;Manage User
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_user_vw" type="checkbox" value="15" <?php echo !empty($manage_user_vw)?$manage_user_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_user_ed" type="checkbox" value="16" <?php echo !empty($manage_user_ed)?$manage_user_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_user_dl" type="checkbox" value="17" <?php echo !empty($manage_user_dl)?$manage_user_dl:'';?> />&nbsp;&nbsp;Delete
                                </div>


                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_agent" type="checkbox" value="3" <?php echo !empty($manage_agent)?$manage_agent:'';?> />&nbsp;&nbsp;Manage Agent
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_agent_vw" type="checkbox" value="18" <?php echo !empty($manage_agent_vw)?$manage_agent_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_agent_ed" type="checkbox" value="19" <?php echo !empty($manage_agent_ed)?$manage_agent_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_agent_dl" type="checkbox" value="20" <?php echo !empty($manage_agent_dl)?$manage_agent_dl:'';?> />&nbsp;&nbsp;Delete
                                </div>        

                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_client" type="checkbox" value="4" <?php echo !empty($manage_client)?$manage_client:'';?> />&nbsp;&nbsp;Manage Client
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_client_vw" type="checkbox" value="21" <?php echo !empty($manage_client_vw)?$manage_client_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_client_ed" type="checkbox" value="22" <?php echo !empty($manage_client_ed)?$manage_client_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_client_dl" type="checkbox" value="23" <?php echo !empty($manage_client_dl)?$manage_client_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 

                                <div class="form-field" style="padding:0px;height:30px;">
                                    <input name="manage_bank" type="checkbox" value="5" <?php echo !empty($manage_bank)?$manage_bank:'';?> />&nbsp;&nbsp;Manage Banks
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_bank_vw" type="checkbox" value="24" <?php echo !empty($manage_bank_vw)?$manage_bank_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_bank_ed" type="checkbox" value="25" <?php echo !empty($manage_bank_ed)?$manage_bank_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_bank_dl" type="checkbox" value="26" <?php echo !empty($manage_bank_dl)?$manage_bank_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 

                                
                            </div> 
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">
                            <div class="form-left">
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_location" type="checkbox" value="6" <?php echo !empty($manage_location)?$manage_location:'';?> />&nbsp;&nbsp;Manage Location
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_location_vw" type="checkbox" value="27" <?php echo !empty($manage_location_vw)?$manage_location_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_location_ed" type="checkbox" value="28" <?php echo !empty($manage_location_ed)?$manage_location_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_location_dl" type="checkbox" value="29" <?php echo !empty($manage_location_dl)?$manage_location_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                                
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_container" type="checkbox" value="7" <?php echo !empty($manage_container)?$manage_container:'';?> />&nbsp;&nbsp;Manage Container
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_container_vw" type="checkbox" value="30" <?php echo !empty($manage_container_vw)?$manage_container_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_container_ed" type="checkbox" value="31" <?php echo !empty($manage_container_ed)?$manage_container_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_container_dl" type="checkbox" value="32" <?php echo !empty($manage_container_dl)?$manage_container_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                                
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_orbooking" type="checkbox" value="8" <?php echo !empty($manage_orbooking)?$manage_orbooking:'';?> />&nbsp;&nbsp;Manage Order Bookings
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_orbooking_vw" type="checkbox" value="33" <?php echo !empty($manage_orbooking_vw)?$manage_orbooking_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_orbooking_ed" type="checkbox" value="34" <?php echo !empty($manage_orbooking_ed)?$manage_orbooking_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_orbooking_dl" type="checkbox" value="35" <?php echo !empty($manage_orbooking_dl)?$manage_orbooking_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_salesinc" type="checkbox" value="9" <?php echo !empty($manage_salesinc)?$manage_salesinc:'';?> />&nbsp;&nbsp;Manage Sales Invoice
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_salesinc_vw" type="checkbox" value="36" <?php echo !empty($manage_salesinc_vw)?$manage_salesinc_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_salesinc_ed" type="checkbox" value="37" <?php echo !empty($manage_salesinc_ed)?$manage_salesinc_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_salesinc_dl" type="checkbox" value="38" <?php echo !empty($manage_salesinc_dl)?$manage_salesinc_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_rcpvouch" type="checkbox" value="10" <?php echo !empty($manage_rcpvouch)?$manage_rcpvouch:'';?> />&nbsp;&nbsp;Manage Receipt Voucher
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_rcpvouch_vw" type="checkbox" value="39" <?php echo !empty($manage_rcpvouch_vw)?$manage_rcpvouch_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_rcpvouch_ed" type="checkbox" value="40" <?php echo !empty($manage_rcpvouch_ed)?$manage_rcpvouch_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_rcpvouch_dl" type="checkbox" value="41" <?php echo !empty($manage_rcpvouch_dl)?$manage_rcpvouch_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                                
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_payvouch" type="checkbox" value="11" <?php echo !empty($manage_payvouch)?$manage_payvouch:'';?> />&nbsp;&nbsp;Manage Payment Voucher
                                </div>
                                
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_payvouch_vw" type="checkbox" value="42" <?php echo !empty($manage_payvouch_vw)?$manage_payvouch_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_payvouch_ed" type="checkbox" value="43" <?php echo !empty($manage_payvouch_ed)?$manage_payvouch_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_payvouch_dl" type="checkbox" value="44" <?php echo !empty($manage_payvouch_dl)?$manage_payvouch_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
                <!-- BEGIN SAMPLE FORM PORTLET-->

                <!-- END SAMPLE FORM PORTLET-->
                <!-- BEGIN SAMPLE FORM PORTLET-->

                <!-- END SAMPLE FORM PORTLET-->
                <!-- BEGIN SAMPLE FORM PORTLET-->


                <!-- END SAMPLE FORM PORTLET-->


            </div>
             </form>
        </div>
        <div id="prefix_1241741341198" class="edit_user custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            User Data Edited Successfully
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

<script type="text/javascript">
$('#edit_user').submit(function (e) {

    e.preventDefault();
    var data = new FormData(this); // <-- 'this' is your form element
    Lobibox.confirm({
        iconClass: false,
        msg: 'Are you sure you want to edit the User Details?',
        title: 'Edit User Details',
        callback: function ($this, type, e) {
            if (type == 'yes') {
                $('div#divLoading').addClass('show');
                $.ajax({
                    url: 'update_users.php'
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
window.location.href = "manage_users.php";

    }, 2000),
                       
                        title: 'Success',
                        msg: 'Success Message : User Edited Successfully' 
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