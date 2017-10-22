<?php
require_once('settings.php');
include('header.php');
$database = new database();
$sql_cont = "SELECT * FROM container_list where id !='' order by id asc";
$row_cont = $database->select_query_array($sql_cont);
$num_cont = $database->rows($sql_cont);
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
      
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Add Container
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

           
                <div class="col-md-9">
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>Select Container</label>

                                        <select class="form-control selectpicker err_con" id="cont_no" data-live-search="true" title="select container" id="origin_port" name="origin_port">
                                            <?php
                                            for ($i = 0; $i < count($row_cont); $i++) {
                                                echo "<option value='" . $row_cont[$i]->id . "'>" . $row_cont[$i]->container_no . "</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Loading Date</label>
                                        <input  class="form-control datepicker" id="load_date" type="text" value="<?=$row_cont[0]->arrival_date?>">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination Offloading</label>

                                        <select class="form-control  selectpicker err_desoff" data-live-search="true" title="select orgin port" id="dest_off">
                                            <?php
                                            $sql_toloc = "SELECT * FROM to_location where id !='' order by id asc";
                                            $row_toloc = $database->select_query_array($sql_toloc);
                                            for ($i = 0; $i < count($row_toloc); $i++) {
                                                echo "<option value='" . $row_toloc[$i]->id . "'>" . $row_toloc[$i]->loc_name . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sailing Date</label>
                                        <input  class="form-control datepicker" id="sail_date" type="text" value="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Origin Port</label>

                                        <select class="form-control  selectpicker err_orgpt" data-live-search="true" title="select orgin port" id="origin_port">
                                            <?php
                                            $sql_org = "SELECT * FROM port_name where id !='' order by id asc";
                                            $row_org = $database->select_query_array($sql_org);
                                            for ($i = 0; $i < count($row_org); $i++) {
                                                echo "<option value='" . $row_org[$i]->id . "'>" . $row_org[$i]->port . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Closing Date</label>

                                        <input  class="form-control datepicker" id="cls_date" type="text" value="<?=$row_cont[0]->closing_date?>">


                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination Port</label>
                                        <select class="form-control selectpicker err_despt" data-live-search="true" title="select destination port" id="desn_port">
                                            <?php
                                            $sql_dp = "SELECT * FROM port_name where id !='' order by id asc";
                                            $row_dp = $database->select_query_array($sql_dp);
                                            for ($i = 0; $i < count($row_dp); $i++) {
                                                echo "<option value='" . $row_dp[$i]->id . "'>" . $row_dp[$i]->port . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">

                                        <label>Expected Date</label>
                                        <input  class="form-control datepicker" type="text" id="exp_date" value="">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Origin Date & Time</label>
                                        <input  class="form-control  datepicker" id="orgin_date" type="text" value="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Expected Date Of Offloading</label>
                                        <input  class="form-control datepicker" id="exp_date_off" type="text" value="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination Date & Time</label>
                                        <input  class="form-control  datepicker" id="dest_dtm" type="text" value="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Container Status</label>
                                        <select class="form-control" id="con_status">
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
                                        <input type="text" id="con_size" class="form-control spinner" placeholder="Size">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label>Clearing Agent Information</label>
                                        <textarea class="form-control" id="clr_agninfo" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="form-actions">
                                        <button type="submit" id="save_container" class="btn blue">Submit</button>
                                        <button type="button" class="btn default">Cancel</button>
                                    </div> 
                                </div> 
                            </div>
                        </div> 
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div> 

                <div class="col-md-3">
                    <h5>Last 10 locations of this container</h5>  
                </div>
                <div class="clearfix"></div>

         

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


<script type="text/javascript">
    $('#save_container').on('click', function(){
        
        var cont_no= $('#cont_no').val();
        var dest_off= $('#dest_off').val();
        var sail_date= $('#sail_date').val();
        var origin_port= $('#origin_port').val();
        var desn_port= $('#desn_port').val();
        var exp_date= $('#exp_date').val();
        var orgin_date= $('#orgin_date').val();
        var exp_date_off= $('#exp_date_off').val();
        var dest_dtm= $('#dest_dtm').val();
        var con_status= $('#con_status').val();
        var con_size= $('#con_size').val();
        var clr_agninfo= $('#clr_agninfo').val();
        
        if(cont_no == ''){
            $('.err_con').css('border','1px solid red');
            $('.err_con').focus();
        }
        else if(dest_off == ''){
            $('.err_con').css('border','none');
            $('.err_desoff').css('border','1px solid red');
            $('.err_desoff').focus();
        }
        else if(sail_date == ''){
            $('.err_desoff').css('border','none');
            $('#sail_date').css('border','1px solid red');
            $('#sail_date').focus();
        }
        else if(origin_port == ''){
            $('#sail_date').css('border','none');
            $('.err_orgpt').css('border','1px solid red');
            $('.err_orgpt').focus();
        }
        else if(desn_port == ''){
            $('.err_orgpt').css('border','none');
            $('.err_despt').css('border','1px solid red');
            $('.err_despt').focus();
        }
       
       else {
           
           var json = '';
           json = json + '{';
           json = json + '"container_id":"'+cont_no+'",'
           json = json + '"desn_off":"'+dest_off+'",'
           json = json + '"sail_date":"'+sail_date+'",'
           json = json + '"origin_port":"'+origin_port+'",'
           json = json + '"desn_port":"'+desn_port+'",'
           json = json + '"exp_date":"'+exp_date+'",'
           json = json + '"org_date":"'+orgin_date+'",'
           json = json + '"exp_off":"'+exp_date_off+'",'
           json = json + '"desn_date":"'+dest_dtm+'",'
           json = json + '"con_status":"'+con_status+'",'
           json = json + '"con_size":"'+con_size+'",'
           json = json + '"clr_agninfo":"'+clr_agninfo+'"'
           json = json + '}';
           
           Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to add container details?',
            title: 'Add Container Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
    $.ajax({
        url: "process_add_container.php",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            if (data == 1) {
                Lobibox.notify('success', {
                    delay: false,
                    sound: true,
                    closeOnEsc: window.setTimeout(function () {
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
       
       
       
    });
    </script>
</body>

</html>