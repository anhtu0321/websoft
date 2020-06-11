<?php 
include("../../config.php");
$form = $_GET["form"];
$id = $_GET["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$fullname = $_POST["fullname"];

if(isset($_POST["them"])){
    $sql = "insert into users(username, password, fullname) values('$username','$password','$fullname')";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form);
}
if(isset($_POST["sua"])){
    if($password == ""){
        $sql = "update users set username = '$username', fullname = '$fullname' where id = '$id'";
    }else{
        $sql = "update users set username = '$username', fullname = '$fullname', password = '$password' where id = '$id'";
    }
    mysql_query($sql);
    header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
}
if(isset($_POST["xoa"])){
    $sql = "delete from users where id = '$id'";
    mysql_query($sql);
    header("location: ../../index.php?form=".$form);
}
if(isset($_POST["capnhat"])){
    $sql = "select id from chucnang order by thutu ASC";
    $tb = mysql_query($sql);$i=0;
    while($rs = mysql_fetch_array($tb)){
        $sql1 = "select 1 from phanquyen where user = '$id' and form ='$rs[id]'";
        $tb1 = mysql_query($sql1);
        if(mysql_num_rows($tb1)>0){
            $sql = "update phanquyen set xem = '".$_POST["xem".$i]."',them = '".$_POST["them".$i]."',sua = '".$_POST["sua".$i]."',xoa = '".$_POST["xoa".$i]."' where user = '$id' and form = '$rs[id]'";
        }else{
            $sql = "insert into phanquyen(user,form, xem, them, sua, xoa) values('$id', '$rs[id]','".$_POST["xem".$i]."','".$_POST["them".$i]."','".$_POST["sua".$i]."','".$_POST["xoa".$i]."')";
        }
        mysql_query($sql); 
        $i++;
    }

    header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
}
?>
