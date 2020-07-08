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
    $dichcopy = "../../../pmuploads/".$file;
}else{$dichcopy="";}
// Lấy thông tin phân quyền
$sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
$tbphanquyen = mysql_query($sqlphanquyen);
$rsphanquyen = mysql_fetch_array($tbphanquyen);
// thực hiện thêm pm mới
if(isset($_POST["them"])){
    if($rsphanquyen["them"]== 1){
        if($tenfile != ""){copy($_FILES["file"]["tmp_name"],$dichcopy);}
        $sql = "insert into phanmem(tieude, noidung, file, ngaynhap, nguoinhap) values('$tieude','$noidung','$file','$ngaynhap','$nguoinhap')";
        mysql_query($sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["sua"])){
    if($rsphanquyen["sua"]== 1){
        if($tenfile != ""){
            if(file_exists("../../../pmuploads/".$filename)){
                unlink("../../../pmuploads/".$filename);
            } 
            copy($_FILES["file"]["tmp_name"],$dichcopy);
            $sql = "update phanmem set tieude = '$tieude', noidung = '$noidung',file = '$file', nguoinhap = '$nguoinhap' where id = '$id'";
        }else{
            $sql = "update phanmem set tieude = '$tieude', noidung = '$noidung', nguoinhap = '$nguoinhap' where id = '$id'";
        }
        mysql_query($sql);
        header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["xoa"])){
    if($rsphanquyen["xoa"]== 1){
        if(file_exists("../../../pmuploads/".$filename)){
            unlink("../../../pmuploads/".$filename);
        }
        $sql = "delete from phanmem where id = '$id'";
        mysql_query($sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>
