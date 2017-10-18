<?php
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
                    <span>Manage Users</span>
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
                                   
                                       
            <a href="users.php" class="btn green-meadow btn-sm">Add Users</a>
            <a href="exusers_xls.php" class="btn green-meadow btn-sm">Export</a>
                                  
                                </div>
        

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">

          
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sl No.</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Description</th>
                <th>Domain</th>
                <th>Employee</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
                    <?php
                    $slno = 1;
                    $sql_user = "SELECT U.*,E.emp_type FROM crm_owner U LEFT JOIN emp_type E ON E.id=U.employee ORDER BY id desc";
                    $qry_user = mysqli_query($conn, $sql_user);
                    while ($row_user = $qry_user->fetch_assoc()) {
                        $id = $row_user['id'];
                        ?>
                        <tr id="delid_<?=$id?>">
                            <td id="delid_<?=$id?>"><?= $slno; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_user['user_name']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_user['user_email']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_user['user_desc']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_user['domain_name']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_user['emp_type']; ?></td>
                            
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
                                            if ($privilege_explode[$j] == 15) {
                                                $view_or = "";
                                            }
                                            if ($privilege_explode[$j] == 16) {
                                                $edit_or = "";
                                            }
                                            if ($privilege_explode[$j] == 17) {
                                                $delete_or = "";
                                            }
                                        }
                                    }
                                    ?>
                            <td id="delid_<?=$id?>">
                                <a href="editUsers.php?id=<?=$id;?>" class="delete <?= $view_or?>" id="<?=$id?>">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:;" class="delete <?= $edit_or?>" id="<?= $id; ?>" onClick="delete_row('<?= $id; ?>')">
                                    <i class="fa fa-trash-o fa_font" aria-hidden="true"></i>
                                </a>

                                <a href="viewUser.php?id=<?=$id;?>" class="delete <?= $delete_or?>" id="<?=$id?>">
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

$('#password-1').hidePassword(true);

function delete_row(id) {

        var del_id = id;
        var url = 'deleteUser.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to delete the User?',
            title: 'Delete User',
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
