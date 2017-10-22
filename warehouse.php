<?php
require_once('settings.php');
include('header.php');
$database = new database();
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
                    <span>Manage Warehouse</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <style>
            .top_filer_section td{
                padding: 0px 10px;
            }
            .dt_color{
                color:#000 !important;
            }
            .top_filer_section {
                background: #0072bb;
                border: #ccc 1px solid;
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                border-radius: 10px;
                padding: 20px;
                color: #fff;
                margin: 15px 0;
            }
            .top_filer_section table{
                width: 100%;
            }
            .top_filer_section label {
                font-weight: bold;
                font-size: 12px;
            }

            .bnt_save {
                float: right !important;
                    margin: 10px 10px 0 0 !important;
                width: 125px!important;
                height: 32px !important;
                background: #f4d03f !important;
                color: #000!important;
                border: none !important;
                font-weight: bold !important;
            }
            .top_filer_section h5 {
                padding: 0px 0 10px 10px;
                margin: 0;
                font-size: 17px;
                font-weight: 600;
            }
            .nbt_plus {
                background: #f47b3f !important;
                margin: 24px 0 0 0 !important;
                padding: 1px 15px;

                float: right;
                font-size: 20px;
            }


        </style>


        <div class=" ">

            <div id="add_ware">
                <div class="top_filer_section">
                    <h5>Add Warehouse</h5>
                    <input type="hidden" value="<?= $_SESSION['username'];?>" id="user_saved">
                    <div id="customFields"></div>
                    <button type="submit" id="save_warehouse" class="btn blue bnt_save">Save</button>

                    <div class="clearfix"></div>
                </div>
            </div>
            <label><b>CONTAINER LIST</b></label>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Container#</th>
                        <th>Arrival Date</th>
                        <th>Closing Date</th>
                        <th>Destination</th>
                        <th>Who Saved</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql_wh = "select C.*,T.loc_name from container_list C LEFT JOIN to_location T ON T.id=C.destination where C.status =1";
                    $res_wh = $database->select_query_array($sql_wh);
                    $num_rows = $database->rows($sql_wh);
                    if ($num_rows > 0) {
                        for ($i = 0; $i < count($res_wh); $i++) {
                            ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= $res_wh[$i]->container_no ?></td>
                                <td><?= $res_wh[$i]->arrival_date ?></td>
                                <td><?= $res_wh[$i]->closing_date ?></td>
                                <td><?= $res_wh[$i]->loc_name ?></td>
                                <td><?= $res_wh[$i]->who_saved ?></td>
                                <td><a href="javascript:;" id="<?= $res_wh[$i]->id; ?>" title="Edit Warehouse" onClick="edit_warehouse('<?= $res_wh[$i]->id; ?>')">
                                        <i class="fa fa-edit"></i>
                                    </a></td>
                            </tr>

                            <?php
                        }
                    }
                    ?>

                </tbody>
            </table>


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
    $(document).ready(function () {
        $('#example').DataTable();
    });





    //edit warehouse
    function edit_warehouse(id) {

        var edit_id = id;
        var status = "edit_warehouse";
        var url = 'get_info.php';
        $.post(url, {edit_id: edit_id, status: status}, function (data) {
            alert(data);
            $('#add_ware').html(data);
        });

    }


    $('#save_warehouse').click(function () {

        var flag = '';
        var cont = [];
        var arriv = [];
        var cls = [];
        var dest = [];
        var whosave = [];
        $('.container').each(function () {
            cont.push($(this).val());//push values to array
            if ($(this).val() == '') {
                flag = 'false';
                $(this).css({'border': '1px solid red'});
            }
            else {
                $(this).css({'border': 'none'});
            }
        });
        if (flag == 'false') {
            return false;
        }

        $('.arrival').each(function () {
            arriv.push($(this).val());
        });
        $('.arrival').each(function () {
            arriv.push($(this).val());
        });
        $('.closing').each(function () {
            cls.push($(this).val());
        });
        $('.dest').each(function () {
            dest.push($(this).val());
        });
        $('.whosave').each(function () {
            whosave.push($(this).val());
        });

        var json = '';
        json = json + '{';
        json = json + '"container":"' + cont + '",';
        json = json + '"arrival":"' + arriv + '",';
        json = json + '"closing":"' + cls + '",';
        json = json + '"destination":"' + dest + '",';
        json = json + '"whosaved":"' + whosave + '"';
        json = json + '}';

        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to add warehouse details?',
            title: 'Add Warehouse Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $.ajax({
                        url: "process_add_warehouse.php",
                        async: true,
                        type: 'POST',
                        data: "json=" + encodeURIComponent(json),
                        success: function (data) {
                            if (data == 1) {
                                Lobibox.notify('success', {
                                    delay: false,
                                    sound: true,
                                    closeOnEsc: window.setTimeout(function () {
                                        window.location.href = "warehouse.php";

                                    }, 2000),
                                    title: 'Success',
                                    msg: 'Success Message : Warehouse Added Successfully'
                                });
                            }

                        }
                    });
                }
            }
        });

    });


    $('#edit_warehouse').click(function () {

        var flag = '';
        if ($('#cont_no').val() == '') {
            flag = 'false';
            $(this).css({'border': '1px solid red'});
        }
        if (flag == 'false') {
            return false;
        }

        var json = '';
        json = json + '{';
        var cont_no = $('#cont_no').val();
        json = json + '"container":"' + cont_no + '",';
        var arr_date = $('#arr_date').val();
        json = json + '"arrival":"' + arr_date + '",';
        var cls_date = $('#cls_date').val();
        json = json + '"closing":"' + cls_date + '",';
        var dest_name = $('#dest_name').val();
        json = json + '"destination":"' + dest_name + '",';
        var who_saved = $('#who_saved').val();
        json = json + '"whosaved":"' + who_saved + '",';
        var cont_id=$('#cont_id').val();
        json = json + '"cont_id":"' + cont_id + '"';
        json = json + '}';

        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to update warehouse details?',
            title: 'Update Warehouse Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $.ajax({
                        url: "process_edit_warehouse.php",
                        async: true,
                        type: 'POST',
                        data: "json=" + encodeURIComponent(json),
                        success: function (data) {
                            if (data == 1) {
                                Lobibox.notify('success', {
                                    delay: false,
                                    sound: true,
                                    closeOnEsc: window.setTimeout(function () {
                                        window.location.href = "warehouse.php";

                                    }, 2000),
                                    title: 'Success',
                                    msg: 'Success Message : Warehouse Added Successfully'
                                });
                            }

                        }
                    });
                }
            }
        });

    });

</script>
</body>


</html>

