<?php 
include("../../config.php");
session_start();
$form = $_GET["form"];
$id = $_GET["id"];
$muctin = $_POST["muctin"];
$tieude = $_POST["tieude"];
$noidung = $_POST["noidung"];
$tenfile = $_FILES["anh"]["name"];
$noibat = $_POST["noibat"];
$trangthai = $_POST["trangthai"];
$ngaynhap = date("Y-m-d");
$nguoinhap = $_SESSION["user_huye_name"];
$time = date("hisdmY");
$filename = $_GET["filename"];
// xử lý tên file
if($tenfile != ""){
    $anh = $time.$tenfile;
    $dichcopy = "../../../imguploads/".$anh;
}else{$dichcopy="";}
// Lấy thông tin phân quyền
    $sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
    $tbphanquyen = mysql_query($sqlphanquyen);
    $rsphanquyen = mysql_fetch_array($tbphanquyen);
// thực hiện thêm tin mới
if(isset($_POST["them"])){
    if($rsphanquyen["them"]== 1){
        if($tenfile != ""){copy($_FILES["anh"]["tmp_name"],$dichcopy);}
        $sql = "insert into tintuc(muctin, tieude, noidung, anh, noibat, trangthai, ngaynhap, nguoinhap) values('$muctin','$tieude','$noidung','$anh','$noibat','$trangthai','$ngaynhap','$nguoinhap')";
        mysql_query($sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
    
}
if(isset($_POST["sua"])){
    if($rsphanquyen["sua"]== 1){
        if($tenfile != ""){
            if(file_exists("../../../imguploads/".$filename)){
                unlink("../../../imguploads/".$filename);
            }
            copy($_FILES["anh"]["tmp_name"],$dichcopy);
            $sql = "update tintuc set muctin = '$muctin', tieude = '$tieude', noidung = '$noidung',anh = '$anh',noibat = '$noibat',trangthai = '$trangthai', nguoinhap = '$nguoinhap' where id = '$id'";
        }else{
            $sql = "update tintuc set muctin = '$muctin', tieude = '$tieude', noidung = '$noidung',noibat = '$noibat',trangthai = '$trangthai', nguoinhap = '$nguoinhap' where id = '$id'";
        }
        mysql_query($sql);
        header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["xoa"])){
    if($rsphanquyen["xoa"]== 1){
        if(file_exists("../../../imguploads/".$filename)){
            unlink("../../../imguploads/".$filename);
        }
        $sql = "delete from tintuc where id = '$id'";
        mysql_query($sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>
