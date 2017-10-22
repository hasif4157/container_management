<?php
require_once('settings.php');
include('header.php');
$database=new database();
?>

<upendra>Tag Missing</upendra>

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
                    <span>Manage Bank</span>
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
           <a href="banks.php" class="btn green-meadow btn-sm">Add Bank</a>
           <a href="exbank_xls.php" class="btn green-meadow btn-sm">Export</a>
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
                        <th scope="col" class="text-center">Address </th>
                        <th scope="col" class="text-center">Branch </th>
                        <th scope="col" class="text-center">Dollar Account </th>
                        <th scope="col" class="text-center">Naira Account </th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $slno = 1;
                    $sql_bank = "SELECT * FROM ex_bank ORDER BY id desc";
                    $num_bk=$database->rows($sql_bank);
                    $row_bank = $database->select_query_array($sql_bank);
                    if($num_bk>0){
                    for($i=0;$i<count($row_bank);$i++) {
                        $id = $row_bank[$i]->id;
                        
                        ?>
                    <tr id="delid_<?=$id?>" class="text-center">
                            <td id="delid_<?=$id?>"><?= $slno; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_bank[$i]->bank_name; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_bank[$i]->bank_addr; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_bank[$i]->branch_name; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_bank[$i]->dollar_acc; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_bank[$i]->naira_acc; ?></td>
                            
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
                                            if ($privilege_explode[$j] == 24) {
                                                $view_or = "";
                                            }
                                            if ($privilege_explode[$j] == 25) {
                                                $edit_or = "";
                                            }
                                            if ($privilege_explode[$j] == 26) {
                                                $delete_or = "";
                                            }
                                        }
                                    }
                                    ?>
                            <td id="delid_<?=$id?>">
                                <a href="editBank.php?id=<?=$id;?>" class="delete <?= $view_or?>" id="<?=$id?>">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:;" class="delete <?= $edit_or?>" id="<?= $id; ?>" onClick="delete_row('<?= $id; ?>')">
                                    <i class="fa fa-trash-o fa_font" aria-hidden="true"></i>
                                </a>

                                <a href="viewBank.php?id=<?=$id;?>" class="delete <?= $delete_or?>" id="<?=$id?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>

                        </tr>
                        <?php $slno++;
                    }} ?>
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
        var url = 'deleteBank.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to delete the Bank Details?',
            title: 'Delete Bank Details',
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

