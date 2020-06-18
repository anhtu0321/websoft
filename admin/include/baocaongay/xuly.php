<?php 
include("../../config.php");
session_start();
$form = $_GET["form"];
$id = $_GET["id"];
$tieude = $_POST["tieude"];
$noidung = $_POST["noidung"];
$tenfile = $_FILES["file"]["name"];
$ngaynhap = date("Y-m-d");
$nguoinhap = $_SESSION["user_huye_name"];
$time = date("hisdmY");
$filename = $_GET["filename"];
// xử lý tên file
if($tenfile != ""){
    $file = $time.$tenfile;
    $dichcopy = "../../../bcnuploads/".$anh;
}else{$dichcopy="";}
// thực hiện thêm tin mới
if(isset($_POST["them"])){
    if($tenfile != ""){copy($_FILES["file"]["tmp_name"],$dichcopy);}
    $sql = "insert into baocaongay(tieude, noidung, file, ngaynhap, nguoinhap) values('$tieude','$noidung','$file','$ngaynhap','$nguoinhap')";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form);
}
if(isset($_POST["sua"])){
    if($tenfile != "" and file_exists("../../../bcnuploads/".$filename)){
        unlink("../../../bcnuploads/".$filename);
        copy($_FILES["anh"]["tmp_name"],$dichcopy);
        $sql = "update baocaongay set tieude = '$tieude', noidung = '$noidung',file = '$file', nguoinhap = '$nguoinhap' where id = '$id'";
    }else{
        $sql = "update baocaongay set tieude = '$tieude', noidung = '$noidung',file = '$file', nguoinhap = '$nguoinhap' where id = '$id'";
    }
    mysql_query($sql);
    header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
}
if(isset($_POST["xoa"])){
    $sql = "delete from baocaongay where id = '$id'";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form);
}
?>
