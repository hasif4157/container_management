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
                    <span>Exchange Rate</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Add Exchange Rate
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div id="prefix_1241741341198" class="add_category custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Exchange Rate Added Successfully
        </div>
        <div class="row">

            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="add_exrate" enctype="multipart/form-data">
                <div class="col-md-6">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">

                            <div class="form-body">
                                <div class="form-group">
                                    <label>Exchange Rate</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">

                                        </span>
                                        <input type="text" name="ex_rate" id="ex_rate" class="form-control" placeholder="Enter Exchange Rate"> </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>

                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <!-- END SAMPLE FORM PORTLET-->
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </form>
            <div class="col-md-6">



            </div>
        </div>


        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
            <div>
                <div class="btn blue ex_hdsw">View Latest 5 Exchange Rate Details</div>
            </div>
                            
                            <div class="mrg_top10" id="view_exrate" style="display:none;">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">Sl No.</th>
                <th class="text-center">Date</th>
                <th class="text-center">Time</th>
                <th class="text-center">Amount</th>
            </tr>
        </thead>
        
        <tbody>
                    <?php
                    $slno = 1;
                    $sql_exrate = "SELECT * from exchange_rate where status=1 order by id desc LIMIT 5";
                    $qry_exrate = mysqli_query($conn, $sql_exrate);
                    while ($row_exrate = $qry_exrate->fetch_assoc()) {
                        $id = $row_exrate['id'];
                        ?>
                        <tr class="text-center" id="delid_<?=$id?>">
                            <td id="delid_<?=$id?>"><?= $slno; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_exrate['created']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_exrate['created_time']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_exrate['amount']; ?></td>
                            
                        
                        </tr>
                        <?php $slno++;
                    } ?>
                </tbody>
    </table>
                            </div>
                            </div>
                        </div>
                    
                    </div>
                        
        </div>
        
        <div class="clearfix"></div>

         
        <!-- END DASHBOARD STATS 1-->






    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->


<!-- END QUICK SIDEBAR -->

<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
include('footer.php');
?>
<script>
    $('#add_exrate').submit(function (e) {
        e.preventDefault();
if ($('#ex_rate').val() == '') {
                    $('#ex_rate').css({'border': '1px solid red'});
                    $('#ex_rate').focus();
                }
                else {
        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to Add Exchange Rate?',
            title: 'Add Exchange Rate',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'addExrate.php'
                        , data: data
                        , cache: false
                        , contentType: false
                        , processData: false
                        , type: 'POST'
                        , success: function (data) {
                            $('#divLoading').removeClass('show');
                            if (data == 1) {
                                Lobibox.notify('success', {
                        delay: false,
                        sound: true,
                         closeOnEsc:  window.setTimeout(function(){
window.location.href = "add_exrate.php";

    }, 2000),
                       
                        title: 'Success',
                        msg: 'Success Message : Exchange Rate Successfully' 
                    });
                                window.setTimeout(function () {

                                    // Move to a new location or you can do something else
                                    window.location.href = "add_exrate.php";

                                }, 2100);
                            }
                        }
                    });
                }
            }
        });
                }
        return false;
    });
    
    $('.ex_hdsw').on('click', function(){
        $('#view_exrate').toggle(500);
    });
</script>