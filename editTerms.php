<?php
require_once('settings.php');

    $description = trim($_POST['description']);
   
    $sql = "UPDATE `ex_terms` SET `modified`='".$date."',`modified_time`='".$time."',`description`='".$description."' WHERE status=1";
	$res = $conn->query($sql);
        
        if($res){
            
        echo '<script type="text/javascript">

           window.location = "update_terms.php"
           

		   </script>';
  
  
        }

?>