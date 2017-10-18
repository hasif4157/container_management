<?php
require_once('settings.php');
$database=new database();
     $sel_frloc = $_POST['sel_frloc'];
       $sql = "select * from from_location where id=$sel_frloc";
        $res=$database->select_query_array($sql);
	echo trim($res[0]->loc_addr);
?>
