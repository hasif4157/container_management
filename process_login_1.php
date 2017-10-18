<?php
session_start();
echo "hiiii";
require_once('config/database.php');
//$username = mysqli_real_escape_string($conn,$_POST['user_name']);
//$password = mysqli_real_escape_string($conn,$_POST['password']);
$database=new database();
print_r($database);
$query = "SELECT * FROM crm_owner where user_email='".$username."' and password='".$password."' and status='1'";
$sql = $conn->query($query);
$numuser = $sql->num_rows;

if($numuser > 0){
			$row = $sql->fetch_assoc();
			$_SESSION['loggedin'] = TRUE;
			$session = true;
			$_SESSION['uname'] = $_POST['inputUsername'];
			$_SESSION['branch'] = $row['employee'];
			$_SESSION['username'] = $row['username'];
                        $_SESSION['user_id'] = $row['id'];
			echo $session;

}

?>