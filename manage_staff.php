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
                    <span>Manage Staff</span>
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
                                   
                                       
            <a href="staff.php" class="btn green-meadow btn-sm">Add Staff</a>
                                  
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
                <th class="text-center">Name</th>
                <th class="text-center">Department</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Mobile</th>
                <th class="text-center">Office Phone</th>
                <th class="text-center">Office Email</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
                    <?php
                   
                    $slno = 1;
                    $sql_staff = "SELECT * FROM ex_staff ORDER BY id desc";
                    $qry_staff = mysqli_query($conn, $sql_staff);
                    while ($row_staff = $qry_staff->fetch_assoc()) {
                        $id = $row_staff['id'];
                        ?>
                        <tr class="text-center" id="delid_<?=$id?>">
                            <td id="delid_<?=$id?>"><?= $slno; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_staff['emp_no']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_staff['st_name']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_staff['department']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_staff['gender']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_staff['mobile']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_staff['off_phone']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_staff['off_email']; ?></td>
                            
                            <?php
                                    $sql_orpr = mysqli_query($conn, "SELECT * from crm_owner where id='" .$_SESSION['user_id']. "'");
                                    $res_orpr = mysqli_fetch_array($sql_orpr);
                                    $view_or = "disnone";
                                    $edit_or = "disnone";
                                    $delete_or = "disnone";
                                   
                                    $privilege_explode = explode(",", $res_orpr['privileges']);
                                    for ($j = 0; $j <= 44; $j++) {
                                        if (!empty($privilege_explode[$j])) {
                                            if ($privilege_explode[$j] == 12) {
                                                $view_or = "";
                                            }
                                            if ($privilege_explode[$j] == 13) {
                                                $edit_or = "";
                                            }
                                            if ($privilege_explode[$j] == 14) {
                                                $delete_or = "";
                                            }
                                        }
                                    }
                                    ?>
                            <td id="delid_<?=$id?>">
                                <a href="editStaff.php?id=<?=$id;?>" class="delete <?= $view_or?>" id="<?=$id?>">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:;" class="delete <?= $edit_or?>" id="<?= $id; ?>" onClick="delete_row('<?= $id; ?>')">
                                    <i class="fa fa-trash-o fa_font" aria-hidden="true"></i>
                                </a>

                                <a href="viewStaff.php?id=<?=$id;?>" class="delete <?= $delete_or?>" id="<?=$id?>">
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
        var url = 'deleteStaff.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to delete the Staff?',
            title: 'Delete Staff',
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
