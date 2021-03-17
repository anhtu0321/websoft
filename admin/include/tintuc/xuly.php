<?php 
include("../../config.php");
session_start();
if(isset($_GET["form"])){$form = $_GET["form"];}else{$form = "";}
if(isset($_GET["id"])){$id = $_GET["id"];}else{$id = "";}
if(isset($_POST["muctin"])){$muctin = $_POST["muctin"];}else{$muctin = '0';}
if(isset($_POST["tieude"])){$tieude = $_POST["tieude"];}else{$tieude = "";}
if(isset($_POST["noidung"])){$noidung = $_POST["noidung"];}else{$noidung = "";}
if(isset($_POST["noibat"])){$noibat = $_POST["noibat"];}else{$noibat = "0";}
if(isset($_POST["trangthai"])){$trangthai = $_POST["trangthai"];}else{$trangthai = "";}
if(isset($_FILES["anh"])){$tenfile = $_FILES["anh"]["name"];}else{$tenfile= "";}
$ngaynhap = date("Y-m-d");
$nguoinhap = $_SESSION["user_huye_name"];
$time = date("hisdmY");
if(isset($_GET["filename"])){$filename = $_GET["filename"];}else{$filename="";}
// xử lý tên file
if($tenfile != ""){
    $anh = $time.$tenfile;
    $dichcopy = "../../../imguploads/".$anh;
}else{
    $anh = "";
    $dichcopy="";
}
// Lấy thông tin phân quyền
    $sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
    $tbphanquyen = mysqli_query($con,$sqlphanquyen);
    $rsphanquyen = mysqli_fetch_array($tbphanquyen);
// thực hiện thêm tin mới
if(isset($_POST["them"])){
    if($rsphanquyen["them"]== 1){
        if($tenfile != ""){copy($_FILES["anh"]["tmp_name"],$dichcopy);}
        $sql = "insert into tintuc(muctin, tieude, noidung, anh, noibat, trangthai, ngaynhap, nguoinhap) values('$muctin','$tieude','$noidung','$anh','$noibat','$trangthai','$ngaynhap','$nguoinhap')";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["sua"])){
   
    if($rsphanquyen["sua"]== 1){
        if($tenfile != ""){
            if(file_exists("../../../imguploads/".$filename && $filename!="")){
                unlink("../../../imguploads/".$filename);
            }
            copy($_FILES["anh"]["tmp_name"],$dichcopy);
            $sql = "update tintuc set muctin = '$muctin', tieude = '$tieude', noidung = '$noidung',anh = '$anh',noibat = '$noibat',trangthai = '$trangthai', nguoinhap = '$nguoinhap' where id = '$id'";
        }else{
            $sql = "update tintuc set muctin = '$muctin', tieude = '$tieude', noidung = '$noidung',noibat = '$noibat',trangthai = '$trangthai', nguoinhap = '$nguoinhap' where id = '$id'";
        }
        // echo $sql;
        mysqli_query($con,$sql);
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
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>
