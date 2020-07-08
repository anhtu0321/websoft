
<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ PHẦN MỀM
</div>
<?php 
    $sql = "select id, tieude from phanmem where trangthai = 1 order by thutu asc";
    $tbphanmem = mysql_query($sql);
    $form = $_GET["form"];
    $act = $_GET["act"];
    $false = $_GET["false"];
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