<?php
error_reporting(1);
require('PHPMailer/PHPMailerAutoload.php');
$subject = 'Excellent Way Cargo'; // Subject of your email
//$to = $email;

//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= "From: info@plates.ae\r\n"; // Sender's E-mail
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Excellent Way Cargo</title>
</head>

<body>
<div style="font-family:Open Sans,Helvetica Neue,Helvetica,Arial,Sans-Serif;color:rgb(67,80,88);font-size:14px;font-weight:500">
    <table style="width:100%;max-width:740px;text-align:center;height:100%;margin:0 auto">
      <tbody><tr>
      <td>
          <div style="vertical-align:middle;margin-bottom:30px">
            <img src="http://demo.softwarecompany.ae/container/images/excellentlogisticslogo.png" alt="logo" class="CToWUd">
          </div>
      </td>
      </tr>
      <tr>
      <td>
      <div style="border:1px solid rgb(225,228,230)">
        <div style="text-align:left;margin:0 auto;padding:5px 25px 20px" align="left">
<center><h1 style="color:rgb(0,134,229);font-weight:500">Thank you choosing Excellent Way Cargo</h1></center>

<br>

<p style="line-height:23px;font-size:14px"><strong>Please find attached AWB</strong></p> 


<p>Please contact <a href="#"> Customer Support</a>.</p> 
 



<p style="line-height:23px;font-size:14px">Regards,<br>
Excellent Way</p>
</div>
                
      </div>
      </td>
</tr>
      <tr>
      <td>
          <div style="text-align:left;font-size:13px;padding-top:25px;padding-bottom:25px" align="left">
            <div style="float:left;max-width:60%">
                <span style="color:rgb(161,167,172)">WWW.EXCELLENTWAYCARGO.COM</span>
            </div>
            <a href="#" style="color:rgb(161,167,172);text-decoration:underline;float:right;letter-spacing:0.1px;font-family:Open Sans,Helvetica Neue,Helvetica,Arial,Sans-Serif" target="_blank">info@excellentwaycargo.com</a>
          </div>      
      </td>
      </tr>
    </tbody></table>
  <div class="yj6qo"></div><div class="adL">
</div></div>
</body>
</html>'; 
   $mail = new PHPMailer;
    $mail->CharSet = "UTF-8";
    // telling the class to use SMTP
   // $mail->IsSMTP();
    // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPDebug  = 1;
    // enable SMTP authentication
    $mail->SMTPAuth   = true;
    // sets the prefix to the servier
   //$mail->SMTPSecure = 'ssl';
	$mail->Host = 'mail.alwafaagroup.ae';
    // set the SMTP port for the GMAIL server
    $mail->Port       = 25;
    // GMAIL username
    $mail->Username   = "info@alwafaagroup.ae";
    // GMAIL password
    $mail->Password   = "Alwafaa$321";                                  // TCP port to connect to
//$sendto = 'hasif@alwafaagroup.com';
$sendfrom = "info@excellentwaycargo.com";
//$sendsubject = "Registration Confirmation";
//$bodyofemail = "Biohealth-Here is the daily backup '".date('d-m-Y')."'.";                                // TCP port to connect to

$mail->setFrom($sendfrom, 'info@excellentwaycargo');
$mail->AddAddress($cus_email);

$mail->AddCc($agn_email);
   // Name is optional
//$mail->addReplyTo('alwafaabackup@gmail.com', 'Biohealth');
//$mail->addCC('rosmin@alwafaagroup.com');
//$mail->addBCC('soumyas111@gmail.com');

$mail->addAttachment($filename);        // Add attachments

$mail->isHTML(true);                                  // Set email format to HTML
$mail->AddCc('hasif@alwafaagroup.com');
$mail->Subject = 'Excellent Way Cargo';
$mail->Body    = $message;
//$mail->Body    = 'Biohealth-This is theDaily Backup ';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'AWB Mail has been sent successfully';
}
echo '<script type="text/javascript">
      window.location = "awb.php?id=' . $edit_id . '"
       </script>';
    
    ?>