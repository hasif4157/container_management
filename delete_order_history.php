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
                    <a href="manage_order.php">Manage Order</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Delete History</span>
                </li>
            </ul>
          
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <div class="form-group"> 


           

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
                        <th scope="col" class="text-center">Order No</th>
                        <th scope="col" class="text-center">Deleted By</th>
                        <th scope="col" class="text-center">Deleted Date&Time</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $slno = 1;
                    
                    $sql_del = "SELECT ord.*, usr.user_name FROM ex_order ord Left Join  crm_owner usr ON usr.id=ord.user_id where ord.status=0 ORDER BY id desc";
                    $delhis_res=$database->select_query_array($sql_del);
                    $num_rows=$database->rows($sql_del);
                    if($num_rows > 0){
                    for($i=0;$i<count($delhis_res);$i++){
                         $id = $delhis_res[$i]->id;
                        
                        ?>
                    <tr class="text-center">
                         <td id="delid_<?= $id ?>"><?php echo $slno; ?></td>
                            <td id="delid_<?= $id ?>"><?php echo $delhis_res[$i]->order_no; ?></td>
                             <td id="delid_<?= $id ?>"><?php 
                            echo $delhis_res[$i]->user_name;
                            ?></td>
                            <td id="delid_<?= $id ?>">
                           <?php echo $delhis_res[$i]->modified." ".$delhis_res[$i]->modified_time; ?>
                            </td>
                            <td id="delid_<?= $id ?>"> 
                                <a href="javascript:;" class="delete" id="<?= $id ?>" onClick="enable_row('<?= $id; ?>')" title="Enable Deleted Order" >
                                           <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </a>
                            </td>

                        </tr>
                        <?php $slno++;
                    } 
                    }?>
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

</body>

<script>
  

    function enable_row(id) {

        var del_id = id;
        var status = "enable_or";
        var url = 'deleteOrder.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to enable the Order?',
            title: 'Enable Order',
            callback: function ($this, type, e) {
                if (type == 'yes') {

                    $.post(url, {del_id: del_id,status:status}, function (data) {
                        $('#delid_' + id).hide(1000);
                        window.setTimeout(function () {

                            // Move to a new location or you can do something else
                            location.reload();

                        }, 1100);

                    });
                }
            }
        });
    }
</script>

</html>

