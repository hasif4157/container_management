<?php
require_once('settings.php');

$agn_id = $_POST['agn_id'];
$sql_agn = "select O.* from ex_order O LEFT JOIN ex_agent A ON A.agn_no=O.or_agnum where A.id=$agn_id";
$qry_agn = $conn->query($sql_agn);
$num_rows = mysqli_num_rows($qry_agn);
?>

<div class="table-scrollable">
    <table class="table table-condensed table-hover" border="1">
        <thead>
            <tr>
                <th>Pay</th>
                <th>Order No.</th>
                <th>Customer</th>
                <th>Container No</th>
                <th>Freight Commn</th>
                <th>Pay Freight Commn</th>
                <th>Discount($)</th>
                <th>Sum of Total($)</th>
                <th>Clearing Commn Chrg</th>
                <th>Pay Clearing Commn</th>
                <th>Discount(Naira)</th>
                <th>Sum of Total(Naira)</th>
            </tr>
        </thead>
        <tbody>
        <input type="hidden" class="form-control" value="<?=$num_rows;?>" id="tot_rows">
            <?php
            if ($num_rows > 0) {
                
                $slno=1;
                while ($row_order = $qry_agn->fetch_array()) {
                    $id = $row_order['id'];
                    ?>
           
                    <tr>
                       
                        <td>Pay</td> 
                        <td><input type="text" name="order_no[]" class="form-control" value="<?= $row_order['order_no']; ?>" readonly></td>
                        <td><input type="text" name="customer[]" class="form-control" value="<?= $row_order['or_customer']; ?>" readonly></td>
                        <td><input type="text" name="cont_no[]" class="form-control" value="<?= $row_order['cont_no']; ?>" readonly></td>
                        <td><input type="text" name="fr_comn[]" class="form-control" value="<?= $row_order['comn_freight']; ?>" id="comn_fr<?=$slno;?>" placeholder="0.00" readonly></td>
                        <td><input type="text" name="payfr_comn[]" class="form-control pay_frcn" temp_id="<?= $slno ?>" id="pay_frcn<?=$slno;?>" placeholder="0.00"></td>
                        <td><input type="text" name="payfr_disc[]" class="form-control pay_frcn" temp_id="<?= $slno ?>" id="disc_fr<?=$slno;?>" placeholder="0.00"></td>
                        <td><input type="text" name="payfr_sum[]" class="form-control" id="sum_dlr<?=$slno;?>" placeholder="0.00"></td>
                        <td><input type="text" name="clr_comn[]" class="form-control" value="<?= $row_order['comn_clearence']; ?>" id="comn_clr<?=$slno;?>" placeholder="0.00" readonly></td>
                        <td><input type="text" name="payclr_comn[]" class="form-control pay_clcn" temp_id="<?= $slno ?>"  id="pay_clcn<?=$slno;?>" placeholder="0.00"></td>
                        <td><input type="text" name="payclr_disc[]" class="form-control pay_clcn" temp_id="<?= $slno ?>" id="disc_clr<?=$slno;?>" placeholder="0.00"></td>
                        <td><input type="text" name="payclr_sum[]" class="form-control" id="sum_naira<?=$slno;?>" placeholder="0.00"></td>

                    </tr>
                    <?php
                    $slno++;
                }
            }
            ?>
        </tbody>
    </table>
</div>
<script>
   $(document).ready(function(){
     $('body').on('keyup','.pay_frcn',function (){
         var temp_id=$(this).attr('temp_id');
       
         var pay_frcn=$('#pay_frcn'+temp_id).val();
         var disc_fr=$('#disc_fr'+temp_id).val();
         if(pay_frcn == ''){
             pay_frcn=0;
         }
         if(disc_fr == ''){
             disc_fr=0;
         }
         var sum=parseInt(pay_frcn)+parseInt(disc_fr);
         var comn_fr=$('#comn_fr'+temp_id).val();
         var sub_t=parseInt(comn_fr)- parseInt(sum);
         $('#sum_dlr'+temp_id).val(sub_t+'.00');
     })
     $('body').on('keyup','.pay_clcn',function (){
         var temp_id=$(this).attr('temp_id');
       
         var pay_clcn=$('#pay_clcn'+temp_id).val();
         var disc_clr=$('#disc_clr'+temp_id).val();
         if(pay_clcn == ''){
             pay_clcn=0;
         }
         if(disc_clr == ''){
             disc_clr=0;
         }
         var sum=parseInt(pay_clcn)+parseInt(disc_clr);
         var comn_clr=$('#comn_clr'+temp_id).val();
         var sub_t=parseInt(comn_clr)- parseInt(sum);
         $('#sum_naira'+temp_id).val(sub_t+'.00');
     })
    }); 
    </script>