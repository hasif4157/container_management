<?php
require_once('settings.php');
include('header.php');
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
                    <span>Manage Location</span>
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
        <div class="form-group">


            <a href="locations.php" class="btn green-meadow btn-sm">Add Location</a>
            <a href="exlocation_xls.php" class="btn green-meadow btn-sm">Export</a>

        </div>


        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">

<div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover order_table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Sl No.</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Phone </th>
                        <th scope="col" class="text-center">Fax </th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Contact Person</th>
                        <th scope="col" class="text-center">Contact Person Mobile No.</th>
                        <th scope="col" class="text-center">City</th>
                        <th scope="col" class="text-center">Country</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $slno = 1;
                    $sql_loc = "SELECT * FROM ex_location ORDER BY id desc";
                    $qry_loc = mysqli_query($conn, $sql_loc);
                    while ($row_loc = $qry_loc->fetch_assoc()) {
                        $id = $row_loc['id'];
                        
                        ?>
                    <tr id="delid_<?=$id?>" class="text-center">
                            <td id="delid_<?=$id?>"><?= $slno; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_loc['loc_name']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_loc['loc_phone']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_loc['loc_fax']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_loc['loc_email']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_loc['loc_cp']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_loc['loc_cpp']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_loc['loc_city']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_loc['loc_country']; ?></td>
                            
                            <?php
                                    $sql_orpr = mysqli_query($conn, "SELECT * from crm_owner where id='" .$_SESSION['user_id']. "'");
                                    $res_orpr = mysqli_fetch_array($sql_orpr);
                                    $view_or = "disnone";
                                    $edit_or = "disnone";
                                    $delete_or = "disnone";
                                    $privilege_array = '';
                                    $privilege_explode = explode(",", $res_orpr['privileges']);
                                    for ($j = 0; $j <= 44; $j++) {
                                        if (!empty($privilege_explode[$j])) {
                                            if ($privilege_explode[$j] == 27) {
                                                $view_or = "";
                                            }
                                            if ($privilege_explode[$j] == 28) {
                                                $edit_or = "";
                                            }
                                            if ($privilege_explode[$j] == 29) {
                                                $delete_or = "";
                                            }
                                        }
                                    }
                                    ?>
                            <td id="delid_<?=$id?>">
                                <a href="editLoc.php?id=<?=$id;?>" class="delete <?= $view_or?>" id="<?=$id?>">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:;" class="delete <?= $edit_or?>" id="<?= $id; ?>" onClick="delete_row('<?= $id; ?>')">
                                    <i class="fa fa-trash-o fa_font" aria-hidden="true"></i>
                                </a>

                                <a href="viewLoc.php?id=<?=$id;?>" class="delete <?= $delete_or?>" id="<?=$id?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>

                        </tr>
                        <?php $slno++;
                    } ?>
                </tbody>
            </table>
</div>

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

    function delete_row(id) {

        var del_id = id;
        var url = 'deleteLoc.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to delete the Location?',
            title: 'Delete Location',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    
                    $.post(url,{del_id:del_id}, function(data){
                     $('#delid_'+id).hide(2000);
                       window.setTimeout(function(){

        // Move to a new location or you can do something else
     location.reload();

    }, 2100);

                    });
                }
            }
        });
    }
    
   
</script>
</body>


</html>

