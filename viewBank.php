<?php
require_once('settings.php');
include('header.php');

$edit_id = $_GET['id'];
$sql_ed = "select * from ex_bank where id=$edit_id";
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
                    <a href="manage_bank.php">Manage Bank</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Bank</span>
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
        <h1 class="page-title">View Bank
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
             <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="edit_bank" enctype="multipart/form-data">
            <div class="col-md-6">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">

                    <div class="portlet-body form">
                       
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                       <input type="text" name="bank_name" value="<?=$res_ed['bank_name'];?>" class="form-control" readonly> </div>
                                </div>
                                
                                

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="bank_addr" rows="3" readonly><?=$res_ed['bank_addr']?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <div class="input-group">
                                        <input type="text" name="branch_name" class="form-control" value="<?=$res_ed['branch_name'];?>" readonly> </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sort Code</label>
                                    <div class="input-group">
                                        <input type="text" name="sort_code" class="form-control" value="<?=$res_ed['sort_code'];?>" readonly> </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Dollar Account Number</label>
                                    <div class="input-group">
                                        <input type="text" name="dollar_acc" class="form-control" value="<?=$res_ed['dollar_acc'];?>" readonly> </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Naira Account Number</label>
                                    <div class="input-group">
                                       <input type="text" name="naira_acc" class="form-control" value="<?=$res_ed['naira_acc'];?>" readonly> </div>
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
             </form>
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
