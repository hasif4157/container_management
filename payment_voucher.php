<?php
require_once('settings.php');
$today_date = date("d-m-Y");

$sql_payvno = mysqli_query($conn, "SELECT id FROM pay_voucher order by id desc limit 1");
$num_payvno = mysqli_num_rows($sql_payvno);
$qry_payvno = mysqli_fetch_array($sql_payvno);

if ($num_payvno > 0) {
    $str = $qry_payvno['id'] + 1;
    $payv_no = "PYMV" . str_pad($str, 5, "0", STR_PAD_LEFT);
} else {
    $str = 1;
    $payv_no = "PYMV" . str_pad($str, 5, "0", STR_PAD_LEFT);
}

include('header.php');
?>


<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div id="get_data"></div>
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
                    <a href="manage_staff.php">Manage Payment Voucher</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Payment Voucher</span>
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
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Payment Voucher
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="add_payv" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="portlet light bordered">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Payment Voucher No# <input type="text" name="payv_no" class="form-control red" value="<?= $payv_no ?>" readonly>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Date</label>
                                        <div class="controls input-append date form_date" data-date="16-09-2010" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                            <input class="form-control" type="text" value="<?= $today_date ?>" id="doj" name="payment_date"  placeholder="Joining Date" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Select Agent</label>
                                        <div id="err_agn">
                                            <select  class="selectpicker" id="agn_pay" name="agn_id" data-live-search="true" title="select Agent">
                                                <?php
                                                $sql_agent = mysqli_query($conn, "SELECT * FROM ex_agent where id !=''");
                                                while ($row_agent = mysqli_fetch_array($sql_agent)) {
                                                    echo "<option value='" . $row_agent['id'] . "'>" . $row_agent['agn_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="pay_desc" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div id="get_payvoucher">
                                    <!--voucher data-->

                                    <!--end voucher data-->
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Total(Dollar)</label>
                                        <div class="input-group">
                                            <input type="text" name="naira_bl" class="form-control" id="naira_opn" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Conversion Rate</label>
                                        <div class="input-group">
                                            <input type="text" name="naira_bl" class="form-control" id="naira_opn" placeholder="0.00">
                                        </div>
                                    </div>
                                    <p>Total:00.00(AED)</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Total(Naira)</label>
                                        <div class="input-group">
                                            <input type="text" name="dollar_bl" class="form-control" id="dollar_opn" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Conversion Rate</label>
                                        <div class="input-group">
                                            <input type="text" name="naira_bl" class="form-control" id="naira_opn" placeholder="0.00">
                                        </div>
                                    </div>
                                    <p>Total:00.00(AED)</p>
                                </div>
                                <div class="form-group">
                                    <label>Grand Total(AED)</label>
                                    <div class="input-group">
                                        <input type="text" name="grand_tot" class="form-control" id="naira_opn" placeholder="0.00">
                                    </div>
                                </div>



                            </div>
                        </div> 
                        <div class="clearfix"></div>
                    </div>
                </div> 


                <div class="clearfix"></div>
                <div class="form-actions">
                    <button type="submit" class="btn blue">Submit</button>
                    <button type="button" class="btn default">Cancel</button>
                </div> 
            </form>

        </div>


        <div id="prefix_1241741341198" class="add_payv custom-alerts alert alert-success fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Staff Data Added Successfully
        </div>

    </div>
    <!-- END DASHBOARD STATS 1-->






</div>

<?php
include('footer.php');
?>
<script>
    $('#agn_pay').change(function () {
        var agn_id = $(this).val();
        var url = 'get_payvoucher.php';
        $.post(url, {agn_id: agn_id}, function (data) {
            $('#get_payvoucher').html(data);
        });
    });


    $('#add_payv').submit(function (e) {
        e.preventDefault();

        var data = new FormData(this); // <-- 'this' is your form element
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to add the Payment Voucher?',
            title: 'Add Payment Voucher',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $('div#divLoading').addClass('show');
                    $.ajax({
                        url: 'process_add_payv.php'
                        , data: data
                        , cache: false
                        , contentType: false
                        , processData: false
                        , type: 'POST'
                        , success: function (data) {
                            $('#divLoading').removeClass('show');
                            if (data == 1) {
                                $('.add_payv').show();
                                $('.add_payv').fadeOut(3000);
                                window.setTimeout(function () {

                                    // Move to a new location or you can do something else
                                    window.location.href = "manage_payv.php";

                                }, 3100);
                            }
                        }
                    });
                }
            }
        });

        return false;
    });

</script>
</body>

</html>