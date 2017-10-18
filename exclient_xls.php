<?php
require_once('settings.php');
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=EX-Client.xls ");
header("Content-Transfer-Encoding: binary ");
?>
<table >
        <thead>
        <tr>
        <th style="border:solid 1px #999999;">Number</th>
        <th style="border:solid 1px #999999;">Name</th>
        <th style="border:solid 1px #999999;">Category</th>
        <th style="border:solid 1px #999999;">Phone</th>
        <th style="border:solid 1px #999999;">Email</th>
        <th style="border:solid 1px #999999;">Web Page</th>
       </tr>
        </thead>
<tbody>
                                    
<?php
	
	
	$query = "SELECT * FROM ex_clients order by id desc";
	$numresults=$conn->query($query);
	$numrows=$numresults->num_rows;
	
	while ($row= $numresults->fetch_assoc())
	{
	$cust_no= $row["cust_no"];
	$cust_name = $row["cust_name"];
	$cust_category = $row["cust_category"];
	$cust_phone = $row["cust_phone"];
	$cust_email = $row["cust_email"];
        $cust_web = $row["cust_web"];
	
?>
                                    
    <tr class="<?php echo $row_color; ?>">
    <td style="border:solid 1px #999999;"><?php echo $cust_no; ?></td> 
    <td style="border:solid 1px #999999;"><?php echo $cust_name; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $cust_category; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $cust_phone; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $cust_email; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $cust_web; ?></td>
    </tr>
<?php
}
?>
</tbody>
</table>