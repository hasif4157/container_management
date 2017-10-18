<?php
require_once('settings.php');
include('header.php');
$database=new database();
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
                    <a href="manage_container.php">Manage Container</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Container</span>
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
        <h1 class="page-title">Add Container
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="add_cotainer" enctype="multipart/form-data">
                <div class="col-md-9">
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>
                                        Container No# <input type="text" name="container_no" class="form-control red" value="">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Loading Date</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="" type="text" id="load_date" value="" name="load_date"  placeholder="Loading Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination of Offloading</label>
                                        <select class="form-control" id="desn_off" name="desn_off">
                                            <option value="">--select Destination--</option>
                                            <option value="india">India</option>
                                            <option value="dxb">DXB</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Sailing Date</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="" type="text" value="" name="sail_date"  placeholder="Sailing Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Origin Port</label>
                                        
                                        <select class="selectpicker" data-live-search="true" title="select orgin port" id="origin_port" name="origin_port">
                                        <?php
                                        $sql_country = "SELECT port FROM port_name where id !='' order by id asc";
                                        $row_country=$database->select_query_array($sql_country);
                                        for($i=0;$i<count($row_country);$i++){
                                        echo "<option value='" . $row_country[$i]->port . "'>" . $row_country[$i]->port . "</option>";
                                            }
                                            ?>
                                       </select>
                                   </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Closing Date</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="" type="text" value="" name="close_date"  placeholder="Closing Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination Port</label>
                                        <select class="selectpicker" data-live-search="true" title="select destination port" id="desn_port" name="desn_port">
                                        <?php
                                        $sql_country = "SELECT port FROM port_name where id !='' order by id asc";
                                        $row_country=$database->select_query_array($sql_country);
                                        for($i=0;$i<count($row_country);$i++){
                                        echo "<option value='" . $row_country[$i]->port . "'>" . $row_country[$i]->port . "</option>";
                                            }
                                            ?>
                                       </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">

                                        <label>Expected Date</label>
                                        <div class="controls input-append date form_datetime" data-date="2010-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="" type="text" value="" name="exp_date"  style="width:250px !important;" placeholder="Expected Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Origin Date & Time</label>
                                        <div class="controls input-append date form_datetime" data-date="2010-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="" type="text" value="" name="org_date"  style="width:250px !important;" placeholder="Origin Date & Time" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Expected Date Of Offloading</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="" type="text" value="" name="exp_off"  placeholder="Offloading Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination Date & Time</label>
                                        <div class="controls input-append date form_datetime" data-date="2010-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="" type="text" name="desn_date" value=""  style="width:250px !important;" placeholder="Destination Date & Time" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Container Status</label>
                                        <select class="form-control" id="con_status" name="con_status">
                                            <option value="">--select container status--</option>
                                            <option value="Container Loaded">Container Loaded</option>
                                            <option value="Container Sealed">Container Sealed (Departed)</option>
                                            <option value="Container Arrived">Container Arrived</option>
                                            <option value="Container Transit">Container Transit</option>
                                            <option value="On Transit to Destination">On Transit to Destination</option>
                                            <option value="Ready for collection">Ready for collection</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Size</label>
                                        <input type="text" id="con_size" name="con_size" class="form-control spinner" placeholder="Size">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Clearing Agent Information</label>
                                        <textarea class="form-control" name="clr_agninfo" rows="3"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div> 
                        <div class="clearfix"></div>
                    </div>
                </div> 

                <div class="col-md-3">
                    <h5>Last 10 locations of this container</h5>  
                </div>
                <div class="clearfix"></div>
                <div class="form-actions">
                    <button type="submit" class="btn blue">Submit</button>
                    <button type="button" class="btn default">Cancel</button>
                </div> 
            </form>

        </div>

        <!-- END DASHBOARD STATS 1-->

        <div id="prefix_1241741341198" class="add_cont custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Staff Data Added Successfully
        </div>




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

    $('#add_cotainer').submit(function (e) {
        e.preventDefault();
        if ($('#load_date').val() == '') {
            $('#load_date').css({'border': '1px solid red'});
            $('#load_date').focus();
        } else if ($('#desn_off').val() == '') {
            $('#desn_off').css({'border': '1px solid red'});
            $('#desn_off').focus();
        } else if ($('#origin_port').val() == '') {
            $('#origin_port').css({'border': '1px solid red'});
            $('#origin_port').focus();
        } else if ($('#desn_port').val() == '') {
            $('#desn_port').css({'border': '1px solid red'});
            $('#desn_port').focus();
        }else if ($('#con_status').val() == '') {
            $('#con_status').css({'border': '1px solid red'});
            $('#con_status').focus();
        }else if ($('#con_size').val() == '') {
            $('#con_size').css({'border': '1px solid red'});
            $('#con_size').focus();
        } else {
            var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to add the Container Details?',
            title: 'Add Container Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_add_container.php'
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
window.location.href = "manage_container.php";

    }, 2000),
                       
                        title: 'Success',
                        msg: 'Success Message : Container Added Successfully' 
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