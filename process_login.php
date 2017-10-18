<?php
session_start();
require_once('config/database.php');
$username = $_POST['user_name'];
$password = $_POST['password'];
$database=new database();


$query = "SELECT * FROM crm_owner where user_email='".$username."' and password='".$password."' and status='1'";

$log_res=$database->select_query_array($query);


if($database->rows($query) > 0){
			
			$_SESSION['loggedin'] = TRUE;
			$session = true;
			$_SESSION['uname'] = $_POST['inputUsername'];
			$_SESSION['username'] = $log_res[0]->user_name;
                        $_SESSION['user_id'] = $log_res[0]->id;
			echo $session;

}

?>