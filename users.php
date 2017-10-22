<?php
require_once('settings.php');
include('header.php');
$database = new database();
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
        <h1 class="page-title">Add Users
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
                                <label>User/Computer Name(Required)</label>
                                <div class="input-group">
                                    <span class="input-group-addon">

                                    </span>
                                    <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter Name"> </div>
                            </div>
                            <div class="form-group">
                                <label>Workgroup/Domain Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon">

                                    </span>
                                    <input type="text" id="domain_name" name="domain_name" class="form-control" placeholder="Enter Domain Name"> </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Email Address"> </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control"  data-toggle="password" placeholder="Enter Password" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" id="cpassword" name="cpassword" class="form-control"  data-toggle="password" placeholder="Confirm your Password">
                                </div>
                                <span id="pass_err"></span>
                            </div>


                            <div class="form-group">
                                <label>Employee Type</label>
                                <select class="form-control" id="emp_type" name="employee">
                                    <option>Select Employee Type</option>
                                    <?php
                                    $sql_emp = "SELECT * FROM emp_type where id !=''";
                                    $emp_rows = $database->rows($sql_emp);
                                    $row_emp = $database->select_query_array($sql_emp);
                                    if ($emp_rows > 0) {
                                        for ($i = 0; $i < count($row_emp); $i++) {
                                            echo "<option value='" . $row_emp[0]->id . "'>" . $row_emp[0]->emp_type . "</option>";
                                        }
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="user_desc" id="user_desc" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" id="add_users" class="btn blue">Submit</button>
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
                <div class="col-md-12">
                    <div class="col-md-6">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">
                            <div class="form-left">
                                <div class="form-field" style="padding-bottom:10px;">
                                    PRIVILEGES:
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;">
                                    <input name="manage_staff" class="get_prev" type="checkbox" value="1" />&nbsp;&nbsp;Manage Staff
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_staff_vw" class="get_prev" type="checkbox" value="12" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_staff_ed" class="get_prev" type="checkbox" value="13" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_staff_dl" class="get_prev" type="checkbox" value="14" />&nbsp;&nbsp;Delete
                                </div>


                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_user" class="get_prev" type="checkbox" value="2" />&nbsp;&nbsp;Manage User
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_user_vw" class="get_prev" type="checkbox" value="15" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_user_ed" class="get_prev" type="checkbox" value="16" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_user_dl" class="get_prev" type="checkbox" value="17" />&nbsp;&nbsp;Delete
                                </div>


                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_agent" class="get_prev" type="checkbox" value="3" />&nbsp;&nbsp;Manage Agent
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_agent_vw" class="get_prev" type="checkbox" value="18" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_agent_ed" class="get_prev" type="checkbox" value="19" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_agent_dl" class="get_prev" type="checkbox" value="20" />&nbsp;&nbsp;Delete
                                </div>        

                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_client" class="get_prev" type="checkbox" value="4" />&nbsp;&nbsp;Manage Client
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_client_vw" class="get_prev" type="checkbox" value="21" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_client_ed" class="get_prev" class="get_prev" type="checkbox" value="22" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_client_dl" class="get_prev" type="checkbox" value="23" />&nbsp;&nbsp;Delete
                                </div> 

                                <div class="form-field" style="padding:0px;height:30px;">
                                    <input name="manage_bank" class="get_prev" type="checkbox" value="5" />&nbsp;&nbsp;Manage Banks
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_bank_vw" class="get_prev" type="checkbox" value="24" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_bank_ed" class="get_prev" type="checkbox" value="25" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_bank_dl" class="get_prev" type="checkbox" value="26" />&nbsp;&nbsp;Delete
                                </div> 


                            </div> 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">
                            <div class="form-left">
                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_location" class="get_prev" type="checkbox" value="6" />&nbsp;&nbsp;Manage Location
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_location_vw" class="get_prev" type="checkbox" value="27" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_location_ed" class="get_prev" type="checkbox" value="28" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_location_dl" class="get_prev" type="checkbox" value="29" />&nbsp;&nbsp;Delete
                                </div> 


                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_container" class="get_prev" type="checkbox" value="7" />&nbsp;&nbsp;Manage Container
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_container_vw" class="get_prev" type="checkbox" value="30" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_container_ed" class="get_prev" type="checkbox" value="31" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_container_dl" class="get_prev" type="checkbox" value="32" />&nbsp;&nbsp;Delete
                                </div> 


                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_orbooking" class="get_prev" type="checkbox" value="8" />&nbsp;&nbsp;Manage Order Bookings
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_orbooking_vw" class="get_prev" type="checkbox" value="33" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_orbooking_ed" class="get_prev" type="checkbox" value="34" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_orbooking_dl" class="get_prev" type="checkbox" value="35" />&nbsp;&nbsp;Delete
                                </div> 

                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_salesinc" class="get_prev" type="checkbox" value="9" />&nbsp;&nbsp;Manage Sales Invoice
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_salesinc_vw" class="get_prev" type="checkbox" value="36" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_salesinc_ed" class="get_prev" type="checkbox" value="37" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_salesinc_dl" class="get_prev" type="checkbox" value="38" />&nbsp;&nbsp;Delete
                                </div> 

                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_rcpvouch" type="checkbox" value="10" />&nbsp;&nbsp;Manage Receipt Voucher
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_rcpvouch_vw" class="get_prev" type="checkbox" value="39" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_rcpvouch_ed" class="get_prev" type="checkbox" value="40" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_rcpvouch_dl" class="get_prev" type="checkbox" value="41" />&nbsp;&nbsp;Delete
                                </div> 


                                <div class="form-field" style="padding:0px;height:30px; ">
                                    <input name="manage_payvouch" class="get_prev" type="checkbox" value="11" />&nbsp;&nbsp;Manage Payment Voucher
                                </div>

                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_payvouch_vw" class="get_prev" type="checkbox" value="42" />&nbsp;&nbsp;View
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_payvouch_ed" class="get_prev" class="get_prev" type="checkbox" value="43" />&nbsp;&nbsp;Edit
                                </div>
                                <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                    <input name="manage_payvouch_dl" class="get_prev" type="checkbox" value="44" />&nbsp;&nbsp;Delete
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

<script>
    $('#add_users').on('click', function () {
        var pre_arr = [];//declare blank array to store value
        $('.get_prev').each(function () { //take all the data one by one from class
            if ($(this).is(":checked")) {  //it will allow only checked value to go in array
                pre_arr.push($(this).val()); //push will send checked values to array as index array
            }
        });
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        var user_name = $('#user_name').val();
        var domain_name = $('#domain_name').val();
        var user_email = $('#user_email').val();
        var password = $('#password').val();
        var emp_type = $('#emp_type').val();
        var user_desc = $('#user_desc').val();


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
            json = json + '"user_name":"'+user_name+'",';
            json = json + '"domain_name":"'+domain_name+'",';
            json = json + '"user_email":"'+user_email+'",';
            json = json + '"password":"'+password+'",';
            json = json + '"emp_type":"'+emp_type+'",';
            json = json + '"user_desc":"'+user_desc+'",';
            json = json + '"privilege":"'+pre_arr.join(',')+'"';//join will combine indexed array as sting, seperated by comma.
            json = json + '}';
            
            Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to add user details?',
            title: 'Add User Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $.ajax({
                        url: "process_add_user.php",
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
                                    msg: 'Success Message : User Added Successfully'
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