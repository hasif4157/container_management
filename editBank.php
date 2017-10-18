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
        <h1 class="page-title">Edit Bank
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
                                        <span class="input-group-addon">
                                            <i class="fa fa-university" aria-hidden="true"></i>
                                        </span>
                                        <input type="hidden" name="up_id" value="<?=$edit_id?>">
                                        <input type="text" name="bank_name" value="<?=$res_ed['bank_name'];?>" class="form-control" placeholder="Enter Name"> </div>
                                </div>
                                
                                

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="bank_addr" rows="3"><?=$res_ed['bank_addr']?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                           <i class="fa fa-university" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="branch_name" class="form-control" value="<?=$res_ed['branch_name'];?>" placeholder="Enter Name"> </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sort Code</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                           <i class="fa fa-sort" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="sort_code" class="form-control" value="<?=$res_ed['sort_code'];?>" placeholder="Sort Code"> </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Dollar Account Number</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="dollar_acc" class="form-control" value="<?=$res_ed['dollar_acc'];?>" placeholder="Dollar Account Number"> </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Naira Account Number</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="naira_acc" class="form-control" value="<?=$res_ed['naira_acc'];?>" placeholder="Naira Account Number"> </div>
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
            <div class="col-md-6">



            </div>
        </div>
             </form>
        <!-- END DASHBOARD STATS 1-->






    </div>
        <div id="prefix_1241741341198" class="edit_bank custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Bank Details Added Successfully
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

<script>

    $('#edit_bank').submit(function (e) {
        e.preventDefault();

        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to edit the Bank Details?',
            title: 'Edit Bank Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_edit_bank.php'
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
window.location.href = "manage_bank.php";

    }, 2000),
                       
                        title: 'Success',
                        msg: 'Success Message : Bank Edited Successfully' 
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
