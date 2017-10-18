<?php

function get_count($table)
{
        $database=new database();
	$qry_fun = "SELECT id FROM $table";
        $fun_res=$database->select_query_array($qry_fun);
        
	$numresults=$database->rows($qry_fun);
	return $numresults;
}
?>