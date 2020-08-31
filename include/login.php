<?php 
    include("../admin/config.php");
    $username = $_POST["un"];
    $password = $_POST["pw"];
    $sql = "select * from users where (username = '$username') and (password = '$password')";
    $tb = mysql_query($sql);
    $num = mysql_num_rows($tb);
    if($num == 0){
        echo "Đăng nhập không thành công !";
    }else{
         $rs = mysql_fetch_array($tb);
         $_SESSION["user_huye_id"] = $rs["id"];
         $_SESSION["user_huye_name"] = $rs["username"];
         $_SESSION["user_huye_full_name"] = $rs["fullname"];
         header("location: ../index.php");
    }
?>