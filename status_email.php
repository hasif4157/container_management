<?php
require_once('settings.php');
require_once('PHPMailer/class.phpmailer.php');
include("PHPMailer/class.smtp.php"); 
$subject = $order_no." - COLLECTED"; // Subject of your email
//$to = $email;

//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= "From: info@plates.ae\r\n"; // Sender's E-mail
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
body {
	padding: 0 auto;
	margin: 0 auto;
	background: #FFF;
}
</style>
<body>

<div style="background:#ebebeb; margin:0 auto;">
  <table width="600" align="center" cellpadding="0" cellspacing="0" dir="ltr" border="0" style="background: #FFF;">
    <tr align="left" valign="top">
      <td><img  src="http://demo.softwarecompany.ae/container/images/excellentlogisticslogo.png" /></td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" align="left" cellpadding="0" cellspacing="0" dir="ltr">
          <tr>
            <td width="35" height="45" align="left" valign="top">&nbsp;</td>
            <td height="45" align="left" valign="top" ></td>
            <td width="35" height="45" align="left" valign="top"></td>
          </tr>
          <tr>
            <td width="35" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size: 15px;color: #646464;"><p style="color:#000;font-family:Arial, Helvetica, sans-serif;
    font-size: 16px;"><strong>Dear '.ucfirst($or_agent).',</strong></p>
              <p style="color:#646465;font-family:Arial, Helvetica, sans-serif;
    font-size: 14px;">Message to inform you that following CONTAINER GOODS has been COLLECTED</p>
             
              <p style="color:#646465;font-family:Arial, Helvetica, sans-serif;   font-size: 14px;">&nbsp;</p>
      
                </td>
            <td width="35" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td width="35" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size: 15px;color: #646464;"><p style="color:#000;font-family:Arial, Helvetica, sans-serif;
    font-size: 14px;">Order Details:</p>
              <p style="color:#646465;font-family:Arial, Helvetica, sans-serif;
    font-size: 12px;">Order No.:'.$order_no.'</p>
        <p style="color:#646465;font-family:Arial, Helvetica, sans-serif;
    font-size: 12px;">Container No.:'.$cont_no.'</p>
        <p style="color:#646465;font-family:Arial, Helvetica, sans-serif;
    font-size: 12px;">Customer Name:'.$or_customer.'</p>
        <p style="color:#646465;font-family:Arial, Helvetica, sans-serif;
    font-size: 12px;">Location:'.$loc_name.'</p>
         <p style="color:#646465;font-family:Arial, Helvetica, sans-serif;
    font-size: 12px;">Updated by:'.$user_name.'</p>
         <p style="color:#646465;font-family:Arial, Helvetica, sans-serif;
    font-size: 12px;">Remarks:'.$remark.'</p>
             
              <p style="color:#646465;font-family:Arial, Helvetica, sans-serif;   font-size: 14px;">&nbsp;</p>
      
                </td>
            <td width="35" align="left" valign="top">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="100" align="left" valign="top">&nbsp;</td>
            <td  align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td width="100" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          
        <tr>
            <td width="100" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td width="100" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>  
          
          
        
        </table></td>
    </tr>

    <tr>
      <td height="50" align="center" valign="middle"><a href="#" target="_blank"><img src="https://dev.granddubai.com/bronew_web/images/fb.jpg" /></a> <a href="#" target="_blank"><img src="https://dev.granddubai.com/bronew_web/images/t.jpg" /></a> <a href="#" target="_blank"><img src="https://dev.granddubai.com/bronew_web/images/images/y.jpg" /></a> <a href="#" target="_blank"><img src="images/ing.jpg" /></a></td>
    </tr>
  </table>
</div>
</body>
</html>';

$mail = new PHPMailer();
//$mail->IsSMTP();  // set mailer to use SMTP
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "alwafaagroups@gmail.com";  // SMTP username
$mail->Password = "alwafaagroups123"; // SMTP password

$mail->From = 'info@excellentway.com';
$mail->FromName = "alwafaagroups";
$mail->AddAddress('deepak@alwafaagroup.com');
$mail->AddCc('hasif@alwafaagroup.com');
$mail->WordWrap = 50;                                 // set word wrap to 50 characters

$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = $order_no." - COLLECTED";
$mail->Body    = $message;


if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
  exit;
}

?>
