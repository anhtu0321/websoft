<?php
$id = $_GET["id"];
$sql = "select tintuc.tieude, muctin.tenmuctin, muctin.id, tintuc.noidung, tintuc.anh, tintuc.ngaynhap from tintuc inner join muctin on tintuc.muctin = muctin.id where tintuc.id='$id'";
$tb = mysql_query($sql);
$rs = mysql_fetch_array($tb);
?>
<div class = "col-sm-12 chi-tiet-tin">
    <!-- tên mục tin -->
    <div class="col-sm-12 no-padding">
<<<<<<< HEAD
        <p class="tdmuctin"><a href="index.php?view=muctin&id=<?php echo $rs["id"];?>"><?php echo $rs["tenmuctin"];?></a></p>
=======
        <p class="muctin">
            <a href="index.php?view=muctin&id=<?php echo $rs["id"];?>">
                <span class="glyphicon glyphicon-th"></span>
                <?php echo $rs["tenmuctin"];?>
            </a>
        </p>
>>>>>>> e51f0005b653f7df31b34f0073ef0523c6204fd2
    </div>  
    <!-- Tiêu đề tin -->
    <div class="col-sm-12 no-padding">
        <p class="tieude"><?php echo $rs["tieude"];?></p>
        <p class="ngaynhap">Đăng ngày: <?php echo $rs["ngaynhap"];?></p>
    </div>
<<<<<<< HEAD
    <div class="col-sm-12">
=======
    <!-- nội dung tin -->
    <div class="col-sm-12 no-padding">
>>>>>>> e51f0005b653f7df31b34f0073ef0523c6204fd2
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
