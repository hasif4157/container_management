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
                    <span>Manage Employee Type</span>
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


            <a href="add_emptype.php" class="btn green-meadow btn-sm">Add Employee Type</a>

        </div>


        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">


            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">Sl No.</th>
                        <th class="text-center">Employee Type</th>
                        <th class="text-center">Action</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $slno = 1;
                    $sql_emptype = "SELECT * FROM emp_type ORDER BY id desc";
                    $qry_emptype = mysqli_query($conn, $sql_emptype);
                    while ($row_emptype = $qry_emptype->fetch_assoc()) {
                        $id = $row_emptype['id'];
                        ?>
                        <tr id="delid_<?= $id ?>" class="text-center">
                            <td id="delid_<?= $id ?>"><?= $slno; ?></td>
                            <td id="delid_<?= $id ?>"><?= $row_emptype['emp_type']; ?></td>
                            <td id="delid_<?= $id ?>">
                                <a href="edit_emptype.php?id=<?= $id; ?>" class="delete" id="<?= $id ?>">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:;" class="delete" id="<?= $id; ?>" onClick="delete_row('<?= $id; ?>')">
                                    <i class="fa fa-trash-o fa_font" aria-hidden="true"></i>
                                </a>
                            </td>

                        </tr>
                        <?php $slno++;
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

    function delete_row(id) {

        var del_id = id;
        var url = 'deleteEmptype.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to delete the Employee Type?',
            title: 'Delete Employee Type',
            callback: function ($this, type, e) {
                if (type == 'yes') {

                    $.post(url, {del_id: del_id}, function (data) {
                        $('#delid_' + id).hide(2000);
                        window.setTimeout(function () {

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

