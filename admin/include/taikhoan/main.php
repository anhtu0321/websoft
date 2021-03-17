<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ TÀI KHOẢN
</div>
<?php 
    $sql = "select * from users";
    $tbusers = mysqli_query($con,$sql);
    if(isset($_GET["act"])){$act = $_GET["act"];}else{$act="";}
    if(isset($_GET["false"])){$false = $_GET["false"];}else{$false="";}
    if($false == "false"){
        include("false.php");
    }
    if ($act == "edit"){
        include("sua.php");
    }else{
        include("them.php");
    }
    include("lietke.php");
?>

