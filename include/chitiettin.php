<?php
$id = $_GET["id"];
$sql = "select tintuc.tieude, muctin.tenmuctin, muctin.id, tintuc.noidung, tintuc.anh from tintuc inner join muctin on tintuc.muctin = muctin.id where tintuc.id='$id'";
$tb = mysql_query($sql);
$rs = mysql_fetch_array($tb);
?>
<div class = "col-sm-12 chi-tiet-tin">
    <div class="col-sm-12 no-padding">
        <p class="muctin"><a href="index.php?view=muctin&id=<?php echo $rs["id"];?>"><?php echo $rs["tenmuctin"];?></a></p>
    </div>  
    <div class="col-sm-12 no-padding">
        <p class="tieude"><?php echo $rs["tieude"];?></p>
    </div>
    <div class="col-sm-12 no-padding">
        <?php echo $rs["noidung"];?>
    </div>
</div>

