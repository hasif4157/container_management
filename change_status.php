<?php
require_once('settings.php');
$date=date('Y-m-d');
$time=date('Y-m-d H:i:s');
$order_status=$_POST['status_type'];
$order_id=$_POST['order_id'];
$order_no=$_POST['order_no'];
$agn_phone="971504503219";
$cust_phone="971551026198";
$cust_name=$_POST['cust_name'];
$to_addr=$_POST['to_addr'];
$container_no=$_POST['container_no'];

$message_agn="Excellent Way Group your customer's container goods ".$order_status."
        order No: ".$order_no.", 
	Container No: ".$container_no.", 
        Customer Name: ".$cust_name.", 
        Customer Mobile: ".$cust_phone.",
        Destination: ".$to_addr." ";


$message_cus="Excellent Way Group your container goods ".$order_status."
        Tracking No: ".$order_no.", 
	Container No: ".$container_no.", 
        Customer Name: ".$cust_name.", 
        Customer Mobile: ".$cust_phone.",
        Destination: ".$to_addr.", Thank You for using Excellent Way Services";

/*$sql = "INSERT INTO `ex_order` (`modified`, `modified_time`, `order_status`,`stchange_date`)
        VALUES ('".$date."','".$time."','".$order_status."', '".$stchange_date."')";
	$res = $conn->query($sql);*/
        



      
	
			  $username = "excellentway";
			  $password = "way2ng";
			  $sender   = "Excelentway";
			  $message1       = trim(preg_replace('/\s\s+/', ' ', $message_agn));
			  $mob            = $agn_phone;
			  $mob1           = trim(preg_replace('/\s\s+/', ' ', $mob));
			//$relink='http://onlysms.ae/api/api_http.php?username=EXCELLENTWAY&password=way2ng&senderid=Excelentway&to='.$mob.'&text='.$message1.'&type=text';	
		?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		$.ajax({
			type: "GET",
			url: "http://smpp2.onlysms.ae/api/api_http.php?",
			data: { username: "EXCELLENTWAY", password: "way2ng",  senderid: "Excelentway",  to: "<?php echo $mob; ?>",  text: "<?php echo $message1; ?>", type: "text"}
		}).done(function( msg ) {
			alert( "Data Saved: " + msg );
		});
	</script>
	<?php ?>
	<script>
	//window.location.href = "<?php echo $relink; ?>";
	</script>
	<?php
	
            

 ?>

<script>
//window.location.href = "<?php echo $relink; ?>";
</script>

