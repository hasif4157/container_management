<?php
require_once('settings.php');
include('header.php');
$database=new database();
$edit_id = $_GET['id'];
$sql_ed = "select * from crm_owner where id=$edit_id";
$res_ed = $database->select_query_array($sql_ed);
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
             
            <div class="col-md-5">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">

                    <div class="portlet-body form">
                      
                            <div class="form-body">
                                <div class="form-group">
                                    <label>User/Computer Name</label>
                                    <div class="input-group">
                                        <input type="hidden" name="up_id" id="up_id" value="<?=$edit_id?>">
                                        <input type="text" name="user_name" id="user_name" value="<?=$res_ed[0]->user_name;?>" class="form-control" placeholder="Enter Name"> </div>
                                </div>
                                <div class="form-group">
                                    <label>Workgroup/Domain Name</label>
                                    <div class="input-group">
                                        <input type="text" name="domain_name" id="domain_name" value="<?=$res_ed[0]->domain_name;?>" class="form-control" placeholder="Enter Domain Name"> </div>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="user_email" id="user_email" value="<?=$res_ed[0]->user_email;?>" class="form-control" placeholder="Email Address"> </div>
                                </div>
                     
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <div class="input-group">
                                        <input type="password"  id="password" name="password" value="<?=$res_ed[0]->password;?>" class="form-control"  data-toggle="password" style="display: block;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <div class="input-group">
                                         <input type="password" id="cpassword" name="cpassword" value="<?=$res_ed[0]->password;?>" class="form-control" data-toggle="password" style="display: block;">
                                        
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Employee Type</label>
                                    <select class="form-control" id="emp_type" name="employee">
                                        <option>Select</option>
                                        
                                         <?php
                                        $sql_emp = "SELECT * FROM emp_type where id !=''";
                                        $now_emp=$database->rows($sql_emp);
                                        $row_emp = $database->select_query_array($sql_emp);
                                        if($now_emp>0){
                                        for($i=0;$i<count($row_emp);$i++) {
                                            ?>
                                            <option value="<?= $row_emp[0]->id ?>" <?php echo $row_emp[0]->id == $res_ed[0]->employee ? 'selected="selected"' : '' ?>><?= $row_emp[0]->emp_type ?></option>
                                        <?php }}
                                        ?>
                                     
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="user_desc" name="user_desc" rows="3"><?=$res_ed[0]->user_desc;?></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" id="update_user" class="btn blue">Update</button>
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
				            $privilege_explode=explode("," , $res_ed[0]->privileges);
							
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
                                    <input name="manage_staff" class="edit_prev" type="checkbox" value="1" <?php echo !empty($manage_staff)?$manage_staff:'';?> />&nbsp;&nbsp;Manage Staff
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_staff_vw" class="edit_prev" type="checkbox" value="12" <?php echo !empty($manage_staff_vw)?$manage_staff_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_staff_ed" class="edit_prev" type="checkbox" value="13" <?php echo !empty($manage_staff_ed)?$manage_staff_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_staff_dl" class="edit_prev" type="checkbox" value="14" <?php echo !empty($manage_staff_ed)?$manage_staff_ed:'';?> />&nbsp;&nbsp;Delete
                                </div>


                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_user" class="edit_prev" type="checkbox" value="2" <?php echo !empty($manage_user)?$manage_user:'';?> />&nbsp;&nbsp;Manage User
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_user_vw" class="edit_prev" type="checkbox" value="15" <?php echo !empty($manage_user_vw)?$manage_user_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_user_ed" class="edit_prev" type="checkbox" value="16" <?php echo !empty($manage_user_ed)?$manage_user_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_user_dl" class="edit_prev" type="checkbox" value="17" <?php echo !empty($manage_user_dl)?$manage_user_dl:'';?> />&nbsp;&nbsp;Delete
                                </div>


                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_agent" class="edit_prev" type="checkbox" value="3" <?php echo !empty($manage_agent)?$manage_agent:'';?> />&nbsp;&nbsp;Manage Agent
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_agent_vw" class="edit_prev" type="checkbox" value="18" <?php echo !empty($manage_agent_vw)?$manage_agent_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_agent_ed" class="edit_prev" type="checkbox" value="19" <?php echo !empty($manage_agent_ed)?$manage_agent_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_agent_dl" class="edit_prev" type="checkbox" value="20" <?php echo !empty($manage_agent_dl)?$manage_agent_dl:'';?> />&nbsp;&nbsp;Delete
                                </div>        

                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_client" class="edit_prev" type="checkbox" value="4" <?php echo !empty($manage_client)?$manage_client:'';?> />&nbsp;&nbsp;Manage Client
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_client_vw" class="edit_prev" type="checkbox" value="21" <?php echo !empty($manage_client_vw)?$manage_client_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_client_ed" class="edit_prev" type="checkbox" value="22" <?php echo !empty($manage_client_ed)?$manage_client_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_client_dl" class="edit_prev" type="checkbox" value="23" <?php echo !empty($manage_client_dl)?$manage_client_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 

                                <div class="form-field" style="padding:0px;height:30px;">
                                    <input name="manage_bank" class="edit_prev" type="checkbox" value="5" <?php echo !empty($manage_bank)?$manage_bank:'';?> />&nbsp;&nbsp;Manage Banks
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_bank_vw" class="edit_prev" type="checkbox" value="24" <?php echo !empty($manage_bank_vw)?$manage_bank_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_bank_ed" class="edit_prev" type="checkbox" value="25" <?php echo !empty($manage_bank_ed)?$manage_bank_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_bank_dl" class="edit_prev" type="checkbox" value="26" <?php echo !empty($manage_bank_dl)?$manage_bank_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 

                                
                            </div> 
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">
                            <div class="form-left">
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_location" class="edit_prev" type="checkbox" value="6" <?php echo !empty($manage_location)?$manage_location:'';?> />&nbsp;&nbsp;Manage Location
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_location_vw" class="edit_prev" type="checkbox" value="27" <?php echo !empty($manage_location_vw)?$manage_location_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_location_ed" class="edit_prev" type="checkbox" value="28" <?php echo !empty($manage_location_ed)?$manage_location_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_location_dl" class="edit_prev" type="checkbox" value="29" <?php echo !empty($manage_location_dl)?$manage_location_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                                
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_container" class="edit_prev" type="checkbox" value="7" <?php echo !empty($manage_container)?$manage_container:'';?> />&nbsp;&nbsp;Manage Container
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_container_vw" class="edit_prev" type="checkbox" value="30" <?php echo !empty($manage_container_vw)?$manage_container_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_container_ed" class="edit_prev" type="checkbox" value="31" <?php echo !empty($manage_container_ed)?$manage_container_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_container_dl" class="edit_prev" type="checkbox" value="32" <?php echo !empty($manage_container_dl)?$manage_container_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                                
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_orbooking" class="edit_prev" type="checkbox" value="8" <?php echo !empty($manage_orbooking)?$manage_orbooking:'';?> />&nbsp;&nbsp;Manage Order Bookings
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_orbooking_vw" class="edit_prev" type="checkbox" value="33" <?php echo !empty($manage_orbooking_vw)?$manage_orbooking_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_orbooking_ed" class="edit_prev" type="checkbox" value="34" <?php echo !empty($manage_orbooking_ed)?$manage_orbooking_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_orbooking_dl" class="edit_prev" type="checkbox" value="35" <?php echo !empty($manage_orbooking_dl)?$manage_orbooking_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_salesinc" class="edit_prev" type="checkbox" value="9" <?php echo !empty($manage_salesinc)?$manage_salesinc:'';?> />&nbsp;&nbsp;Manage Sales Invoice
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_salesinc_vw" class="edit_prev" type="checkbox" value="36" <?php echo !empty($manage_salesinc_vw)?$manage_salesinc_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_salesinc_ed" class="edit_prev" type="checkbox" value="37" <?php echo !empty($manage_salesinc_ed)?$manage_salesinc_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_salesinc_dl" class="edit_prev" type="checkbox" value="38" <?php echo !empty($manage_salesinc_dl)?$manage_salesinc_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_rcpvouch" class="edit_prev" type="checkbox" value="10" <?php echo !empty($manage_rcpvouch)?$manage_rcpvouch:'';?> />&nbsp;&nbsp;Manage Receipt Voucher
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_rcpvouch_vw" class="edit_prev" type="checkbox" value="39" <?php echo !empty($manage_rcpvouch_vw)?$manage_rcpvouch_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_rcpvouch_ed" class="edit_prev" type="checkbox" value="40" <?php echo !empty($manage_rcpvouch_ed)?$manage_rcpvouch_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_rcpvouch_dl" class="edit_prev" type="checkbox" value="41" <?php echo !empty($manage_rcpvouch_dl)?$manage_rcpvouch_dl:'';?> />&nbsp;&nbsp;Delete
                                </div> 
                                
                                
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_payvouch" class="edit_prev" type="checkbox" value="11" <?php echo !empty($manage_payvouch)?$manage_payvouch:'';?> />&nbsp;&nbsp;Manage Payment Voucher
                                </div>
                                
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_payvouch_vw" class="edit_prev" type="checkbox" value="42" <?php echo !empty($manage_payvouch_vw)?$manage_payvouch_vw:'';?> />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_payvouch_ed" class="edit_prev" type="checkbox" value="43" <?php echo !empty($manage_payvouch_ed)?$manage_payvouch_ed:'';?> />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_payvouch_dl" class="edit_prev" type="checkbox" value="44" <?php echo !empty($manage_payvouch_dl)?$manage_payvouch_dl:'';?> />&nbsp;&nbsp;Delete
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
    $('#update_user').on('click', function () {
    var prev_arr=[];
    $('.edit_prev').each(function(){//iterate each value one by one from class
        if($(this).is(":checked")){//this will allow checked values to loop
            prev_arr.push($(this).val());//push the values to array as index array
        }
        
    });
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        var user_name = $('#user_name').val();
        var domain_name = $('#domain_name').val();
        var user_email = $('#user_email').val();
        var password = $('#password').val();
        var emp_type = $('#emp_type').val();
        var user_desc = $('#user_desc').val();
        var up_id = $('#up_id').val();


        if (user_name == '') {
            $('#user_name').css({'border': '1px solid red'});
            $('#user_name').focus();
        }
        else if (!pattern.test(user_email))
        {
            $('#user_name').css({'border': 'none'});
            $('#user_email').css({'border': '1px solid red'});
            $('#user_email').focus();
        }
        else if (password == '') {
            $('#user_email').css({'border': 'none'});
            $('#password').css({'border': '1px solid red'});
            $('#password').focus();
        }
        else if (emp_type == '') {
            $('#password').css({'border': 'none'});
            $('#emp_type').css({'border': '1px solid red'});
            $('#emp_type').focus();
        }
        else{
            var json = '';
            json = json + '{';
            json = json + '"up_id":"'+up_id+'",';
            json = json + '"user_name":"'+user_name+'",';
            json = json + '"domain_name":"'+domain_name+'",';
            json = json + '"user_email":"'+user_email+'",';
            json = json + '"password":"'+password+'",';
            json = json + '"emp_type":"'+emp_type+'",';
            json = json + '"user_desc":"'+user_desc+'",';
            json = json + '"privilege":"'+prev_arr.join(',')+'"';//join will combine indexed array as sting, seperated by comma.
            json = json + '}';
            
            Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to edit user details?',
            title: 'Edit User Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $.ajax({
                        url: "process_edit_user.php",
                        async: true,
                        type: 'POST',
                        data: "json=" + encodeURIComponent(json),
                        success: function (data) {
                        if (data == 1) {
                                Lobibox.notify('success', {
                                    delay: false,
                                    sound: true,
                                    closeOnEsc: window.setTimeout(function () {
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
      
        }


    });
</script>
</body>

</html>