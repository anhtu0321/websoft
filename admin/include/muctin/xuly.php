<?php 
include("../../config.php");
session_start();
if(isset($_GET["form"])){$form = $_GET["form"];}else{$form="";}
if(isset($_GET["id"])){$id = $_GET["id"];}else{$id="";}
$tenmuctin = $_POST["tenmuctin"];
$thutu = $_POST["thutu"];
$trangthai = $_POST["trangthai"];
// Lấy thông tin phân quyền
$sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
$tbphanquyen = mysqli_query($con,$sqlphanquyen);
$rsphanquyen = mysqli_fetch_array($tbphanquyen);
//thực hiện thêm sửa xóa
if(isset($_POST["them"])){
    if($rsphanquyen["them"]== 1){
        $sql = "insert into muctin(tenmuctin, thutu, trangthai) values('$tenmuctin','$thutu','$trangthai')";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["sua"])){
    if($rsphanquyen["sua"]== 1){
        $sql = "update muctin set tenmuctin = '$tenmuctin', thutu = '$thutu', trangthai = '$trangthai' where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["xoa"])){
    if($rsphanquyen["xoa"]== 1){
        $sql = "delete from muctin where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>
