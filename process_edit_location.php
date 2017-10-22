<?php

require_once('settings.php');
$date=date('Y-m-d');
$time=date('Y-m-d H:i:s');
$loc_type = $_POST['loc_type'];
$loc_name = $_POST['loc_name'];
$loc_addr = $_POST['loc_addr'];
$loc_email = $_POST['loc_email'];
$color_code="#".$_POST['ord_color'];
$loc_phone = $_POST['loc_phone'];
$ph_count = count($loc_phone);

for ($i = 0; $i < $ph_count; $i++) {
    if (empty($loc_ph)) {
        $loc_ph .= $loc_phone[$i];;
    } else {
        $loc_ph .= "," . $loc_phone[$i];
    }
}

$loc_fax = $_POST['loc_fax'];
$loc_city = $_POST['loc_city'];
$loc_state = $_POST['loc_state'];
$loc_country = $_POST['loc_country'];
$loc_zip = $_POST['loc_zip'];
$loc_cp = $_POST['loc_cp'];
$loc_cpp = $_POST['loc_cpp'];


$sql = "INSERT INTO `ex_location` (`created`, `created_time`, `modified`, `modified_time`, `loc_type`, `loc_name`,`loc_addr`,`color_code`,`loc_email`,
	`loc_phone`,`loc_fax`,`loc_city`,`loc_state`,`loc_country`,`loc_zip`,`loc_cp`,`loc_cpp`)
        VALUES ('".$date."','".$time."','".$date."','".$time."', '" . $loc_type . "', '" . $loc_name . "', '" . $loc_addr . "', '".$color_code."', '" . $loc_email . "', '" . $loc_ph . "', '" . $loc_fax . "','" . $loc_city . "','" . $loc_state . "','" . $loc_country . "'"
        . ",'" . $loc_zip . "','" . $loc_cp . "','" . $loc_cpp . "')";
$res = $conn->query($sql);

if ($res) {
    echo 1;
}
?>