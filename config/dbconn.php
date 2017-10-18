<?php
error_reporting(0);
session_start();
ob_start();
ob_flush();
$dbhost = 'localhost';
$dbuser = 'root'; 
$dbpass = '';    
$dbname = 'container';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql');

?>