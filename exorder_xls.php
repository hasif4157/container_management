<?php
require_once('settings.php');
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=EX-Order.xls ");
header("Content-Transfer-Encoding: binary ");
?>
<table>
        <thead>
        <tr>
        <th style="border:solid 1px #999999;">OrderNo/Date</th>
        <th style="border:solid 1px #999999;">Freight Charge</th>
        <th style="border:solid 1px #999999;">Clearing Charge</th>
        <th style="border:solid 1px #999999;">Order Status</th>
        <th style="border:solid 1px #999999;">Customer</th>
        <th style="border:solid 1px #999999;">Quantity</th>
        <th style="border:solid 1px #999999;">Container #/Status</th>
        <th style="border:solid 1px #999999;">Agent Details</th>
        <th style="border:solid 1px #999999;">Prepared By</th>
        <th style="border:solid 1px #999999;">Remarks</th>
       </tr>
        </thead>
<tbody>
                                    
<?php
	
	
	$query = "SELECT * FROM ex_order order by id desc";
	$numresults=$conn->query($query);
	$numrows=$numresults->num_rows;
	
	while ($row= $numresults->fetch_assoc())
	{
	$order_no= $row['order_no'] . "<br>" . $row['order_date'];
	$agn_freight = $row["agn_freight"];
	$agn_clearence = $row["agn_clearence"];
	$order_status = $row["order_status"];
        $or_customer = $row["or_customer"];
        $or_qty = $row["or_qty"];
        $cont_no = $row['cont_no'] . "<br>" . $row['cont_cs'];
        $or_agent = $row["or_agent"];
        $prepared = $row["order_no"];
        $remark = "Remark";
     
	
?>
                                    
    <tr class="<?php echo $row_color; ?>">
    <td style="border:solid 1px #999999;"><?php echo $order_no; ?></td> 
    <td style="border:solid 1px #999999;"><?php echo $agn_freight; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $agn_clearence; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $order_status; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $or_customer; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $or_qty; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $cont_no; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $or_agent; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $prepared; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $remark; ?></td>
    </tr>
<?php
}
?>
</tbody>
</table>


