
<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ BÁO CÁO NGÀY
</div>
<?php 
    $sql = "select id, tieude from baocaongay where trangthai = 1 order by thutu asc";
    $tbbaocaongay = mysqli_query($con,$sql);
    if(isset($_GET["form"])){$form = $_GET["form"];}else{ $form="";}
    if(isset($_GET["act"])){$act = $_GET["act"];}else{ $act="";}
    if(isset($_GET["false"])){$false = $_GET["false"];}else{ $false="";}
    if($false == "false"){
        include("false.php");
    }
    if ($act == "edit"){
        include("sua.php");
    }else if($act == "add"){
        include("them.php");
    }else{
        include("locketqua.php");
    }
    // include("lietke.php");
?>