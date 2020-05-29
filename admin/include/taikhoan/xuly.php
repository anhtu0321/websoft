<?php 
include("../../config.php");
$form = $_GET["form"];
$id = $_GET["id"];
$tenmenu = $_POST["tenmenu"];
$tenthumuc = $_POST["tenthumuc"];
$thutu = $_POST["thutu"];
$trangthai = $_POST["trangthai"];

if(isset($_POST["them"])){
    $sql = "insert into chucnang(tenmenu, tenthumuc, thutu, trangthai) values('$tenmenu','$tenthumuc','$thutu','$trangthai')";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form);
}
if(isset($_POST["sua"])){
    $sql = "update chucnang set tenmenu = '$tenmenu', tenthumuc = '$tenthumuc', thutu = '$thutu', trangthai = '$trangthai' where id = '$id'";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
}
if(isset($_POST["xoa"])){
    $sql = "delete from chucnang where id = '$id'";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form);
}
?>
