<?php 
session_start();
include("../../config.php");
$tenAnh = $_POST["tenAnh"];
$url = $_FILES["url"]["name"];
$thuTu = $_POST["thuTu"];
$id = $_GET["id"];
$time = date("Ymdhis");
if($url!=""){
	$url=$time.$url;
	$url1="uploads/".$url;
	}
if(isset($_POST["them"])){
	if($url!=""){
		copy($_FILES["url"]["tmp_name"],"../../../uploads/".$url);}
	$sql = "insert into anhbanner(tenAnh,url,thuTu) value('$tenAnh','$url1','$thuTu')";
	mysqli_query($connect,$sql);
	header("location:../../index.php?quanly=qlanhbanner&act=them");
	}
else if($_POST["sua"]){
	if($url!=""){
		$sql = "select url from anhbanner where idAnh = $id";
		$tb = mysqli_query($connect,$sql);
		$rs = mysqli_fetch_array($tb);
		if(file_exists("../../../".$rs["url"])){
			unlink("../../../".$rs["url"]);}
			copy($_FILES["url"]["tmp_name"],"../../../uploads/".$url);
	$sql = "update anhbanner set tenAnh='$tenAnh',url='$url1',thuTu='$thuTu' where idAnh=$id";
	} else{
			$sql = "update anhbanner set tenAnh='$tenAnh',thuTu='$thuTu', where idAnh=$id";
	}
	mysqli_query($connect,$sql);
	header("location:../../index.php?quanly=qlanhbanner&act=sua&id=$id");
	}
	else if(isset($_POST["xoa"])){
	$sql = "delete from anhbanner where idAnh = $id";
	mysqli_query($connect,$sql);
	header("location:../../index.php?quanly=qlanhbanner&act=them");
	}
?>