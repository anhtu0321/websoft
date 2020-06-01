<?php 
include("../../config.php");
$form = $_GET["form"];
$id = $_GET["id"];
$tenmuctin = $_POST["tenmuctin"];
$thutu = $_POST["thutu"];
$trangthai = $_POST["trangthai"];

if(isset($_POST["them"])){
    $sql = "insert into muctin(tenmuctin, thutu, trangthai) values('$tenmuctin','$thutu','$trangthai')";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form);
}
if(isset($_POST["sua"])){
    $sql = "update muctin set tenmuctin = '$tenmuctin', thutu = '$thutu', trangthai = '$trangthai' where id = '$id'";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
}
if(isset($_POST["xoa"])){
    $sql = "delete from muctin where id = '$id'";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form);
}
?>
