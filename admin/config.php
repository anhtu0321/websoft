<?php
date_default_timezone_get("Asia/Ho_Chi_Minh");
$server = "localhost";
$user = "root";
$pass = "299092kaka";
$database = "websoft";
$con = mysql_connect($server,$user,$pass);
mysql_select_db($database,$con);
?>