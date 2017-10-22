<?php
require_once('settings.php');

$database = new database();
if ($_POST['status'] == "agent_info") {

    $sel_agent = $_POST['sel_agent'];
    $sql = "select * from ex_agent where id=$sel_agent";
    $res = $database->select_query_array($sql);
    $agn_no = $res[0]->agn_no;
    $agn_name = $res[0]->agn_name;
    $agn_email = $res[0]->agn_email;
    $agn_phone = $res[0]->agn_phone;
    $arr_agn = [$agn_no, $agn_name, $agn_email, $agn_phone];
    echo json_encode($arr_agn);
}

if ($_POST['status'] == "edit_warehouse") {
    $edit_id = $_POST['edit_id'];
    $sql_wh = "select C.*,T.id as tid,T.loc_name from container_list C LEFT JOIN to_location T ON T.id=C.destination where C.id=$edit_id";
    $res_wh = $database->select_query_array($sql_wh);
    $container_no = $res_wh[0]->container_no;
    $arrival_date = $res_wh[0]->arrival_date;
    $closing_date = $res_wh[0]->closing_date;
    $destination = $res_wh[0]->loc_name;
    ?>
    <div class="top_filer_section">
        <h5>Edit Warehouse</h5>
        <table cellspacing="0" cellpadding="0" >
            <tr>
                <td>
                    <label>Container#</label>
                    <input type="hidden" id="cont_id" value="<?= $res_wh[0]->id; ?>">
                    <input id="cont_no" type="text" class="form-control input-sm" value="<?= $container_no ?>" placeholder="" >

                </td>
                <td>
                    <label>Arrival Date</label>
                    <div>
                        <input id="arr_date"  class="form-control input-sm dt_color datepicker" type="text" value="<?= $arrival_date ?>">
                    </div>

                </td>
                <td>  
                    <label>Closing Date</label>
                    <div>
                        <input id="cls_date"  class="form-control input-sm dt_color datepicker" type="text" value="<?= $closing_date ?>">
                    </div>
                </td>
                <td> <label>Destination</label>
                    <select class="form-control input-sm dest" id="dest_name">
                        <?php
                        $sql_loc = "SELECT * FROM to_location where id !=''";
                        $row_loc = $database->select_query_array($sql_loc);
                        for ($i = 0; $i < count($row_loc); $i++) {
                            ?>
                            <option value="<?= $row_loc[$i]->id ?>" <?php
                            if (($row_loc[$i]->loc_name) == ($destination)) {
                                echo "selected";
                            }
                            ?>><?= strtoupper($row_loc[$i]->loc_name) ?></option>
                                <?php }
                                ?>

                    </select>


                </td>
                <td>   
                    <label>Who Saved</label>
                    <input type="text" id="who_saved" class="form-control input-sm" value="<?= $_SESSION['username']; ?>" readonly>
                </td>

            </tr>

        </table>
        <div id="customFields"></div>
        <button type="submit" id="edit_warehouse" class="btn blue bnt_save">Update</button>

        <div class="clearfix"></div>
    </div>

<?php }
?>

<script>
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
        var cont_id = $('#cont_id').val();
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
                                    msg: 'Success Message : Warehouse Updated Successfully'
                                });
                            }

                        }
                    });
                }
            }
        });

    });
</script>