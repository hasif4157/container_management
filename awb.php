<?php
require_once('settings.php');
include('header.php');

$edit_id = $_GET['id'];
$sql_ed = "select O.*,A.agn_name,A.agn_phone from ex_order O LEFT JOIN  ex_agent A ON A.id=O.or_agent where O.id=$edit_id";
$qry_ed = $conn->query($sql_ed);
$res_ed = $qry_ed->fetch_array();
$fr_loc = $res_ed['fr_loc'];
$to_loc = $res_ed['to_loc'];
$cus_id = $res_ed['or_customer'];
$bank_id = $res_ed['or_bank'];

$sql_trm = mysqli_query($conn, "SELECT * FROM ex_terms");
$qry_trm= mysqli_fetch_array($sql_trm);

$sql_frloc = mysqli_query($conn, "SELECT * FROM ex_location where id=$fr_loc");
$qry_frloc = mysqli_fetch_array($sql_frloc);

$sql_toloc = mysqli_query($conn, "SELECT * FROM ex_location where id=$to_loc");
$qry_toloc = mysqli_fetch_array($sql_toloc);

$sql_bank = mysqli_query($conn, "SELECT * FROM ex_bank where id=$bank_id");
$qry_bank = mysqli_fetch_array($sql_bank);

$user_id = $_SESSION['user_id'];
$sql_emp = mysqli_query($conn, "SELECT * FROM crm_owner where id=$user_id");
$qry_emp = mysqli_fetch_array($sql_emp);
?>
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->

        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.php">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="manage_order.php">Manage Orders</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <div class="brudcrums-invoice">
            <button type="button" class="btn btn-primary" id='btn'onclick='printDiv();'>Print</button>
            <a href="awb_pdf.php?id=<?= $edit_id; ?>"><button type="button" class="btn btn-primary">Send Email To Customer</button></a>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Packing Detail
        </h1>
        <div class="div-Main-invoice-section"  id='DivIdToPrint'>

            <div class="row top-invoice-detail">
                <div class="col-md-6">
                    <div class="col-md-6">
                        <div class="in-img">
                            <img class="img-responsive" src="images/excellentlogisticslogo.png">
                        </div>     
                    </div>
                    <div class="col-md-6">
                        <div class="in-img-bottom-detail">
                            <h4>EXCELLENT WAY</h4>
                            <p>Commercial Broker L.L.C</p>
                            <ul>
                                <li><?= $qry_frloc['loc_addr']; ?></li>
                                <li><?= $qry_frloc['loc_country']; ?></li>
                                <li>Phone:&nbsp;<?= $qry_frloc['loc_phone']; ?></li>
                                <li>Email:&nbsp;<?= $qry_frloc['loc_email']; ?></li>
                            </ul>
                        </div>  
                    </div>
                </div>
                <div class="col-md-6 right-invoice-table">
                    <table>
                        <tr>
                            <td class="span-one-color" align="center" valign="middle">Order Date </td>
                            <td align="center" valign="middle"><?= $res_ed['order_date']; ?></td>
                        </tr>
                        <tr>
                            <td class="span-one-color-c" align="center" valign="middle">Origin Date </td>
                            <td align="center" valign="middle"><?= $res_ed['cont_ld']; ?></td>
                        </tr>
                        <tr>
                            <td class="span-one-color" align="center" valign="middle">Destination Date </td>
                            <td align="center" valign="middle"><?= $res_ed['cont_cd']; ?></td>
                        </tr>
                        <tr>
                            <td class="span-one-color-c" align="center" valign="middle">Container No. </td>
                            <td align="center" valign="middle"><?= $res_ed['cont_no']; ?></td>
                        </tr>
                    </table>
                    <div class="code-view">
                         <?php echo "<img alt='testing' src='barcode.php?codetype=Code39&size=40&text=".$res_ed['order_no']."&print=true'/>";
                         ?>

                    </div>
                </div>
            </div>
            <div class="main-botttom-table">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    Packing List</div>                                       
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th> Agent Details </th>
                                                <th> Customer </th>
                                                <th> Customer Address </th>
                                                <th> Destination </th>
                                                <th> Address </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> <?= $res_ed['or_agent']; ?><br>
                                                    Phone: <?= $res_ed['agn_mobile']; ?> </td>
                                                <td><?= $res_ed['or_customer']; ?></td>
                                                <td> Phone: <?= $res_ed['cus_mobile']; ?><br> E-mail : <?= $res_ed['cus_email']; ?></td>
                                                <td><?= $qry_toloc['loc_name']; ?></td>
                                                <td><?= $qry_toloc['loc_addr']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th> Charges </th>
                                                <th> </th>
                                                <th> Please pay to </th>
                                                <th> Origin </th>
                                                <th> Destination </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="color-td"> Freight Charge</td>
                                                <td><?= number_format($res_ed['agn_freight'], 2); ?></td>
                                                <td><?= $qry_bank['bank_name']; ?><br>
                                                    Branch Name:&nbsp;<?= $qry_bank['branch_name']; ?><br>
                                                    Sort Code:&nbsp;<?= $qry_bank['sort_code']; ?><br> 
                                                    Dollar A/C:&nbsp;<?= $qry_bank['dollar_acc'] != '' ? $qry_bank['dollar_acc'] : 'NA'; ?><br> 
                                                    Naira A/C:&nbsp;<?= $qry_bank['naira_acc'] != '' ? qry_bank['naira_acc'] : 'NA'; ?></td>
                                                <td> <?= $qry_frloc['loc_name']; ?>
                                                </td>
                                                <td> <?= $qry_toloc['loc_name']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td class="color-td">Clearing Charge</td>
                                                <td><?= number_format($res_ed['agn_clearence'], 2); ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="color-td">Item Description</td>
                                                <td><?= $res_ed['item_desc']; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                             <?php
                                            if($res_ed['line'] != '')
                                            {
                                            ?>
                                             <tr>
                                                <td class="color-td">Line</td>
                                                <td><?= $res_ed['line']; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php }
                                            ?>
                                            <tr>
                                                <td class="color-td">Qty</td>
                                                <td><?= $res_ed['or_qty']; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->
                    </div>  
                </div>
                <div class="row">
                    <div class="col-md-12 terms-div-main" style=" width:100%; font-family: Tahoma; text-align: justify;
                         background: url('images/TandC.png') no-repeat; background-position: center;">
                        <h2>Terms and Conditions</h2>
                        <p><?=$qry_trm['description'];?></p>
                    </div>
                    <div class="col-md-12">
                        <p style="font-weight:bold;">TRACK & TRACE YOUR SHIPMENT @ <a href="#">WWW.EXCELLENTWAYCARGO.COM</a></p>
                        <table>
                            <tbody><tr>
                                    <td vailgn="top" style="font-size: 14px; font-family: Tahoma; border: 1px solid #1E2460;
                                        border-collapse: collapse; width: 300px; min-width: 100px; padding: 10px; background-color: #32c5d2;
                                        color: #fff">
                                        <span>Staff Sign</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td vailgn="top" style="font-size: 13px; font-family: Tahoma; border: 1px solid #1E2460;
                                        border-collapse: collapse; width: 300px; min-width: 100px; padding: 10px; min-height: 40px;">
                                        <table>
                                            <tbody><tr>
                                                    <td vailgn="top">
                                                        <b>Name </b>
                                                    </td>
                                                    <td vailgn="top">
                                                        <span  style="font-size:Medium;"><?= $qry_emp['user_name'];  ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td vailgn="top">
                                                        <b>Date</b>
                                                    </td>
                                                    <td vailgn="top">
                                                        <span><?= $res_ed['order_date']; ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td vailgn="top">
                                                        <b>Print Date &nbsp;</b>
                                                    </td>
                                                    <td vailgn="top">
                                                        <span id="ctl00_ContentPlaceHolder1_lblPrintDate"><?=date("d-m-Y", strtotime($date));?></span>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                    </div>

                </div>
            </div>
        </div>


        <!-- END DASHBOARD STATS 1-->
    </div>

    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->


<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
include('footer.php');
?>

<script>

    function printDiv()
    {

        var divToPrint = document.getElementById('DivIdToPrint');

        var newWin = window.open('', 'Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

        newWin.document.close();

        setTimeout(function () {
            newWin.close();
        }, 10);

    }

 
</script>
</body>


</html>
