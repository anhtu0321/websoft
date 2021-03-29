<?php 
session_start();
include("../../config.php");
if(isset($_GET["form"])){$form = $_GET["form"];}else {$form="";}
if(isset($_GET["id"])){$id = $_GET["id"];}else {$id="";}
if(isset($_GET["filename"])){$filename = $_GET["filename"];}else {$filename="";}
if(isset($_POST["tenanh"])){$tenanh = $_POST["tenanh"];}else{$tenanh="";}
if(isset($_POST["thutu"])){$thutu = $_POST["thutu"];}else{$thutu="";}
$tenfile = $_FILES["url"]["name"];
$time = date("Ymdhis");
// xử lý tên file
if($tenfile != ""){
    $file = $time.str_slug($tenfile);
    $dichcopy = "../../../imgslide/".$file;
}else{
    $file="";
    $dichcopy="";
}
// Lấy thông tin phân quyền
$sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
$tbphanquyen = mysqli_query($con, $sqlphanquyen);
$rsphanquyen = mysqli_fetch_array($tbphanquyen);

if(isset($_POST["them"])){
	if($rsphanquyen["them"]== 1){
		if($tenfile != ""){copy($_FILES["url"]["tmp_name"],$dichcopy);}
        $sql = "insert into anhslide(tenanh, url, thutu) values('$tenanh','$file','$thutu')";
        mysqli_query($con, $sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
	}
}
if(isset($_POST["sua"])){
	if($rsphanquyen["sua"]== 1){
		if($file!=""){
			if(file_exists("../../../imgslide/".$filename)){
				unlink("../../../imgslide/".$filename);
			}
			copy($_FILES["url"]["tmp_name"],$dichcopy);
			$sql = "update anhslide set tenanh='$tenanh',url='$file',thutu='$thutu' where id=$id";
		} else{
			$sql = "update anhslide set tenanh='$tenanh',thutu='$thutu' where id=$id";
		}
		mysqli_query($con,$sql);
		header("location: ../../index.php?form=".$form);
	}else{
        header("location: ../../index.php?form=".$form."&false=false");
	}
}
if(isset($_POST["xoa"])){
	if($rsphanquyen["xoa"]== 1){
        if(file_exists("../../../imgslide/".$filename)){
            unlink("../../../imgslide/".$filename);
        }
        $sql = "delete from anhslide where id = '$id'";
        mysqli_query($con, $sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>