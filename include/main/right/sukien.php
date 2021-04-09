<?php
    $sql = "select id, tenmuctin from muctin where trangthai = 2 order by thutu ASC";
    $tb = mysqli_query($con, $sql);
    while($rs = mysqli_fetch_array($tb)){
        $sql_tin = "select id, tieude from tintuc where muctin = '$rs[id]' order by id DESC limit 3";
        $tb_tin = mysqli_query($con, $sql_tin);
?>
        <div class="border img-right col-sm-12 no-padding background">
            <p class="title">
                <a href="index.php?view=muctin&id=<?php echo $rs['id'];?>"><?php echo $rs["tenmuctin"]; ?></a>
            </p>
            <?php 
                while($rs_tin = mysqli_fetch_array($tb_tin)){
            ?>
                    <p class="text-justify col-sm-11 no-padding margin-left-5 p-link">
                        <a href="index.php?view=chitiet&id=<?php echo $rs_tin['id'];?>"><?php echo $rs_tin["tieude"]; ?></a>
                    </p>
            <?php
                }
            ?>
        </div>
<?php
    }
?>

