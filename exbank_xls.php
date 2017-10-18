<?php
require_once('settings.php');
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=EX-Bank.xls ");
header("Content-Transfer-Encoding: binary ");
?>
<table>
        <thead>
        <tr>
        <th style="border:solid 1px #999999;">Name</th>
        <th style="border:solid 1px #999999;">Address</th>
        <th style="border:solid 1px #999999;">Branch</th>
        <th style="border:solid 1px #999999;">Dollar Account</th>
        <th style="border:solid 1px #999999;">Naira Account</th>
       </tr>
        </thead>
<tbody>
                                    
<?php
	
	
	$query = "SELECT * FROM ex_bank order by id desc";
	$numresults=$conn->query($query);
	$numrows=$numresults->num_rows;
	
	while ($row= $numresults->fetch_assoc())
	{
	$bank_name = $row["bank_name"];
	$bank_addr = $row["bank_addr"];
	$branch_name = $row["branch_name"];
	$dollar_acc = $row["dollar_acc"];
	$naira_acc = $row["naira_acc"];
	
?>
                                    
    <tr class="<?php echo $row_color; ?>">
    <td style="border:solid 1px #999999;"><?php echo $bank_name; ?></td> 
    <td style="border:solid 1px #999999;"><?php echo $bank_addr; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $branch_name; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $dollar_acc; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $naira_acc; ?></td>
    </tr>
<?php
}
?>
</tbody>
</table>
