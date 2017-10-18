<?php
require_once('settings.php');
     $databae=new database();
     $sel_toloc = $_POST['sel_toloc'];
     
        $sql = "select * from to_location where id=$sel_toloc";
	$res=$databae->select_query_array($sql);
        echo trim($res[0]->loc_addr);
?>
