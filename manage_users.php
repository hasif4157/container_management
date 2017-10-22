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
                    $sql_user = "SELECT C.*,E.emp_type FROM crm_owner C LEFT JOIN emp_type E ON E.id=C.employee  ORDER BY C.id desc";
                    $num_rows=$database->rows($sql_user);
                    $row_user=$database->select_query_array($sql_user);
                    for($i=0;$i<count($row_user);$i++){
                        $id = $row_user[$i]->id;
                        ?>
                        <tr id="delid_<?=$id?>">
                            <td id="delid_<?=$id?>"><?= $slno; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_user[$i]->user_name; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_user[$i]->user_email; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_user[$i]->user_desc; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_user[$i]->domain_name; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_user[$i]->emp_type; ?></td>
                            
                            <?php
                                    $sql_orpr = "SELECT * from crm_owner where id='" .$_SESSION['user_id']. "'";
                                    $res_orpr = $database->select_query_array($sql_orpr);
                                    $view_or = "disnone";
                                    $edit_or = "disnone";
                                    $delete_or = "disnone";
                                    $privilege_array = '';
                                    $privilege_explode = explode(",", $res_orpr[0]->privileges);
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

                                 <?php if ($row_user[$i]->status == 1) { ?>
                                    <a href="javascript:;" class="delete <?= $edit_or ?>" id="<?= $id ?>" onClick="disable_row('<?= $id ?>')" title="Disable User">
                                        <i class="fa fa-check-square-o fa_font" aria-hidden="true"></i>
                                    </a>    
                                <?php } if ($row_user[$i]->status == 0) { ?>
                                    <a href="javascript:;" class="delete <?= $edit_or ?>" id="<?= $id ?>" onClick="enable_row('<?= $id ?>')" title="Enable User">
                                        <i class="fa fa-ban fa_font text-danger" aria-hidden="true"></i>
                                    </a> 
                                <?php } ?>

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

function disable_row(id) {

        var des_id = id;
        var status="disable_user";
        
        var url = 'deleteUser.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to disable the User?',
            title: 'Disable User',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    
                    $.post(url,{des_id:des_id,status:status}, function(data){
                   
                     if (data == 1) {
                                Lobibox.notify('success', {
                                    delay: false,
                                    sound: true,
                                    closeOnEsc: window.setTimeout(function () {
                                        window.location.href = "manage_users.php";

                                    }, 2000),
                                    title: 'Success',
                                    msg: 'Success Message : User Disabled Successfully'
                                });
                            }

                    });
                }
            }
        });
    }
    
function enable_row(id) {

        var enb_id = id;
        var status="enable_user";
        
        var url = 'deleteUser.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to enable the User?',
            title: 'Enable User',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    
                    $.post(url,{enb_id:enb_id,status:status}, function(data){
                   
                     if (data == 1) {
                                Lobibox.notify('success', {
                                    delay: false,
                                    sound: true,
                                    closeOnEsc: window.setTimeout(function () {
                                        window.location.href = "manage_users.php";

                                    }, 2000),
                                    title: 'Success',
                                    msg: 'Success Message : User Enabled Successfully'
                                });
                            }

                    });
                }
            }
        });
    }
    </script>
</body>


</html>
