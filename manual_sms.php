<?php	
echo byeee; exit;
$username = "crossingover";
$password = "sms4abuja";
$sender = "alw18.04";
$message = $_POST['manual_addr'];
$message1 = stripslashes(@strip_tags(trim(preg_replace('/\s\s+/', ' ', $message))));
$mob = $_POST['manual_phone'];

//$relink='http://www.domain4sms.com/sms2014/components/com_spc/smsapi.php?username=crossingover&password=sms4abuja&sender=alw18.04&recipient='.$mob.'&message='.$message1.'';

//http://smpp2.onlysms.ae/api/api_http.php?username=EXCELLENTWAY&password=way2ng&senderid=Excelentway&to='.$mob.'&text='.$message1.'&type=unicode
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
        $.ajax({
  type: "GET",
  url: "http://smpp2.onlysms.ae/api/api_http.php?",
  data: { username: "EXCELLENTWAY", password: "way2ng",  senderid: "Excelentway",  to: "<?php echo $mob; ?>",  text: "<?php echo $message1; ?>", type:"unicode"}
}).done(function( msg ) {
  alert( "Data Saved: " + msg );
});
</script> 
 <?php
		

?>
<script>
//window.location.href = "<?php echo $relink; ?>";
</script>
<?php
$order_no=$_POST['sms_orno'];
echo '<script language="javascript">';
echo 'alert("SMS sent Successfully")';
echo '</script>';
?>
<?php
      echo '<script type="text/javascript">

          window.location = "manage_orders.php"

		   </script>';


?>
