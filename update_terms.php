<?php
require_once('settings.php');
include('header.php');
$sql_trm = "select * from ex_terms";
$qry_trm = $conn->query($sql_trm);
$res_trm = $qry_trm->fetch_array();
?>

<script type="text/javascript" src="js/textarea/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <div id="get_data"></div>
        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.php">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Terms And Condition</span>
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
        <h1 class="page-title">Update Terms And Condition
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
       
        <div class="row">
            
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <form action="editTerms.php" name="form_sub" id="myForm" method="post">
                    <div class="portlet-body form">
                      
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Terms And Condition</label>
                                    <div class="input-group">
                                    
                                        <textarea name="description" id="description" cols="120" rows="15"><?php echo $res_trm['description'];?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" id="edit_terms" class="btn blue">Update</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                       
                    </div>
</form>
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

<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
include('footer.php');
?>

<script>

        
         $(document).ready(function () {
            $("#myForm").submit(function () {
                
                    Lobibox.confirm({
                        iconClass: false,
                        msg: 'Are you sure you want to edit the terms and condition?',
                        title: 'Edit Terms And Condition',
                        callback: function ($this, type, e) {
                            if (type == 'yes') {
                                document.form_sub.submit();
                            }
                        }
                    });
                
                return false;
            });

        });
</script>

