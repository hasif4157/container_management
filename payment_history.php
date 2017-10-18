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
                    <span>Payment History</span>
                </li>
            </ul>
            
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
       
        

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">

          
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">Sl No.</th>
                <th class="text-center">Order No</th>
                <th class="text-center">Customer Name</th>
                <th class="text-center">Container No</th>
                <th class="text-center">Destination Port</th>
                <th class="text-center">Freight</th>
                <th class="text-center">Clearance</th>
                <th class="text-center">Exchange Rate</th>
                <th class="text-center">Total Amt</th>
                <th class="text-center">Paid Amt</th>
                <th class="text-center">Discounts</th>
                <th class="text-center">Total Sum</th>
                <th class="text-center">Collected Date</th>
                <th class="text-center">Over Payment</th>
            </tr>
        </thead>
        
        <tbody>
                    <?php
                    $slno = 1;
                    $sql_ord = "SELECT ord.*,loc.loc_name as loc_name FROM ex_order ord LEFT JOIN ex_location loc ON loc.id=ord.to_loc where ord.status=1 ORDER BY id desc";
                    $qry_ord = mysqli_query($conn, $sql_ord);
                    while ($row_ord = $qry_ord->fetch_assoc()) {
                        $id = $row_ord['id'];
                        ?>
                        <tr class="text-center" id="delid_<?=$id?>">
                            <td id="delid_<?=$id?>"><?= $slno; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_ord['order_no']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_ord['or_customer']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_ord['cont_no']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_ord['loc_name']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_ord['agn_freight']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_ord['agn_clearence']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_ord['ex_rate']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_ord['tot_sum']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_ord['paid_amt']; ?></td>
                            <?php
                            if($row_ord['paid_amt'] < $row_ord['tot_sum']){
                               $discount= $row_ord['tot_sum'] - $row_ord['paid_amt'];
                            }
                            else {
                              $discount=0;  
                            }
                            
                            if($row_ord['paid_amt'] > $row_ord['tot_sum']){
                               $ovr_pay= $row_ord['paid_amt'] - $row_ord['tot_sum'];
                            }
                            else {
                              $ovr_pay=0;  
                            }
                            ?>
                            <td id="delid_<?=$id?>"><?=$discount?></td>
                            <td id="delid_<?=$id?>"><?=$row_ord['tot_sum']?></td>
                            <td id="delid_<?=$id?>"><?=$row_ord['modified'];?></td>
                            <td id="delid_<?=$id?>"><?=$ovr_pay?></td>
                           
                        
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
    $('#example').DataTable( {
        "scrollX": true
    } );
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
