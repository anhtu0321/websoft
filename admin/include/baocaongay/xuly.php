<?php 
include("../../config.php");
session_start();
if(isset($_GET["form"])){$form = $_GET["form"];}else{$form="";}
if(isset($_GET["id"])){$id = $_GET["id"];}else{$id="";}

if(isset($_POST["tieude"])){$tieude = $_POST["tieude"];}else{$tieude="";}
if(isset($_POST["noidung"])){$noidung = $_POST["noidung"];}else{$noidung="";}

$tenfile = $_FILES["file"]["name"];
$ngaynhap = date("Y-m-d");
$nguoinhap = $_SESSION["user_huye_name"];
$time = date("hisdmY");
$filename = $_GET["filename"];
// xử lý tên file
if($tenfile != ""){
    $file = $time.$tenfile;
    $dichcopy = "../../../bcnuploads/".$file;
}else{$dichcopy="";}
// Lấy thông tin phân quyền
$sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
$tbphanquyen = mysqli_query($con, $sqlphanquyen);
$rsphanquyen = mysqli_fetch_array($tbphanquyen);
// thực hiện thêm tin mới
if(isset($_POST["them"])){
    if($rsphanquyen["them"]== 1){
        if($tenfile != ""){copy($_FILES["file"]["tmp_name"],$dichcopy);}
        $sql = "insert into baocaongay(tieude, noidung, file, ngaynhap, nguoinhap) values('$tieude','$noidung','$file','$ngaynhap','$nguoinhap')";
        mysqli_query($con, $sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["sua"])){
    if($rsphanquyen["sua"]== 1){
        if($tenfile != ""){
            if(file_exists("../../../bcnuploads/".$filename)){
                unlink("../../../bcnuploads/".$filename);
            } 
            copy($_FILES["file"]["tmp_name"],$dichcopy);
            $sql = "update baocaongay set tieude = '$tieude', noidung = '$noidung',file = '$file', nguoinhap = '$nguoinhap' where id = '$id'";
        }else{
            $sql = "update baocaongay set tieude = '$tieude', noidung = '$noidung', nguoinhap = '$nguoinhap' where id = '$id'";
        }
        mysqli_query($con, $sql);
        header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["xoa"])){
    if($rsphanquyen["xoa"]== 1){
        if(file_exists("../../../bcnuploads/".$filename)){
            unlink("../../../bcnuploads/".$filename);
        }
        $sql = "delete from baocaongay where id = '$id'";
        mysqli_query($con, $sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>
