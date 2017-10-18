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
                    <span>Manage Category</span>
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


            <a href="add_category.php" class="btn green-meadow btn-sm">Add Category</a>

        </div>


        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">


            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">Sl No.</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Action</th>
                        
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $slno = 1;
                    $sql_cat = "SELECT * FROM ex_category ORDER BY id desc";
                    $qry_cat = mysqli_query($conn, $sql_cat);
                    while ($row_cat = $qry_cat->fetch_assoc()) {
                        $id = $row_cat['id'];
                        ?>
                        <tr class="text-center" id="delid_<?=$id?>">
                            <td id="delid_<?=$id?>"><?= $slno; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_cat['category']; ?></td>
                            <td id="delid_<?=$id?>">
                                <a href="edit_category.php?id=<?=$id;?>" class="delete" id="<?=$id?>">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:;" class="delete" id="<?= $id; ?>" onClick="delete_row('<?= $id; ?>')">
                                    <i class="fa fa-trash-o fa_font" aria-hidden="true"></i>
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
    $(document).ready(function () {
        $('#example').DataTable();
    });

    function delete_row(id) {

        var del_id = id;
        var url = 'deleteCat.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to delete the Category?',
            title: 'Delete Category',
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

