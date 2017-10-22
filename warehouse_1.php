<?php
require_once('settings.php');
include('header.php');
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
                    <span>Manage Clients</span>
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
  
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
<style>
	.top_filer_section td{
		padding: 0px 10px;
	}
	.top_filer_section {
		background: #0072bb;
		border: #ccc 1px solid;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
		padding: 20px;
		color: #fff;
			margin: 15px 0;
	}
	.top_filer_section table{
		width: 100%;
	}
	.top_filer_section label {
    font-weight: bold;
    font-size: 12px;
}
	 
    .bnt_save {
        float: right !important;
        margin: 5px 0 0 0 !important;
        width: 125px!important;
        height: 32px !important;
        background: #f4d03f !important;
        color: #000!important;
        border: none !important;
        font-weight: bold !important;
    }
	.top_filer_section h5 {
        padding: 0px 0 10px 10px;
        margin: 0;
        font-size: 17px;
        font-weight: 600;
    }
    .nbt_plus {
        background: #f47b3f !important;
        margin: 24px 0 0 0 !important;
        padding: 1px 15px;
        
        float: right;
        font-size: 20px;
    }
    
    
</style>


      <div class=" ">
			<div class="top_filer_section">
			<h5>Warehouse</h5>
								<table cellspacing="0" cellpadding="0">
				  <tr>
					<td>
					<label>Container</label>
					<input type="text" class="form-control input-sm" placeholder="" aria-controls="example">
					
					</td>
					<td>
					<label>Whare House</label>
					
					
						<input type="text" class="form-control input-sm" placeholder="" aria-controls="example">
					</td>
					<td>   <label>Whare House</label>
						<input type="text" class="form-control input-sm" placeholder="" aria-controls="example">
						</td>
					<td>   <label>Whare House</label>
						<input type="text" class="form-control input-sm" placeholder="" aria-controls="example">
						</td>
					<td>   
    <label>Wharehouse</label>
    <input type="text" class="form-control input-sm" placeholder="" aria-controls="example">
						</td>
						
						<td><button type="submit" class="btn blue nbt_plus">+</button>
						</td>
				  </tr>
				  <tr>
				    <td colspan="6"> <button type="submit" class="btn blue bnt_save">Save</button></td>
  </tr>
				</table>


				
			</div>


            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Number</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Web Page</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $slno = 1;
                    $sql_client = "SELECT * FROM ex_clients ORDER BY id desc";
                    $qry_client = mysqli_query($conn, $sql_client);
                    while ($row_client = $qry_client->fetch_assoc()) {
                        $id = $row_client['id'];
                        ?>
                        <tr id="delid_<?=$id?>">
                            <td id="delid_<?=$id?>"><?= $slno; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_client['cust_no']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_client['cust_name']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_client['cust_category']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_client['cust_phone']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_client['cust_email']; ?></td>
                            <td id="delid_<?=$id?>"><?= $row_client['cust_web']; ?></td>
                            <td id="delid_<?=$id?>">
                                <a href="editClient.php?id=<?=$id;?>" class="delete" id="<?=$id?>">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:;" class="delete" id="<?= $id; ?>" onClick="delete_row('<?= $id; ?>')">
                                    <i class="fa fa-trash-o fa_font" aria-hidden="true"></i>
                                </a>

                                <a href="viewClient.php?id=<?=$id;?>" class="delete" id="<?=$id?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>

                        </tr>
                        <?php $slno++;
                    } ?>
                </tbody>
            </table>


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
    $(document).ready(function () {
        $('#example').DataTable();
    });

    function delete_row(id) {

        var del_id = id;
        var url = 'deleteClient.php';
        Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to delete the Client?',
            title: 'Delete Client',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    
                    $.post(url,{del_id:del_id}, function(data){
                     $('#delid_'+id).hide(2000);
                       window.setTimeout(function(){

        // Move to a new location or you can do something else
     location.reload();

    }, 2100);

                    });
                }
            }
        });
    }
    
   
</script>
</body>


</html>

