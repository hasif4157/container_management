<?php
require_once('settings.php');
$agn_id = $_POST['agn_id'];
//get agent data
$sql_agn = mysqli_query($conn, "SELECT * FROM ex_agent where id=$agn_id");
$qry_agn = mysqli_fetch_array($sql_agn);
$or_agnum = $qry_agn['agn_no'];
$or_agent = $qry_agn['agn_name'];
$agn_email = $qry_agn['agn_email'];
$agn_mobile = $qry_agn['agn_phone'];

//customer data
$cus_no = $_POST['cus_no'];
$or_customer = $_POST['or_customer'];
$cus_email = $_POST['cus_email'];
$cus_mobile = $_POST['cus_mobile'];

//container info
$or_container = $_POST['or_container'];
$cont_sz = $_POST['cont_sz'];

$date = date('Y-m-d');
$time = date('Y-m-d H:i:s');
$order_no = $_POST['order_no'];
$idorder = $_POST['idorder'];
$order_date = $_POST['order_date'];
$item_desc = $_POST['item_desc'];
$or_qty = $_POST['or_qty'];
$agn_freight = $_POST['agn_freight'];
$comp_freight = $_POST['comp_freight'];
$comn_freight = $_POST['comn_freight'];
$agn_clearence = $_POST['agn_clearence'];
$comp_clearence = $_POST['comp_clearence'];
$comn_clearence = $_POST['comn_clearence'];
$orgn_datetime = $_POST['orgn_datetime'];
$remark = $_POST['remark'];
$del_details = $_POST['del_details'];
$cus_complaint = $_POST['cus_complaint'];
$dxb_payinfo = $_POST['dxb_payinfo'];
$paid_amt = $_POST['paid_amt'];
$invoice_no = $_POST['invoice_no'];
$order_status = $_POST['status_type'];
$stchange_date = $_POST['stchange_date'];
$ord_view = $_POST['ord_view'];
$tot_sum = $_POST['tot_sum'];
$or_bank = $_POST['or_bank'];
$bank_name = $_POST['bank_name'];
$sort_code = $_POST['sort_code'];
$naira_ac = $_POST['naira_ac'];
$dollar_ac = $_POST['dollar_ac'];
$line = $_POST['line'];
$cont_no = $_POST['cont_no'];
$to_addr = $_POST['to_addr'];
$loc_name = $_POST['loc_name'];

        $message_agn = "Excellent Way Group your customer's container goods " . $order_status . ",
        Order No: " . $order_no . ", 
        Container No: " . $cont_no . ",
	Customer Name: " . $or_customer . ", 
        Customer Mobile: " . $cus_mobile . ",
        Destination: " . $loc_name . "";

        $message_cus = "Excellent Way Group your container goods " . $order_status . "
        Tracking No: " . $order_no . ", 
	Container No: " . $cont_no . ", 
        Customer Name: " . $or_customer . ", 
        Customer Mobile: " . $cus_mobile . ",
        Destination: " . $loc_name . ", Thank You for using Excellent Way Services";


$sql = "UPDATE `ex_order` SET `modified`='" . $date . "',`modified_time`='" . $time . "',`or_agnum`='" . $or_agnum . "',`or_agent`='" . $or_agent . "',`agn_email`='" . $agn_email . "',`agn_mobile`='" . $agn_mobile . "',`cus_no`='" . $cus_no . "',`or_customer`='" . $or_customer . "',`cus_email`='" . $cus_email . "',`cus_mobile`='" . $cus_mobile . "',`order_date`='" . $order_date . "',`item_desc`='" . $item_desc . "',`or_qty`='" . $or_qty . "',`agn_freight`='" . $agn_freight . "',`comp_freight`='" . $comp_freight . "',`comn_freight`='" . $comn_freight . "',`agn_clearence`='" . $agn_clearence . "',`comp_clearence`='" . $comp_clearence . "',`comn_clearence`='" . $comn_clearence . "',`orgn_datetime`='" . $orgn_datetime . "',`remark`='" . $remarks . "',`del_details`='" . $del_addr . "',`cus_complaint`='" . $cus_complaint . "',`dxb_payinfo`='" . $dxb_payinfo . "',`paid_amt`='" . $paid_amt . "',`invoice_no`='" . $invoice_no . "',`order_status`='" . $order_status . "',`stchange_date`='" . $stchange_date . "',`ord_view`='" . $ord_view . "',`tot_sum`='" . $tot_sum . "',`or_bank`='" . $or_bank . "',`bank_name`='" . $bank_name . "',`sort_code`='" . $sort_code . "',`naira_ac`='" . $naira_ac . "',`dollar_ac`='" . $dollar_ac . "',`line`='" . $line . "' WHERE id=$idorder";
$res = $conn->query($sql);

if ($res) {
    if ($order_status != 'Collected') {
        

        if ($message_agn) {
            $username = "crossingover";
            $password = "sms4abuja";
            $sender = "alw18.04";
            $message = $message_agn;
            $message1 = stripslashes(@strip_tags(trim(preg_replace('/\s\s+/', ' ', $message))));
            $mob = "971551026198";

//$relink='http://www.domain4sms.com/sms2014/components/com_spc/smsapi.php?username=crossingover&password=sms4abuja&sender=alw18.04&recipient='.$mob.'&message='.$message1.'';
//http://smpp2.onlysms.ae/api/api_http.php?username=EXCELLENTWAY&password=way2ng&senderid=Excelentway&to='.$mob.'&text='.$message1.'&type=unicode
            ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script>
                $.ajax({
                    type: "GET",
                    url: "http://smpp2.onlysms.ae/api/api_http.php?",
                    data: {username: "EXCELLENTWAY", password: "way2ng", senderid: "Excelentway", to: "<?php echo $mob; ?>", text: "<?php echo $message1; ?>", type: "unicode"}
                }).done(function (msg) {
                    alert("Data Saved: " + msg);
                });
            </script> 
            <?php
        }
        if ($message_cus) {
            $username = "crossingover";
            $password = "sms4abuja";
            $sender = "alw18.04";
            $message = $message_cus;
            $message1 = stripslashes(@strip_tags(trim(preg_replace('/\s\s+/', ' ', $message))));
            $mob = "971504503219";

//$relink='http://www.domain4sms.com/sms2014/components/com_spc/smsapi.php?username=crossingover&password=sms4abuja&sender=alw18.04&recipient='.$mob.'&message='.$message1.'';
//http://smpp2.onlysms.ae/api/api_http.php?username=EXCELLENTWAY&password=way2ng&senderid=Excelentway&to='.$mob.'&text='.$message1.'&type=unicode
            ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script>
                $.ajax({
                    type: "GET",
                    url: "http://smpp2.onlysms.ae/api/api_http.php?",
                    data: {username: "EXCELLENTWAY", password: "way2ng", senderid: "Excelentway", to: "<?php echo $mob; ?>", text: "<?php echo $message1; ?>", type: "unicode"}
                }).done(function (msg) {
                    alert("Data Saved: " + msg);
                });
            </script> 
            <?php
        }
    }
    if ($order_status == 'Collected') {
        $username = "crossingover";
        $password = "sms4abuja";
        $sender = "alw18.04";
        $message = $message_agn;
        $message1 = stripslashes(@strip_tags(trim(preg_replace('/\s\s+/', ' ', $message))));
        $mob = "971504503219";

//$relink='http://www.domain4sms.com/sms2014/components/com_spc/smsapi.php?username=crossingover&password=sms4abuja&sender=alw18.04&recipient='.$mob.'&message='.$message1.'';
//http://smpp2.onlysms.ae/api/api_http.php?username=EXCELLENTWAY&password=way2ng&senderid=Excelentway&to='.$mob.'&text='.$message1.'&type=unicode
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            $.ajax({
                type: "GET",
                url: "http://smpp2.onlysms.ae/api/api_http.php?",
                data: {username: "EXCELLENTWAY", password: "way2ng", senderid: "Excelentway", to: "<?php echo $mob; ?>", text: "<?php echo $message1; ?>", type: "unicode"}
            }).done(function (msg) {
                alert("Data Saved: " + msg);
            });
        </script>
        <?php
        }
        ?>
        <script>
        //window.location.href = "<?php echo $relink; ?>";
        </script>
        <?php
        echo '<script language="javascript">';
        echo 'alert("SMS sent Successfully")';
        echo '</script>';
        ?>
        <?php
        echo '<script type="text/javascript">

           window.location = "order_details.php?id=' . $idorder . '"
           

		   </script>';
    }
    ?>