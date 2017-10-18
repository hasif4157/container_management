<?php
require_once('settings.php');
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=EX-Location.xls ");
header("Content-Transfer-Encoding: binary ");
?>
<table>
        <thead>
        <tr>
        <th style="border:solid 1px #999999;">Name</th>
        <th style="border:solid 1px #999999;">Phone</th>
        <th style="border:solid 1px #999999;">Fax</th>
        <th style="border:solid 1px #999999;">Email</th>
        <th style="border:solid 1px #999999;">Contact Person</th>
        <th style="border:solid 1px #999999;">Contact Person Mobile</th>
        <th style="border:solid 1px #999999;">City</th>
        <th style="border:solid 1px #999999;">Country</th>
       </tr>
        </thead>
<tbody>
                                    
<?php
	
	
	$query = "SELECT * FROM ex_location order by id desc";
	$numresults=$conn->query($query);
	$numrows=$numresults->num_rows;
	
	while ($row= $numresults->fetch_assoc())
	{
	$loc_name = $row["loc_name"];
	$loc_phone = $row["loc_phone"];
	$loc_fax = $row["loc_fax"];
	$loc_email = $row["loc_email"];
	$loc_cp= $row["loc_cp"];
        $loc_cpp= $row["loc_cpp"];
        $loc_city=$row["loc_city"];
        $loc_country= $row["loc_country"];
	
?>
                                    
    <tr class="<?php echo $row_color; ?>">
    <td style="border:solid 1px #999999;"><?php echo $loc_name; ?></td> 
    <td style="border:solid 1px #999999;"><?php echo $loc_phone; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $loc_fax; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $loc_email; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $loc_cp; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $loc_cpp; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $loc_city; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $loc_country; ?></td>
    </tr>
<?php
}
?>
</tbody>
</table>
