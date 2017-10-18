<?php
session_start();
if(!isset($_SESSION["loggedin"])){
	header('location:login.php');
}
else{
include('config/database.php');
$database_com=new database();
$sql_ex = "select * from exchange_rate order by id desc LIMIT 1";
$res_ex=$database_com->select_query_array($sql_ex);

$ex_amount=$res_ex[0]->amount;
if($_REQUEST['status']== "get_val"){
   echo $ex_amount;
}
date_default_timezone_set('Asia/Dubai');
$date=date('Y-m-d');
$time=date('Y-m-d H:i:s');
}
?>