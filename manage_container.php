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
                    <span>Manage Container</span>
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
                                   
                                       
            <a href="newcontainer.php" class="btn green-meadow btn-sm">New Container</a>
            <a href="excontainer_xls.php" class="btn green-meadow btn-sm">Export</a>
                                  
                                </div>
        

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">

          
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">Sl No.</th>
                <th class="text-center">Number</th>
                <th class="text-center">Dest. of Offloading</th>
                <th class="text-center">Origin Port</th>
                <th class="text-center">Destination Port</th>
                <th class="text-center">Current Location</th>
                <th class="text-center">Origin Time</th>
                <th class="text-center">Destination Time</th>
                <th class="text-center">Container Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
                    <?php
                    $slno = 1;
                    $sql_cont = "SELECT * FROM ex_container ORDER BY id desc";
                    $qry_cont = mysqli_query($conn, $sql_cont);
                    while ($row_cont = $qry_cont->fetch_assoc()) {
                        $id = $row_cont['id'];
                        ?>
                        <tr class="text-center" id="delid_<?=$id?>">
                            <td id="delid_<?=$id?>"><?= $slno; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_cont['container_no']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_cont['desn_off']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_cont['origin_port']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_cont['desn_port']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_cont['desn_port']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_cont['org_date']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_cont['desn_date']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_cont['con_status']; ?></td>
                            
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
                                            if ($privilege_explode[$j] == 30) {
                                                $view_or = "";
                                            }
                                            if ($privilege_explode[$j] == 31) {
                                                $edit_or = "";
                                            }
                                            if ($privilege_explode[$j] == 32) {
                                                $delete_or = "";
                                            }
                                        }
                                    }
                                    ?>
                            <td id="delid_<?=$id?>">
                                <a href="editContainer.php?id=<?=$id;?>" class="delete <?= $view_or?>" id="<?=$id?>">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:;" class="delete <?= $edit_or?>" id="<?= $id; ?>" onClick="delete_row('<?= $id; ?>')">
                                    <i class="fa fa-trash-o fa_font" aria-hidden="true"></i>
                                </a>

                                <a href="viewContainer.php?id=<?=$id;?>" class="delete <?= $delete_or?>" id="<?=$id?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>

                        </tr>
                        <?php $slno++;
                    } ?>
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
    $(document).ready(function() {
    $('#example').DataTable();
} );

function delete_row(id) {

        var del_id = id;
        var url = 'deleteCont.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to delete the Container?',
            title: 'Delete Container',
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
