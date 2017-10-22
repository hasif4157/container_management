<?php
require_once('settings.php');

$database=new database();
if($_POST['status'] == "get_location"){
    
  
                   $sql_toloc = "SELECT id,loc_name FROM to_location where id !='' order by id asc";
                   $row_toloc = $database->select_query_array($sql_toloc);
                  echo json_encode($row_toloc);
                                           
                                         
}


?>

