<?php
require_once('settings.php');
include('header.php');

$edit_id = $_GET['id'];
$sql_ed = "select * from ex_agent where id=$edit_id";
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
                    <a href="manage_agents.php">Manage Agents</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Agents</span>
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
        <h1 class="page-title">View Agents
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="edit_agent" enctype="multipart/form-data">
            <div class="col-md-6">
                <!-- BEGIN SAMPLE FORM PORTLET -->
                <div class="portlet light bordered">

                    <div class="portlet-body form">
                   
                            <div class="form-body">
                                
                                <div class="form-group">
                                    <label>
                                        Agent No# <input type="text" name="agn_no" class="form-control red" value="<?= $res_ed['agn_no'];?>" readonly>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>Agent Name</label>
                                    <div class="input-group">
                                       <input type="text" name="agn_name" class="form-control" value="<?= $res_ed['agn_name'];?>"  readonly> </div>
                                </div>

                                <div class="form-group">
                                    <label>Company Info</label>
                                    <textarea class="form-control" name="comp_name" rows="3" readonly><?= $res_ed['comp_name'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="input-group">
                                        <input type="text" name="agn_email" class="form-control" value="<?= $res_ed['agn_email'];?>"  readonly> </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div class="input-group">
                                        <input type="text" name="agn_phone" class="form-control" value="<?= $res_ed['agn_phone'];?>"  readonly> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Fax</label>
                                    <div class="input-group">
                                        <input type="text" name="agn_fax" class="form-control" value="<?= $res_ed['agn_fax'];?>"  readonly> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <div class="input-group">
                                       <input type="text" name="agn_city" value="<?= $res_ed['agn_city'];?>" class="form-control" readonly> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label>Naira(Opening Balance)</label>
                                            <div class="input-group">
                                                <input type="text" name="naira_bl" class="form-control" value="<?= $res_ed['naira_bl'];?>" id="naira_opn"  readonly>
                                            </div>
                                            <p>Closing Balance:&nbsp;&nbsp;<input type="text" name="naira_cl" value="<?= $res_ed['naira_cl'];?>" class="text-center" id="naira_cls" readonly></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Dollar(Opening Balance)</label>
                                            <div class="input-group">
                                                <input type="text" name="dollar_bl" class="form-control" value="<?= $res_ed['dollar_bl'];?>" id="dollar_opn" readonly>
                                            </div>
                                            <p>Closing Balance: &nbsp;&nbsp;<input type="text" name="dollar_cl" value="<?= $res_ed['dollar_cl'];?>" class="text-center" id="dollar_cls"  readonly></p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

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
        <div id="prefix_1241741341198" class="edit_agent custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Agent Data Edited Successfully
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
 $('#naira_opn').on('keyup', function(){
     var nr_opn=$('#naira_opn').val();
     var nropn=nr_opn.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     $('#naira_cls').val(nropn+'.00');
 }); 
 
 $('#dollar_opn').on('keyup', function(){
     var dl_opn=$('#dollar_opn').val();
     var dlopn=dl_opn.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     $('#dollar_cls').val(dlopn+'.00');
 });   
</script>

<script>

    $('#edit_agent').submit(function (e) {
        e.preventDefault();

        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to edit the agent details?',
            title: 'Edit Agent',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_edit_agent.php'
                        , data: data
                        , cache: false
                        , contentType: false
                        , processData: false
                        , type: 'POST'
                        , success: function (data) {
                            $('#divLoading').removeClass('show');
                            if (data == 1) {
                                $('.edit_agent').show();
                                $('.edit_agent').fadeOut(3000);
                                window.setTimeout(function () {

                                    // Move to a new location or you can do something else
                                    window.location.href = "manage_agents.php";

                                }, 3100);
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
