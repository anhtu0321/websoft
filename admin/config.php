<?php
// date_default_timezone_get("Asia/Ho_Chi_Minh");
$server = "localhost";
$user = "root";
$pass = "tuanninh1";
$database = "websoft";
$con = mysqli_connect($server,$user,$pass);
mysqli_set_charset($con, 'latin1');
// mysqli_set_charset($con, 'utf8');
mysqli_select_db($con,$database);
?>