<?php
require_once('settings.php');
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=EX-Users.xls ");
header("Content-Transfer-Encoding: binary ");
?>
<table >
        <thead>
        <tr>
        <th style="border:solid 1px #999999;">User Name</th>
        <th style="border:solid 1px #999999;">User Email</th>
        <th style="border:solid 1px #999999;">Description</th>
        <th style="border:solid 1px #999999;">Domain Name</th>
        <th style="border:solid 1px #999999;">Employee Type</th>
       </tr>
        </thead>
<tbody>
                                    
<?php
	
	
	$query = "SELECT * FROM crm_owner order by id desc";
	$numresults=$conn->query($query);
	$numrows=$numresults->num_rows;
	
	while ($row= $numresults->fetch_assoc())
	{
	$user_name = $row["user_name"];
	$user_email = $row["user_email"];
	$user_desc = $row["user_desc"];
	$domain_name = $row["domain_name"];
	$employee = $row["employee"];
	
?>
                                    
    <tr class="<?php echo $row_color; ?>">
    <td style="border:solid 1px #999999;"><?php echo $user_name; ?></td> 
    <td style="border:solid 1px #999999;"><?php echo $user_email; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $user_desc; ?></td>
    <td style="border:solid 1px #999999;"><?php echo $domain_name; ?></td>
    <td style="border:solid 1px #999999;">
        <?php 
        $sql_em = "SELECT * FROM emp_type where id=$employee";
	$qry_em=$conn->query($sql_em); 
        $res=$qry_em->fetch_assoc();
        echo $res['emp_type'];
        ?>
    </td>
    </tr>
<?php
}
?>
</tbody>
</table>