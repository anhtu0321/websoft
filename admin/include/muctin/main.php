

<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ MỤC TIN
</div>
<?php 
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