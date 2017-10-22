<?php
	require_once('settings.php');
        $database=new database();
	if($_POST['status']=="disable_user")
	{
	
        $up_arr=[ 
            'modified'=>$date,
            'modified_time'=>$time,
            'status'=>0
        ];
        $condtn="id='".$_POST['des_id']."'";
        $res=$database->update('crm_owner', $up_arr, $condtn);
	
        if($res){
          echo 1;  
        }
        }
        
        if($_POST['status']=="enable_user")
	{
	
        $up_arr=[ 
            'modified'=>$date,
            'modified_time'=>$time,
            'status'=>1
        ];
        $condtn="id='".$_POST['enb_id']."'";
        $res=$database->update('crm_owner', $up_arr, $condtn);
	
        if($res){
          echo 1;  
        }
        }
        
?>