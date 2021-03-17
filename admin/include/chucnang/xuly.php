<?php 
include("../../config.php");
session_start();
if(isset($_GET["form"])){$form = $_GET["form"];}else{$form="";}
if(isset($_GET["id"])){$id = $_GET["id"];}else{$id="";}
if(isset($_POST["tenmenu"])){$tenmenu = $_POST["tenmenu"];}else{$tenmenu="";}
$tenmenu = $_POST["tenmenu"];
$tenthumuc = $_POST["tenthumuc"];
$thutu = $_POST["thutu"];
$trangthai = $_POST["trangthai"];

if(isset($_POST["them"])){
    if($rsphanquyen["them"]== 1){
        $sql = "insert into chucnang(tenmenu, tenthumuc, thutu, trangthai) values('$tenmenu','$tenthumuc','$thutu','$trangthai')";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["sua"])){
    if($rsphanquyen["sua"]== 1){
        $sql = "update chucnang set tenmenu = '$tenmenu', tenthumuc = '$tenthumuc', thutu = '$thutu', trangthai = '$trangthai' where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["xoa"])){
    if($rsphanquyen["xoa"]== 1){
        $sql = "delete from chucnang where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>
