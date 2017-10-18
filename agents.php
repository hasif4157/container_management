<?php
require_once('settings.php');
include('header.php');

$sql_agnno = mysqli_query($conn, "SELECT id FROM ex_agent order by id desc limit 1");
$num_agntno = mysqli_num_rows($sql_agnno);
$qry_agnno = mysqli_fetch_array($sql_agnno);

if ($num_agntno > 0) {
    $str = $qry_agnno['id'] + 1;
    $agn_no = "AG" . str_pad($str, 5, "0", STR_PAD_LEFT);
} else {
    $str = 1;
    $agn_no = "AG" . str_pad($str, 5, "0", STR_PAD_LEFT);
}
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
        <h1 class="page-title">Add Agents
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="add_agent" enctype="multipart/form-data">
                <div class="col-md-6">
                    <!-- BEGIN SAMPLE FORM PORTLET -->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">

                            <div class="form-body">

                                <div class="form-group">
                                    <label>
                                        Agent No# <input type="text" name="agn_no" class="form-control red" value="<?= $agn_no; ?>" readonly>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>Agent Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" id="agn_name" name="agn_name" class="form-control" placeholder="Enter Name"> </div>
                                </div>

                                <div class="form-group">
                                    <label>Company Info</label>
                                    <textarea class="form-control" id="comp_name" name="comp_name" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" id="agn_email" name="agn_email" class="form-control" placeholder="Email Address"> </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" id="agn_phone" name="agn_phone" class="form-control" placeholder="Enter Phone Number"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Fax</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-fax" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="agn_fax" class="form-control" placeholder="Enter Fax Number"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" id="agn_city" name="agn_city" class="form-control" placeholder="Enter City"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label>Naira(Opening Balance)</label>
                                            <div class="input-group">

                                                <span class="input-group-addon">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                </span>

                                                <input type="text" name="naira_bl" class="form-control" id="naira_opn" placeholder="0.00">

                                            </div>
                                            <p>Closing Balance:&nbsp;&nbsp;<input type="text" name="naira_cl" class="text-center" id="naira_cls" value="" placeholder="0.00"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Dollar(Opening Balance)</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="dollar_bl" class="form-control" id="dollar_opn" placeholder="0.00">

                                            </div>
                                            <p>Closing Balance: &nbsp;&nbsp;<input type="text" name="dollar_cl" class="text-center" id="dollar_cls" value="" placeholder="0.00"></p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

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
                    <div class="col-md-6">



                    </div>
                </div>
            </form>
            <!-- END DASHBOARD STATS 1-->






        </div>
        <div id="prefix_1241741341198" class="add_agent custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Agent Data Added Successfully
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
    $('#naira_opn').on('keyup', function () {
        var nr_opn = $('#naira_opn').val();
        var nropn = nr_opn.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $('#naira_cls').val(nropn + '.00');
    });

    $('#dollar_opn').on('keyup', function () {
        var dl_opn = $('#dollar_opn').val();
        var dlopn = dl_opn.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $('#dollar_cls').val(dlopn + '.00');
    });
</script>

<script>

    $('#add_agent').submit(function (e) {
        e.preventDefault();
        if ($('#agn_name').val() == '') {
            $('#agn_name').css({'border': '1px solid red'});
            $('#agn_name').focus();
        } else if ($('#comp_name').val() == '') {
            $('#comp_name').css({'border': '1px solid red'});
            $('#comp_name').focus();
        } else if ($('#agn_email').val() == '') {
            $('#agn_email').css({'border': '1px solid red'});
            $('#agn_email').focus();
        }else if ($('#agn_phone').val() == '') {
            $('#agn_phone').css({'border': '1px solid red'});
            $('#agn_phone').focus();
        }else if ($('#agn_city').val() == '') {
            $('#agn_city').css({'border': '1px solid red'});
            $('#agn_city').focus();
        } else {
            var data = new FormData(this); // <-- 'this' is your form element
            Lobibox.confirm({
                iconClass: false,
                msg: 'Are you sure you want to add the agent details?',
                title: 'Add Agent',
                callback: function ($this, type, e) {
                    if (type == 'yes') {
                        $('div#divLoading').addClass('show');
                        $.ajax({
                            url: 'process_add_agent.php'
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
window.location.href = "manage_agents.php";

    }, 2000),
                       
                        title: 'Success',
                        msg: 'Success Message : New Agent Added Successfully' 
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
