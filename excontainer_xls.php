<?php
require_once('settings.php');
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=EX-Container.xls ");
header("Content-Transfer-Encoding: binary ");
?>
<table>
        <thead>
        <tr>
        <th style="border:solid 1px #999999;">Number</th>
        <th style="border:solid 1px #999999;">Destination Offloading</th>
        <th style="border:solid 1px #999999;">Orgin Port</th>
        <th style="border:solid 1px #999999;">Destination Port</th>
        <th style="border:solid 1px #999999;">Current Location</th>
        <th style="border:solid 1px #999999;">Orgin Time</th>
        <th style="border:solid 1px #999999;">Destination Time</th>
        <th style="border:solid 1px #999999;">Container Status</th>
       </tr>
        </thead>
<tbody>
                                    
<?php
	
	
	$query = "SELECT * FROM ex_container order by id desc";
	$numresults=$conn->query($query);
	$numrows=$numresults->num_rows;
	
	while ($row= $numresults->fetch_assoc())
	{
	$container_no= $row["container_no"];
	$desn_off = $row["desn_off"];
	$origin_port = $row["origin_port"];
	$desn_port = $row["desn_port"];
        $cur_loc = $row["desn_port"];
        $org_date = $row["org_date"];
        $desn_date = $row["desn_date"];
        $con_status = $row["con_status"];
	
?>
                                    
    <tr class="<?php echo $row_color; ?>">
    <td style="border:solid 1px #999999;"><?php echo $container_no; ?></td> 
    <td style="border:solid 1px #999999;"><?php echo $desn_off; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $origin_port; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $desn_port; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $cur_loc; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $org_date; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $desn_date; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $con_status; ?></td>
    </tr>
<?php
}
?>
</tbody>
</table>


