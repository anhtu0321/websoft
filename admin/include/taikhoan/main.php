<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ TÀI KHOẢN
</div>
<?php 
    $sql = "select * from users";
    $tbusers = mysql_query($sql);
    $act = $_GET["act"];
    if ($act == "edit"){
        include("sua.php");
    }else{
        include("them.php");
    }
    include("lietke.php");
?>

