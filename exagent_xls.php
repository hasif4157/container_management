<?php
require_once('settings.php');
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=EX-Agent.xls ");
header("Content-Transfer-Encoding: binary ");
?>
<table>
        <thead>
        <tr>
        <th style="border:solid 1px #999999;">Number</th>
        <th style="border:solid 1px #999999;">Name</th>
        <th style="border:solid 1px #999999;">Company Name</th>
        <th style="border:solid 1px #999999;">Phone</th>
        <th style="border:solid 1px #999999;">Fax</th>
        <th style="border:solid 1px #999999;">Email</th>
       </tr>
        </thead>
<tbody>
                                    
<?php
	
	
	$query = "SELECT * FROM ex_agent order by id desc";
	$numresults=$conn->query($query);
	$numrows=$numresults->num_rows;
	
	while ($row= $numresults->fetch_assoc())
	{
	$agn_no = $row["agn_no"];
	$agn_name = $row["agn_name"];
	$comp_name = $row["comp_name"];
	$agn_phone = $row["agn_phone"];
	$agn_fax = $row["agn_fax"];
        $agn_email = $row["agn_email"];
	
?>
                                    
    <tr class="<?php echo $row_color; ?>">
    <td style="border:solid 1px #999999;"><?php echo $agn_no; ?></td> 
    <td style="border:solid 1px #999999;"><?php echo $agn_name; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $comp_name; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $agn_phone; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $agn_fax; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $agn_email; ?></td>
    </tr>
<?php
}
?>
</tbody>
</table>