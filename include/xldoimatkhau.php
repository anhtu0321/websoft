<?
	include("../admin/config.php");
	session_start();
	$oldpass = $_POST["oldpass"];
	$newpass = $_POST["newpass"];
	$nguoinhap = $_SESSION["user_huye_name"];
	$sql = "select password from users where username = '$nguoinhap'";
	$tb = mysqli_query($sql); $rs = mysqli_fetch_array($tb); 
	if($rs["password"] == $oldpass){
		$sql = "update users set password = '$newpass' where username = '$nguoinhap'";
		mysqli_query($sql);
		echo "<span style='color:red'>Đổi mật khẩu thành công !</span>";
	}
	else{
		echo "<span style='color:red'>Mật khẩu cũ không đúng !</span>";
	}
?>
