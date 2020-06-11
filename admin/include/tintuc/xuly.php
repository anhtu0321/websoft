<?php 
include("../../config.php");
$form = $_GET["form"];
$id = $_GET["id"];
$muctin = $_POST["muctin"];
$tieude = $_POST["tieude"];
$noidung = $_POST["noidung"];
$tenfile = $_FILES["anh"]["name"];
$noibat = $_POST["noibat"];
$trangthai = $_POST["trangthai"];
$ngaynhap = date("m-d-Y");
$nguoinhap = $_POST["nguoinhap"];
$time = date("hisdmY");
$filename = $_GET["filename"];
// xử lý tên file
if($tenfile != ""){
    $anh = $time.$tenfile;
    $dichcopy = "../../../imguploads/".$anh;
}else{$dichcopy="";}
// thực hiện thêm tin mới
if(isset($_POST["them"])){
    if($tenfile != ""){copy($_FILES["anh"]["tmp_name"],$dichcopy);}
    $sql = "insert into tintuc(muctin, tieude, noidung, anh, noibat, trangthai, ngaynhap, nguoinhap) values('$muctin','$tieude','$noidung','$anh','$noibat','$trangthai','$ngaynhap','$nguoinhap')";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form);
}
if(isset($_POST["sua"])){
    if($tenfile != "" and file_exists("../../../imguploads/".$filename)){
        unlink("../../../imguploads/".$filename);
        copy($_FILES["anh"]["tmp_name"],$dichcopy);
        $sql = "update tintuc set muctin = '$muctin', tieude = '$tieude', noidung = '$noidung',anh = '$anh',noibat = '$noibat',trangthai = '$trangthai', ngaynhap = '$ngaynhap', nguoinhap = '$nguoinhap' where id = '$id'";
    }else{
        $sql = "update tintuc set muctin = '$muctin', tieude = '$tieude', noidung = '$noidung',noibat = '$noibat',trangthai = '$trangthai', ngaynhap = '$ngaynhap', nguoinhap = '$nguoinhap' where id = '$id'";
    }
    mysql_query($sql);
    header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
}
if(isset($_POST["xoa"])){
    $sql = "delete from tintuc where id = '$id'";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form);
}
?>
