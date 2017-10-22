<?php
include('config/dbconn.php');
include('header.php');
$database=new database();
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
                    <a href="manage_bank.php">Manage Bank</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Bank</span>
                </li>
            </ul>
         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Add Bank
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
            
                <div class="col-md-6">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">

                            <div class="form-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        
                                        <input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Enter Name"> </div>
                                </div>



                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" id="bank_addr" name="bank_addr" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <div class="input-group">
                                        
                                        <input type="text" id="branch_name" name="branch_name" class="form-control" placeholder="Enter Branch Name"> </div>
                                </div>

                                <div class="form-group">
                                    <label>Sort Code</label>
                                    <div class="input-group">
                                        
                                        <input type="text" name="sort_code" id="sort_code" class="form-control" placeholder="Sort Code"> </div>
                                </div>

                                <div class="form-group">
                                    <label>Dollar Account Number</label>
                                    <div class="input-group">
                                        
                                        <input type="text" name="dollar_acc" id="dollar_acc" class="form-control" placeholder="Dollar Account Number"> </div>
                                </div>

                                <div class="form-group">
                                    <label>Naira Account Number</label>
                                    <div class="input-group">
                                       
                                        <input type="text" name="naira_acc" id="naira_acc" class="form-control" placeholder="Naira Account Number"> </div>
                                </div>





                                <div class="form-actions">
                                    <button type="submit" id="add_bank" class="btn blue">Submit</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>

                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                        <!-- BEGIN SAMPLE FORM PORTLET-->

                        <!-- END SAMPLE FORM PORTLET-->
                        <!-- BEGIN SAMPLE FORM PORTLET-->

                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                    <div class="col-md-6">



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

   $('#add_bank').on('click', function(){
       var bank_name = $('#bank_name').val();
       var bank_addr = JSON.stringify($('#bank_addr').val());//convert special charecters as string to parse
       var branch_name = $('#branch_name').val();
       var sort_code = $('#sort_code').val();
       var dollar_acc = $('#dollar_acc').val();
       var naira_acc = $('#naira_acc').val();
       
       if(bank_name == ''){
           $('#bank_name').css('border','1px solid red');
           $('#bank_name').focus();
       }
       else if($('#bank_addr').val() == ''){
           $('#bank_name').css('border','1px solid #ccc');
           $('#bank_addr').css('border','1px solid red');
           $('#bank_addr').focus();
       }
       else if(branch_name == ''){
           $('#bank_addr').css('border','1px solid #ccc');
           $('#branch_name').css('border','1px solid red');
           $('#branch_name').focus();
       }
       
       else {
       var json='';
       json = json + '{';
       json = json + '"bank_name":"'+bank_name+'",';
       json = json + '"bank_addr":'+bank_addr+',';
       json = json + '"branch_name":"'+branch_name+'",';
       json = json + '"sort_code":"'+sort_code+'",';
       json = json + '"dollar_acc":"'+dollar_acc+'",';
       json = json + '"naira_acc":"'+naira_acc+'"';
       json = json + '}';
     
      Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to add bank details?',
            title: 'Add Bank Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $.ajax({
                        url: "process_add_bank.php",
                        async: true,
                        type: 'POST',
                        data: "json=" + encodeURIComponent(json),
                        success: function (data) {
                           if (data == 1) {
                                Lobibox.notify('success', {
                                    delay: false,
                                    sound: true,
                                    closeOnEsc: window.setTimeout(function () {
                                        window.location.href = "manage_bank.php";

                                    }, 2000),
                                    title: 'Success',
                                    msg: 'Success Message : Bank Added Successfully'
                                });
                            }

                        }
                    });
                }
            }
        });
   }
       
   });
</script>
</body>


</html>
