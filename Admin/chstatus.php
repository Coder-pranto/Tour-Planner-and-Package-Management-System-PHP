<?php

$cn = mysqli_connect('localhost', 'root', '', 'admin') or die("connection failed.");

$q = "SELECT Statusfield FROM enquiry WHERE enquiryid='" . $_GET["eid"] . "'";

$result = mysqli_query($cn, $q);
$r = mysqli_num_rows($result);

$data = mysqli_fetch_array($result);
echo $data[0];

if ( $data[0] == "Pending") {
    $s = "update enquiry set statusfield='Confirm' where enquiryid='" . $_GET["eid"] . "'";

} else {
    $s = "update enquiry set statusfield='Pending' where enquiryid='" . $_GET["eid"] . "'";
  
}

mysqli_query($cn, $s);
header("location:viewenquiry.php");


?>