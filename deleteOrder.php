<?php
  require_once('settings.php');
  $database=new database();
  if($_POST['status'] == 'delete_or')
        {
        $date=date('Y-m-d');
        $time=date('Y-m-d H:i:s');
	$id=$_POST['del_id'];
        $cond="id=$id";
        $up_del=['status' => 0,'modified' => $date,'modified_time' => $time];
        $result=$database->update('ex_order',$up_del, $cond);    
        
        if($result){
          echo 1;  
        }
        }
        if($_POST['status'] == 'enable_or')
        {
        $date=date('Y-m-d');
        $time=date('Y-m-d H:i:s');
	$id=$_POST['del_id'];
        $cond="id=$id";
        $up_enb=['status' => 1,'modified' => $date,'modified_time' => $time];
	$result=$database->update('ex_order',$up_enb, $cond);
        if($result){
          echo 1;  
        }
        }
        else {
            echo 0;
        }
       
?>