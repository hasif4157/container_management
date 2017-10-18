<?php
error_reporting(0);
ob_clean();
require_once('settings.php');
$edit_id = $_GET['id'];
$sql_ed = "select O.*,A.agn_name,A.agn_phone from ex_order O LEFT JOIN  ex_agent A ON A.id=O.or_agent where O.id=$edit_id";
$qry_ed = $conn->query($sql_ed);
$res_ed = $qry_ed->fetch_array();
$fr_loc = $res_ed['fr_loc'];
$to_loc = $res_ed['to_loc'];
$cus_id = $res_ed['or_customer'];
$bank_id = $res_ed['or_bank'];
$cus_email=$res_ed['cus_email'];
$agn_email=$res_ed['agn_email'];

$sql_frloc = mysqli_query($conn, "SELECT * FROM ex_location where id=$fr_loc");
$qry_frloc = mysqli_fetch_array($sql_frloc);

$sql_toloc = mysqli_query($conn, "SELECT * FROM ex_location where id=$to_loc");
$qry_toloc = mysqli_fetch_array($sql_toloc);

$sql_bank = mysqli_query($conn, "SELECT * FROM ex_bank where id=$bank_id");
$qry_bank = mysqli_fetch_array($sql_bank);

$user_id = $_SESSION['user_id'];
$sql_emp = mysqli_query($conn, "SELECT * FROM crm_owner where id=$user_id");
$qry_emp = mysqli_fetch_array($sql_emp);

$loc_addr=$qry_frloc['loc_addr'];
$loc_country=$qry_frloc['loc_country'];
$loc_phone=$qry_frloc['loc_phone'];
$loc_email=$qry_frloc['loc_email'];
$order_date=$res_ed['order_date'];
$cont_ld=$res_ed['cont_ld'];
$cont_cd=$res_ed['cont_cd'];
$cont_no=$res_ed['cont_no'];
$order_no=$res_ed['order_no'];

$html = $html . '<table width="800" border="0"  align="center"   cellspacing="0" cellpadding="0">';

$html = $html . '<tr>';
$html = $html . '<td></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';

$html = $html . '<td>';
$html = $html . '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
$html = $html . '<tr>';
$html = $html . '<td style="background:#32c5d2;">&nbsp;</td>';
$html = $html . '<td style="background:#32c5d2;">&nbsp;</td>';
$html = $html . '<td style="background:#32c5d2;">&nbsp;</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td>&nbsp;</td>';
$html = $html . '<td>&nbsp;</td>';
$html = $html . '<td>&nbsp;</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td align="left" valign="top" width="10%;"><img src="http://demo.softwarecompany.ae/container/images/excellentlogisticslogo.png" width="250" /></td>';
$html = $html . '<td align="left" valign="top">';
$html = $html . '<h5 style="color: #000; font-weight: bold; margin: 0; padding: 0;  font-size:20px;">EXCELLENT WAY</h5>';
$html = $html . '<p style="font-weight:normal;font-size:15px;">Commercial Broker L.L.C<br />
'.$loc_addr.'<br>
'.$loc_country.'<br>
 Phone:&nbsp;'.$loc_phone.'<br>
 Email:&nbsp;'.$loc_email.'
</p>';
$html = $html . '</td>';
$html = $html . '<td align="left" valign="top">';

$html = $html . '<div class="col-md-6 right-invoice-table">';
$html = $html . '<table border="1" align="center" cellspacing="1" style=" 
    color: #9c9d9d;
    font-weight: normal;
    font-size: 15px;">';
$html = $html . '<tbody>';
$html = $html . '<tr>';
$html = $html . '<td class="span-one-color" align="center" valign="middle" style="background:#23a9b1; color:#fff; font-size:13px;" >Order Date </td>';
$html = $html . '<td align="center" valign="middle" style="font-size:13px;">'.$order_date.'</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td class="span-one-color-c" align="center" valign="middle" style="background:#2edae4; color:#fff; font-size:13px;">Origin Date </td>';
$html = $html . '<td align="center" valign="middle" style="font-size:13px;">'.$cont_ld.'</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td class="span-one-color" align="center" valign="middle" style="background:#23a9b1; color:#fff;  font-size:13px;">Destination Date </td>';
$html = $html . '<td align="center" valign="middle" style="font-size:13px;">'.$cont_cd.'</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td class="span-one-color-c" align="center" valign="middle" style="background:#2edae4; color:#fff; font-size:13px;">Container No. </td>';
$html = $html . '<td align="center" valign="middle" style="font-size:13px;">'.$cont_no.'</td>';
$html = $html . '</tr>';
$html = $html . '</tbody>';



$html = $html . '</table>';

$html = $html . '<table width="100%" border="0" cellspacing="8" cellpadding="">';
$html = $html . '<tr>';
$html = $html . '<td></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td>';
$html = $html . '</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td><img  src="barcode.php?codetype=Code39&size=40&text='.$order_no.'&print=true"/></span></td>';
$html = $html . '</tr>';
$html = $html . '</table>';



$html = $html . '</td>';
$html = $html . '</tr>';
$html = $html . '</table></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td><h2 style="background:#32c5d2; color:#fff; text-align:center; ">Packing List</h2></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td><table border="1" bordercolor="#CCCCCC" align="center" cellpadding="5" cellspacing="0" dir="ltr" class="table table-striped table-hover">';
$html = $html . '<thead style=" color:#000; font-weight:normal;font-size:14px;">';
$html = $html . '<tr>';
$html = $html . '<th> Agent Details </th>';
$html = $html . '<th> Customer </th>';
$html = $html . '<th> Customer Address </th>';
$html = $html . '<th> Destination </th>';
$html = $html . '<th> Address </th>';
$html = $html . '</tr>';
$html = $html . '</thead>';
$html = $html . '<tbody>';
$html = $html . '<tr style=" color:#000; font-weight:normal;font-size:14px;">';
$html = $html . '<td align="left" valign="top">'.$res_ed['or_agent'].'<br>Phone:'.$res_ed['agn_mobile'].'</td>';
$html = $html . '<td align="left" valign="top">'.$res_ed['or_customer'].'</td>';
$html = $html . '<td align="left" valign="top"> Phone: '.$res_ed['cus_mobile'].'<br>E-mail :'.$res_ed['cus_email'].' </td>';
$html = $html . '<td align="left" valign="top"> '.$qry_toloc['loc_name'].' </td>';
$html = $html . '<td align="left" valign="top">'.$qry_toloc['loc_addr'].'</td>';
$html = $html . '</tr>';
$html = $html . '</tbody>';
$html = $html . '</table></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td>&nbsp;</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td>';
$html = $html . '<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" >';
$html = $html . '<thead style=" color:#000; font-weight:normal;font-size:14px;">';
$html = $html . '<tr>';
$html = $html . '<th> Charges </th>';
$html = $html . '<th> </th>';
$html = $html . '<th> Please pay to </th>';
$html = $html . '<th> Origin </th>';
$html = $html . '<th align="left" valign="top"> Destination </th>';
$html = $html . '</tr>';
$html = $html . '</thead>';
$html = $html . '<tbody>';
$html = $html . '<tr style=" color:#000; font-weight:normal;font-size:14px;">';
$html = $html . '<td valign="top" class="color-td"> Freight Charge</td>';
$html = $html . '<td valign="top"> $ '.number_format($res_ed['agn_freight'], 2).'</td>';
$html = $html . '<td valign="top">'.$qry_bank['bank_name'].'<br>
                                                            Branch Name:'.$qry_bank['branch_name'].'<br>
                                                            Sort Code:'.$qry_bank['sort_code'].'<br> 
                                                            Dollar A/C:'.$qry_bank['dollar_acc'].'<br> 
                                                            Naira A/C:'.$qry_bank['naira_acc'].' </td>';
                                                            $html = $html . '<td valign="top">'.$qry_frloc['loc_name'].'</td>';
$html = $html . '<td align="left" valign="top">'.$qry_toloc['loc_name'].'</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td valign="top" style=" color:#000; font-weight:normal;font-size:14px;" class="color-td">Clearing Charge</td>';
$html = $html . '<td valign="top">Naira '.number_format($res_ed['agn_clearence'], 2).'</td>';
$html = $html . '<td></td>';
$html = $html . '<td></td>';
$html = $html . '<td align="left" valign="top"></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td valign="top" class="color-td" style="color:#000; font-weight:normal;font-size:14px;">Item Description</td>';
$html = $html . '<td>'.$res_ed['item_desc'].'</td>';
$html = $html . '<td></td>';
$html = $html . '<td></td>';
$html = $html . '<td align="left" valign="top"></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td valign="top" class="color-td" style="color:#000; font-weight:normal;font-size:14px;">Qty</td>';
$html = $html . '<td valign="top">'.$res_ed['or_qty'].'</td>';
$html = $html . '<td></td>';
$html = $html . '<td></td>';
$html = $html . '<td align="left" valign="top"></td>';
$html = $html . '</tr>';
$html = $html . '</tbody>';
$html = $html . '</table>';


$html = $html . '</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td>&nbsp;</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td><h2 style="background:#32c5d2; color:#fff; text-align:center;">Terms and Conditions</h2></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td align="left" style=" color: #383a3a; font-weight: normal; font-size: 13px;">';




$html = $html . '<p>1. Shipper/customer agreed that the goods carried are not of high value , fragile or breakable item. items such as mirror, glass, mobile phone, flower pots or verse, liquids, oil, gas, perfume, gas cooker, consoles, frames, dressing mirrors ,w/c, etc all must be repack and protect at a maximum by the customer /agent before handing it over to the carrier if any of such goods was hidden undeclared the carrier/company will not be responsible if any damage or breakage and the customer/agent will be penalize for such act by the carrier/company. </p>';
$html = $html . '<p>2. Any goods of high value must be declare for insurance by the customer/agent which will attract extra cost from the owner otherwise it should be carried as general goods/non valuable and carrier/company will not be responsible for any lose or damage. </p>';
$html = $html . '<p>3. All freight and clearing charges must be paid by the customer as agreed before the arrival of the said container to avoid late payment fees </p>';
$html = $html . '<p>4. All customers must be present on the day of unloading the container to collect his/her goods </p>';
$html = $html . '<p>5. Any customer that fail to collect his/her goods within 72 hours after container was discharge will pay demurrage or storage charge cost to be decide by the company </p>';
$html = $html . '<p>6. The warehouse and goods/cargo is not insured, we advice all customer/ agent to collect there goods /cargo immediately the container is offloaded to avoid any damage (fire, shifting) goods not collected on the date of offloading is in our warehouse at the customer/agent risk and responsibility </p>';








$html = $html . '</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td><p style="font-weight:bold;">TRACK &amp; TRACE YOUR SHIPMENT @ <a href="#" style="color:#337ab7;">WWW.EXCELLENTWAYCARGO.COM</a></p></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td>&nbsp;</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td><table>';
$html = $html . '<tbody><tr>';
$html = $html . '<td vailgn="top" style="font-size: 14px; font-family: Tahoma; border: 1px solid #1E2460;
                                border-collapse: collapse; width: 300px; min-width: 100px; padding: 10px; background-color: #32c5d2;
                                color: #fff">
                                <span>Staff Sign</span>
                            </td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td vailgn="top" style="font-size: 13px; font-family: Tahoma; border: 1px solid #1E2460;
                                border-collapse: collapse; width: 300px; min-width: 100px; padding: 10px; min-height: 40px;">';
$html = $html . '<table>';
$html = $html . '<tbody><tr>';
$html = $html . '<td vailgn="top">';
$html = $html . '<b>Name </b>';
$html = $html . '</td>';
$html = $html . '<td vailgn="top">:</td>';
$html = $html . '<td vailgn="top"><span style="font-size:Medium;">'.$qry_emp['user_name'].'</span></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td vailgn="top">';
$html = $html . '<b>Date</b>';
$html = $html . '</td>';
$html = $html . '<td vailgn="top">:</td>';
$html = $html . '<td vailgn="top">'.$res_ed['order_date'].'</td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td vailgn="top">';
$html = $html . '<b>Print Date</b>';
$html = $html . '</td>';
$html = $html . '<td vailgn="top">:</td>';
$html = $html . '<td vailgn="top">08-Jul-2017</td>';
$html = $html . '</tr>';
$html = $html . '</tbody></table>';
$html = $html . '</td>';
$html = $html . '</tr>';
$html = $html . '</tbody></table></td>';
$html = $html . '</tr>';
$html = $html . '<tr>';
$html = $html . '<td>&nbsp;</td>';
$html = $html . '</tr>';
$html = $html . '</table>';


ob_clean();
ob_start();
require 'PDF/mpdf.php';
error_reporting(0);
$mpdf = new mPDF();
$mpdf->SetHTMLFooter('<div style="background:#0072bb;padding:3px !important;color:#FFF;"><span class="pull-left fn12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;http://www.excellentwaycargo.com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="pull-left fn12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;info@excellentwaycargo.com.com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
</div>');
$mpdf->WriteHTML($html);
$filename="awbpdf/".$order_no.".pdf";
$mpdf->Output();
//include('awb_email.php');

?>
