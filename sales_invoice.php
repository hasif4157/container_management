<?php
require_once('settings.php');
include('header.php');
?>


<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div id="get_data"></div>
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
                    <a href="manage_staff.php">Manage Staff</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Staff</span>
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
        <h1 class="page-title">Sales Invoice
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="add_staff" enctype="multipart/form-data">
                <div class="col-md-9">
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
                            <div class="form-body">
                                 <div class="form-group">
                                    <label>
                                        Employee No# <input type="text" name="emp_no" class="form-control red" value="<?= $emp_no ?>" readonly>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Staff Name(Required)</label>
                                        <input type="text" id="st_name" name="st_name" class="form-control spinner" placeholder="Staff Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reporting To(Required)</label>
                                        <select class="form-control" id="rp_to" name="rp_to">
                                            <option value="">--select--</option>
                                            <option value="Manager">Manager</option>
                                            <option value="team lead">Team Lead</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Employee Type(Required)</label>
                                        <select class="form-control" id="emp_type" name="emp_type">
                                            <option value="">--select employee type--</option>
                                            <?php
                                            $sql_emp = mysqli_query($conn, "SELECT emp_type FROM emp_type where id !=''");
                                            while ($row_emp = mysqli_fetch_array($sql_emp)) {
                                                echo "<option value='" . $row_emp['emp_type'] . "'>" . $row_emp['emp_type'] . "</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation(Required)</label>
                                        <input type="text" id="st_desgn" name="st_desgn" class="form-control spinner" placeholder="Designation">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Department(Required)</label>
                                        <select class="form-control" id="department" name="department">
                                            <option value="">--select department--</option>
                                            <?php
                                            $sql_dept = mysqli_query($conn, "SELECT department FROM ex_department where id !=''");
                                            while ($row_dept = mysqli_fetch_array($sql_dept)) {
                                                echo "<option value='" . $row_dept['department'] . "'>" . $row_dept['department'] . "</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Visa Status(Required)</label>
                                        <select class="form-control" id="visa_status" name="visa_status">
                                            <option value="">--select visa status--</option>
                                            <option value="Visit Visa">Visit Visa</option>
                                            <option selected="selected" value="Employment Visa">Employment Visa</option>
                                            <option value="Father Sponsor">Father Sponsor</option>
                                            <option value="Husband/Wife Sponsor">Husband/Wife Sponsor</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">

                                        <label>Date of Joining(dd-mm-yyyy)(Required)</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="" type="text" value="" id="doj" name="doj"  placeholder="Joining Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Web Page</label>
                                        <input type="text"  name="web_page" class="form-control spinner" placeholder="www.excellentwaycargo.com">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Working Method(Required)</label>
                                        <select class="form-control" id="work_method" name="work_method">
                                            <option>--select working method--</option>
                                            <option selected="selected" value="full time">Full Time</option>
                                            <option value="part time">Part Time</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emergency Contact Number</label>
                                        <input type="text"  name="st_ecn" class="form-control spinner" placeholder="Emergency Contact Number">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Mobile(Required)</label>
                                        <input type="text" id="st_mobile" name="st_mobile" class="form-control spinner" placeholder="Mobile Number">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Office Email(Required)</label>
                                        <input type="text" id="off_email" name="off_email" class="form-control spinner" placeholder="Office Email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Office Phone</label>
                                        <input type="text"  name="off_phone" class="form-control spinner" placeholder="Office Phone">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender(Required)</label>
                                        <select class="form-control" id="st_gender" name="st_gender">
                                            <option value="">--select gender--</option>
                                            <option  value="male">Male</option>
                                            <option value="female">Female</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>City(Required)</label>
                                        <input type="text" id="st_city" name="st_city" class="form-control spinner" placeholder="Enter City">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Home Phone</label>
                                        <input type="text" name="hm_phone" class="form-control spinner" placeholder="Home Phone">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>State(Required)</label>
                                        <input type="text" id="st_state" name="st_state" class="form-control spinner" placeholder="Enter State">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Personal Email(Required)</label>
                                        <input type="text" id="pr_email" name="pr_email" class="form-control spinner" placeholder="Personal Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Postal</label>
                                        <input type="text" name="postal" class="form-control spinner" placeholder="Postal">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country(Required)</label>
                                        <select class="form-control" id="st_country" name="st_country">
                                            <option value="">--select country--</option>
                                            <?php
                                            $sql_pc_filt = mysqli_query($conn, "SELECT country_name FROM apps_countries where id !=''");
                                            while ($row_pc_filt = mysqli_fetch_array($sql_pc_filt)) {
                                                echo "<option value='" . $row_pc_filt['country_name'] . "'>" . $row_pc_filt['country_name'] . "</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="clearfix"></div>
                    </div>
                </div> 

                <div class="col-md-3">
                    <h5>Head of the Following Division</h5>  
                </div>
                <div class="clearfix"></div>
                <div class="form-actions">
                    <button type="submit" class="btn blue">Submit</button>
                    <button type="button" class="btn default">Cancel</button>
                </div> 
            </form>

        </div>


        <div id="prefix_1241741341198" class="add_staff custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Staff Data Added Successfully
        </div>

    </div>
    <!-- END DASHBOARD STATS 1-->






</div>

<?php
include('footer.php');
?>
<script>
    $('#add_staff').submit(function (e) {
        e.preventDefault();
       if($('#st_name').val() == ''){
          $('#st_name').css({'border':'1px solid red'}); 
          $('#st_name').focus();
       }
       else if($('#rp_to').val() == ''){
          $('#rp_to').css({'border':'1px solid red'}); 
          $('#rp_to').focus();
       }
       else if($('#emp_type').val() == ''){
          $('#emp_type').css({'border':'1px solid red'}); 
          $('#emp_type').focus();
       }
       else if($('#st_desgn').val() == ''){
          $('#st_desgn').css({'border':'1px solid red'}); 
          $('#st_desgn').focus();
       }
      else if('#department').val() == ''){
          $('#department').css({'border':'1px solid red'}); 
          $('#department').focus();
      }
      else if('#visa_status').val() == ''){
          $('#visa_status').css({'border':'1px solid red'}); 
          $('#visa_status').focus();
      }
      else if('#doj').val() == ''){
          $('#doj').css({'border':'1px solid red'}); 
          $('#doj').focus();
      }
      else if('#work_method').val() == ''){
          $('#work_method').css({'border':'1px solid red'}); 
          $('#work_method').focus();
      }
      else if('#st_mobile').val() == ''){
          $('#st_mobile').css({'border':'1px solid red'}); 
          $('#st_mobile').focus();
      }
      else if('#off_email').val() == ''){
          $('#off_email').css({'border':'1px solid red'}); 
          $('#off_email').focus();
      }
      else if('#st_gender').val() == ''){
          $('#st_gender').css({'border':'1px solid red'}); 
          $('#st_gender').focus();
      }
      else if('#st_city').val() == ''){
          $('#st_city').css({'border':'1px solid red'}); 
          $('#st_city').focus();
      }
      else if('#st_state').val() == ''){
          $('#st_state').css({'border':'1px solid red'}); 
          $('#st_state').focus();
      }
      else if('#pr_email').val() == ''){
          $('#pr_email').css({'border':'1px solid red'}); 
          $('#pr_email').focus();
      }
      else if('#st_country').val() == ''){
          $('#st_country').css({'border':'1px solid red'}); 
          $('#st_country').focus();
      }
       else{
        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to add the Staff Details?',
            title: 'Add Staff Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_add_staff.php'
                        , data: data
                        , cache: false
                        , contentType: false
                        , processData: false
                        , type: 'POST'
                        , success: function (data) {
                            $('#divLoading').removeClass('show');
                            $('.add_staff').show();
                            $('.add_staff').fadeOut(3000);
                            window.setTimeout(function () {

                                // Move to a new location or you can do something else
                                window.location.href = "manage_staff.php";

                            }, 3100);
      

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