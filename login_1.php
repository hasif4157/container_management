<?php
session_start();
include('config/dbconn.php');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
header('location:index.php');   
}   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Excellent Way Container</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <body class=" login">
        <div class="logo">
            <a href="">
                <img src="assets/layouts/layout/img/excellentlogisticslogo.gif" alt="logo" class="logo-default" width="227px" /> </a>
        </div>
        <div class="content">
             <form class="login-form"  method="post">
                <h3 class="form-title">Login to your account</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">User Email</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="User Email" id="user_name" name="username" />
                    </div>
                    <span id="user_name-error" class="help-block" style="color:red;display: none">User Email is required.</span>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" id="password" name="password" /> 
                    </div>
                    <span id="user_name-password" class="help-block" style="color:red;display: none">Password is required.</span>
                    <span id="user_name-password-invalid" class="help-block" style="color:red;display: none">Invalid User Name And Password .</span>
                </div>
                <div class="form-actions">
                 <button type="button" id="user_login" class="btn green pull-right"> Login </button>
                </div>
            </form>
        </div>

        <div class="copyright"> <?= date('Y') ?> &copy; Alwafaa Group </div>

        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login-4.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>
<script>
    $(document).ready(function () {
        $('#user_login').click(function () {
            if ($('#user_name').val() == '') {
                $('#user_name').focus();
                $('#user_name').css('border-color', 'red');
                $('#user_name-error').show();
                return false;
            } else {
                var user_name = $('#user_name').val();
                $('#user_name').css('border-color', '');
                $('#user_name-error').hide();
            }
            if ($('#password').val() == '') {
                $('#password').focus();
                $('#password').css('border-color', 'red');
                $('#user_name-password').show();
                return false;
            } else {
                var password = $('#password').val();
                $('#password').css('border-color', '');
                $('#user_name-password').hide();
            }
            var data = {user_name: user_name, password: password};
            $.ajax({
                url: "process_login.php",
                async: true,
                type: 'POST',
                data: data,
                success: function (data) {
                 if(data == true){
                    $('#user_name-password-invalid').hide();
                     window.location.href="index.php";    
                 }else{
            
                  $('#user_name-password-invalid').show();
                 } 
                }
            })
        });
    })
</script>
