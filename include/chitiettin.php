<?php
$id = $_GET["id"];
$sql = "select tintuc.tieude, muctin.tenmuctin, muctin.id, tintuc.noidung, tintuc.anh, tintuc.ngaynhap from tintuc inner join muctin on tintuc.muctin = muctin.id where tintuc.id='$id'";
$tb = mysql_query($sql);
$rs = mysql_fetch_array($tb);
?>
<div class = "col-sm-12 chi-tiet-tin">
    <!-- tên mục tin -->
    <div class="col-sm-12 no-padding">
        <p class="muctin">
            <a href="index.php?view=muctin&id=<?php echo $rs["id"];?>">
                <span class="glyphicon glyphicon-th"></span>
                <?php echo $rs["tenmuctin"];?>
            </a>
        </p>
    </div>  
    <!-- Tiêu đề tin -->
    <div class="col-sm-12 no-padding">
        <p class="tieude"><?php echo $rs["tieude"];?></p>
        <p class="ngaynhap">Đăng ngày: <?php echo $rs["ngaynhap"];?></p>
    </div>
    <!-- nội dung tin -->
    <div class="col-sm-12 no-padding">
        <?php echo $rs["noidung"];?>
        <hr/>
    </div>
    
    <!-- Tin cùng chuyên mục -->
    <div class="col-sm-12 no-padding">
        <p style="font-weight:bold;">
                Tin cùng chuyên mục
        </p>
    </div>  
</div>

