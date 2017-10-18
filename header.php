<?php
require_once('settings.php');
?>
<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>ExcellentWay|Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" type="text/css" href="css/calendercss.css" />
        <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />


        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="css/lobibox/lobibox.min.css"/>
        <link rel="stylesheet" href="css/bootstrap-select.css">

        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 

        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <script src="js/jscolor.js"></script>
      
        <style>
            #divLoading {
                display: none;
            }

            #divLoading.show {
                display: block;
                position: fixed;
                z-index: 10000;
                background-image: url('images/newloader.gif');
                background-color: #ccc;
                opacity: 0.2;
                background-repeat: no-repeat;
                background-position: center;
                left: 0;
                bottom: 0;
                right: 0;
                top: 0;
            }
         
.error{border:none !important; font-weight:normal !important; color:red !important}

        
		.jscolor {
    /*border: none !important;*/
    border-radius: 4px !important;
    /* width: 229px; */
    width: 100% !important;
    font-size: 14px !important;
    height: 34px !important;
    padding: 6px 12px !important;
	
}

        </style>
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div id="divLoading"></div>
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="alert alert-success" style="display: none;">
                    <strong>Success!</strong> <span id="success-message"> </span>
                </div>
                <div class="alert alert-danger" style="display: none">
                    <strong>Error!</strong> <span id="error-message"> </span>
                </div>
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="">
                            <img src="assets/layouts/layout/img/excellentlogisticslogo.gif" alt="logo" class="logo-default" width="170px" style="margin: 0px !important;" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
<?php
$database_side=new database();
$qry_sidebar = "SELECT * from crm_owner where id='" . $_SESSION['user_id'] . "'";
$sidebar_res=$database_side->select_query_array($qry_sidebar);
$side_staff = "disnone";
$side_user = "disnone";
$side_agent = "disnone";
$side_client = "disnone";
$side_bank = "disnone";
$side_location = "disnone";
$side_cont = "disnone";
$side_order = "disnone";
$side_sale = "disnone";
$side_recp = "disnone";
$side_pay = "disnone";

$privilege_side = explode(",", $sidebar_res[0]->privileges);
for ($sj = 0; $sj <= 44; $sj++) {
    if (!empty($privilege_side[$sj])) {
        if ($privilege_side[$sj] == 1) {
            $side_staff = "";
        }
        if ($privilege_side[$sj] == 2) {
            $side_user = "";
        }
        if ($privilege_side[$sj] == 3) {
            $side_agent = "";
        }
        if ($privilege_side[$sj] == 4) {
            $side_client = "";
        }
        if ($privilege_side[$sj] == 5) {
            $side_bank = "";
        }
        if ($privilege_side[$sj] == 6) {
            $side_location = "";
        }
        if ($privilege_side[$sj] == 6) {
            $side_cont = "";
        }
        if ($privilege_side[$sj] == 8) {
            $side_order = "";
        }
        if ($privilege_side[$sj] == 9) {
            $side_sale = "";
        }
        if ($privilege_side[$sj] == 10) {
            $side_recp = "";
        }
        if ($privilege_side[$sj] == 11) {
            $side_pay = "";
        }
    }
}
?>
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">

                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="https://www.specialneedscommunities.com/images/consumers/img_nogravatar.png" />
                                    <span class="username username-hide-on-mobile"><?= $_SESSION['username'] ?></span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>

                                    <li>
                                        <a href="logout.php">
                                            <i class="icon-key"></i> Log Out
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </div>

            </div>

            <div class="clearfix"> </div>
            <div class="page-container">
                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse">
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="heading">

                                <h3 class="uppercase">  <i class="fa fa-folder-open-o" aria-hidden="true"></i>Addons</h3>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="title">Settings</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">

                                    <li class="nav-item">
                                        <a href="manage_category.php" class="nav-link ">
                                            <span class="title">Add Category</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="manage_emptype.php" class="nav-link ">
                                            <span class="title">Add Employee Type</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="manage_dept.php" class="nav-link ">
                                            <span class="title">Add Department</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="update_terms.php" class="nav-link ">
                                            <span class="title">Update Terms/Condition</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="heading">

                                <h3 class="uppercase">  <i class="fa fa-folder-open-o" aria-hidden="true"></i>STAFF</h3>
                            </li>

                            <li class="nav-item <?= $side_staff ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <span class="title">View Staff</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="manage_staff.php" class="nav-link">
                                            <span class="title">Staff</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="heading">

                                <h3 class="uppercase"><i class="fa fa-folder-open-o" aria-hidden="true"></i>GENERAL</h3>
                            </li>
                            <li class="nav-item <?= $side_user ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <span class="title">View Users</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="manage_users.php" class="nav-link">
                                            <span class="title">Users</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li class="nav-item <?= $side_agent ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <span class="title">View Agents(Mediator)</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="manage_agents.php" class="nav-link ">
                                            <span class="title">Agents</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li class="nav-item <?= $side_client ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <span class="title">View Clients</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="manage_client.php" class="nav-link ">
                                            <span class="title">Clients</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-item <?= $side_bank ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    <span class="title">View Banks</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="manage_bank.php" class="nav-link">
                                            <span class="title">Banks</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-item <?= $side_location ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span class="title">View Locations</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="manage_location.php" class="nav-link ">
                                            <span class="title">Locations</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item <?= $side_cont ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-ship" aria-hidden="true"></i>
                                    <span class="title">View Container</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="manage_container.php" class="nav-link">
                                            <span class="title">Container</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="nav-item <?= $side_cont ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-ship" aria-hidden="true"></i>
                                    <span class="title">View Warehouse</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="wharehouse.php" class="nav-link">
                                            <span class="title">View Warehouse</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item <?= $side_order ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-align-justify" aria-hidden="true"></i>
                                    <span class="title">View Orders</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="manage_order.php" class="nav-link ">
                                            <span class="title">View Orders</span>
                                        </a>
                                        </li>
                                      
                                    <li class="nav-item">
                                         <a href="delete_order_history.php" class="nav-link ">
                                            <span class="title">Delete history</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item <?= $side_sale ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                    <span class="title">View Sales Invoice</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ">
                                            <span class="title">Sales Invoice</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <span class="title">View Vouchers</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?= $side_recp ?>">
                                        <a href="#" class="nav-link ">
                                            <span class="title">Receipt Vouchers</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?= $side_pay ?>">
                                        <a href="payment_voucher.php" class="nav-link ">
                                            <span class="title">Payment Vouchers</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                          
                            <li class="nav-item <?= $side_payinfo ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <span class="title">View Payment Info</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="payment_history.php" class="nav-link ">
                                            <span class="title">Payment History</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item <?= $side_exrate ?>">
                                <a href="add_exrate.php" class="nav-link nav-toggle">
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <span class="title">Exchange Rate</span>
                                    
                                </a>
                                
                            </li>

                        </ul>
                    </div>

                </div>