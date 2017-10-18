<?php
require_once('settings.php');
include('header.php');

$edit_id = $_GET['id'];
$sql_ed = "select * from ex_container where id=$edit_id";
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
        <h1 class="page-title">Edit Container
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="edit_cotainer" enctype="multipart/form-data">
                <div class="col-md-9">
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="up_id" value="<?=$edit_id?>">
                                        Container No# <input type="text" name="container_no" class="form-control red" value="<?=$res_ed['container_no']?>" readonly>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Loading Date</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="" type="text" value="<?=$res_ed['load_date']?>" name="load_date"  placeholder="Loading Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination of Offloading</label>
                                        <select class="form-control" name="desn_off">
                                            <option>--select Destination--</option>
                                            <option value="india" <?php echo $res_ed['desn_off'] == 'india' ? 'selected="selected"' : '' ?>>India</option>
                                            <option value="dxb" <?php echo $res_ed['desn_off'] == 'dxb' ? 'selected="selected"' : '' ?>>DXB</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Sailing Date</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="" type="text" value="<?=$res_ed['sail_date']?>" name="sail_date"  placeholder="Sailing Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Origin Port</label>
                                        <select class="form-control" data-live-search="true" title="select country" id="origin_port" name="origin_port">
                                        <?php
                                        $sql_country = mysqli_query($conn, "SELECT country_name FROM apps_countries where id !=''");
                                        while ($row_country = mysqli_fetch_array($sql_country)) {
                                         if($res_ed['origin_port'] == $row_country['country_name']) {$selected="selected";}else{$selected= "";} 
                                        echo "<option value='" . $row_country['country_name'] . "' " . $selected . ">" . $row_country['country_name'] . "</option>";
                                        }
                                        ?>
                                       </select> 
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Closing Date</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="" type="text" value="<?=$res_ed['close_date']?>" name="close_date"  placeholder="Closing Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination Port</label>
                                       <select class="form-control" data-live-search="true" title="select country" id="desn_port" name="desn_port">
                                        <?php
                                        $sql_country = mysqli_query($conn, "SELECT country_name FROM apps_countries where id !=''");
                                        while ($row_country = mysqli_fetch_array($sql_country)) {
                                         if($res_ed['desn_port'] == $row_country['country_name']) {$selected="selected";}else{$selected= "";} 
                                        echo "<option value='" . $row_country['country_name'] . "' " . $selected . ">" . $row_country['country_name'] . "</option>";
                                        }
                                        ?>
                                       </select> 
                                        
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">

                                        <label>Expected Date</label>
                                        <div class="controls input-append date form_datetime" data-date="2010-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="" type="text" value="<?=$res_ed['exp_date']?>" name="exp_date"  style="width:250px !important;" placeholder="Expected Date" readonly>
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
                                            <input class="" type="text" value="<?=$res_ed['org_date']?>" name="org_date"  style="width:250px !important;" placeholder="Origin Date & Time" readonly>
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
                                            <input class="" type="text" value="<?=$res_ed['exp_off']?>" name="exp_off"  placeholder="Offloading Date" readonly>
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
                                            <input class="" type="text" name="desn_date" value="<?=$res_ed['desn_date']?>"  style="width:250px !important;" placeholder="Destination Date & Time" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Container Status</label>
                                        <select class="form-control" name="con_status">
                                            <option>--select container status--</option>
                                            <option value="Container Loaded" <?php echo $res_ed['con_status'] == 'Container Loaded' ? 'selected="selected"' : '' ?>>Container Loaded</option>
                                            <option value="Container Sealed" <?php echo $res_ed['con_status'] == 'Container Sealed' ? 'selected="selected"' : '' ?>>Container Sealed (Departed)</option>
                                            <option value="Container Arrived" <?php echo $res_ed['con_status'] == 'Container Arrived' ? 'selected="selected"' : '' ?>>Container Arrived</option>
                                            <option value="Container Transit" <?php echo $res_ed['con_status'] == 'Container Transit' ? 'selected="selected"' : '' ?>>Container Transit</option>
                                            <option value="On Transit to Destination" <?php echo $res_ed['con_status'] == 'On Transit to Destination' ? 'selected="selected"' : '' ?>>On Transit to Destination</option>
                                            <option value="Ready for collection" <?php echo $res_ed['con_status'] == 'Ready for collection' ? 'selected="selected"' : '' ?>>Ready for collection</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Size</label>
                                        <input type="text" name="con_size" value="<?=$res_ed['con_size']?>" class="form-control spinner" placeholder="Size">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mrg_right10">
                                        <label>Clearing Agent Information</label>
                                        <textarea class="form-control" name="clr_agninfo" rows="3"><?=$res_ed['clr_agninfo']?></textarea>
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
                    <button type="submit" class="btn blue">Update</button>
                    <button type="button" class="btn default">Cancel</button>
                </div> 
            </form>

        </div>

        <!-- END DASHBOARD STATS 1-->

        <div id="prefix_1241741341198" class="edit_cont custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Container Data Edited Successfully
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

    $('#edit_cotainer').submit(function (e) {
        e.preventDefault();

        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to edit the Container Details?',
            title: 'Edit Container Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_edit_cont.php'
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
                        msg: 'Success Message : Container Edited Successfully' 
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