
<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ BÁO CÁO NGÀY
</div>
<?php 
    $sql = "select id, tieude from baocaongay where trangthai = 1 order by thutu asc";
    $tbbaocaongay = mysql_query($sql);
    $form = $_GET["form"];
    $act = $_GET["act"];
    if ($act == "edit"){
        include("sua.php");
    }else if($act == "add"){
        include("them.php");
    }else{
        include("locketqua.php");
    }
    // include("lietke.php");
?>