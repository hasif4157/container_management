<?php
require_once('settings.php');
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
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="add_user" enctype="multipart/form-data">
                <div class="col-md-5">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">

                            <div class="form-body">
                               <?php /* <div class="form-group">
                                    <label>Select Employee(Required)</label>
                                    <div id="err_emp">
                                    <select  name="user_emp" id="user_emp"  class="selectpicker" data-live-search="true" title="select Employee">
                                        <?php
                                        $sql_emp = mysqli_query($conn, "SELECT * FROM ex_staff where user_id =''");
                                        while ($row_emp = mysqli_fetch_array($sql_emp)) {
                                            echo "<option value='" . $row_emp['id'] . "'>" . strtoupper($row_emp['st_name']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                    </div> 
                                </div> */ ?> 
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
                                        $sql_emp = mysqli_query($conn, "SELECT * FROM emp_type where id !=''");
                                        while ($row_emp = mysqli_fetch_array($sql_emp)) {
                                            echo "<option value='" . $row_emp['id'] . "'>" . $row_emp['emp_type'] . "</option>";
                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="user_desc" rows="3"></textarea>
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
                                        <input name="manage_staff" type="checkbox" value="1" />&nbsp;&nbsp;Manage Staff
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_staff_vw" type="checkbox" value="12" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_staff_ed" type="checkbox" value="13" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_staff_dl" type="checkbox" value="14" />&nbsp;&nbsp;Delete
                                    </div>


                                    <div class="form-field" style="padding:0px;height:30px; ">
                                        <input name="manage_user" type="checkbox" value="2" />&nbsp;&nbsp;Manage User
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_user_vw" type="checkbox" value="15" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_user_ed" type="checkbox" value="16" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_user_dl" type="checkbox" value="17" />&nbsp;&nbsp;Delete
                                    </div>


                                    <div class="form-field" style="padding:0px;height:30px; ">
                                        <input name="manage_agent" type="checkbox" value="3" />&nbsp;&nbsp;Manage Agent
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_agent_vw" type="checkbox" value="18" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_agent_ed" type="checkbox" value="19" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_agent_dl" type="checkbox" value="20" />&nbsp;&nbsp;Delete
                                    </div>        

                                    <div class="form-field" style="padding:0px;height:30px; ">
                                        <input name="manage_client" type="checkbox" value="4" />&nbsp;&nbsp;Manage Client
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_client_vw" type="checkbox" value="21" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_client_ed" type="checkbox" value="22" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_client_dl" type="checkbox" value="23" />&nbsp;&nbsp;Delete
                                    </div> 

                                    <div class="form-field" style="padding:0px;height:30px;">
                                        <input name="manage_bank" type="checkbox" value="5" />&nbsp;&nbsp;Manage Banks
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_bank_vw" type="checkbox" value="24" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_bank_ed" type="checkbox" value="25" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_bank_dl" type="checkbox" value="26" />&nbsp;&nbsp;Delete
                                    </div> 


                                </div> 
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                <div class="form-left">
                                    <div class="form-field" style="padding:0px;height:30px; ">
                                        <input name="manage_location" type="checkbox" value="6" />&nbsp;&nbsp;Manage Location
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_location_vw" type="checkbox" value="27" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_location_ed" type="checkbox" value="28" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_location_dl" type="checkbox" value="29" />&nbsp;&nbsp;Delete
                                    </div> 


                                    <div class="form-field" style="padding:0px;height:30px; ">
                                        <input name="manage_container" type="checkbox" value="7" />&nbsp;&nbsp;Manage Container
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_container_vw" type="checkbox" value="30" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_container_ed" type="checkbox" value="31" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_container_dl" type="checkbox" value="32" />&nbsp;&nbsp;Delete
                                    </div> 


                                    <div class="form-field" style="padding:0px;height:30px; ">
                                        <input name="manage_orbooking" type="checkbox" value="8" />&nbsp;&nbsp;Manage Order Bookings
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_orbooking_vw" type="checkbox" value="33" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_orbooking_ed" type="checkbox" value="34" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_orbooking_dl" type="checkbox" value="35" />&nbsp;&nbsp;Delete
                                    </div> 

                                    <div class="form-field" style="padding:0px;height:30px; ">
                                        <input name="manage_salesinc" type="checkbox" value="9" />&nbsp;&nbsp;Manage Sales Invoice
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_salesinc_vw" type="checkbox" value="36" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_salesinc_ed" type="checkbox" value="37" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_salesinc_dl" type="checkbox" value="38" />&nbsp;&nbsp;Delete
                                    </div> 

                                    <div class="form-field" style="padding:0px;height:30px; ">
                                        <input name="manage_rcpvouch" type="checkbox" value="10" />&nbsp;&nbsp;Manage Receipt Voucher
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_rcpvouch_vw" type="checkbox" value="39" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_rcpvouch_ed" type="checkbox" value="40" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_rcpvouch_dl" type="checkbox" value="41" />&nbsp;&nbsp;Delete
                                    </div> 


                                    <div class="form-field" style="padding:0px;height:30px; ">
                                        <input name="manage_payvouch" type="checkbox" value="11" />&nbsp;&nbsp;Manage Payment Voucher
                                    </div>

                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_payvouch_vw" type="checkbox" value="42" />&nbsp;&nbsp;View
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_payvouch_ed" type="checkbox" value="43" />&nbsp;&nbsp;Edit
                                    </div>
                                    <div class="form-field" style="padding:0px;height:30px;margin-left:20px;">
                                        <input name="manage_payvouch_dl" type="checkbox" value="44" />&nbsp;&nbsp;Delete
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
        <div id="prefix_1241741341198" class="add_users custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            User Data Added Successfully
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
    $('#add_user').submit(function (e) {
        e.preventDefault();

     
        if ($('#user_name').val() == '') {
            $('#user_name').css({'border': '1px solid red'});
            $('#user_name').focus();
        } else if ($('#domain_name').val() == '') {
            $('#domain_name').css({'border': '1px solid red'});
            $('#domain_name').focus();
        } else if ($('#user_email').val() == '') {
            $('#user_email').css({'border': '1px solid red'});
            $('#user_email').focus();
        } else if ($('#password').val() == '') {
            $('#password').css({'border': '1px solid red'});
            $('#password').focus();
        } else if ($('#cpassword').val() == '') {
            $('#cpassword').css({'border': '1px solid red'});
            $('#cpassword').focus();
        } else if ($('#emp_type').val() == '') {
            $('#emp_type').css({'border': '1px solid red'});
            $('#emp_type').focus();
        } else if ($("#password").val() != $("#cpassword").val()) {
            $('#pass_err').text('password mismatch').css({'color': 'red'});
        } else {

            var data = new FormData(this); // <-- 'this' is your form element
            Lobibox.confirm({
                iconClass: false,
                msg: 'Are you sure you want to add the User Details?',
                title: 'Add User Details',
                callback: function ($this, type, e) {
                    if (type == 'yes') {
                        $('div#divLoading').addClass('show');
                        $.ajax({
                            url: 'insert_users.php'
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
                        msg: 'Success Message : New User Added Successfully' 
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