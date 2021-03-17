<?php
if(isset($_GET["id"])){$id = $_GET["id"];}else{ $id = 0; }
$sql = "select * from phanmem where id='$id'";
$tb = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($tb);
?>
<div class = "col-sm-12 chi-tiet-tin">
    <!-- Tiêu đề tin -->
    <div class="col-sm-12 no-padding">
        <p class="tieude"><?php echo $rs["tieude"];?></p>
        <p class="ngaynhap">'<?php echo $rs["nguoinhap"];?>' đăng ngày: <?php echo $rs["ngaynhap"];?></p>
    </div>
    <!-- nội dung tin -->
    <div class="col-sm-12 no-padding">
        <?php echo $rs["noidung"];?>
    </div>
    <div class="col-sm-12 no-paddingn text-right">
        <a href="pmuploads/<?php echo $rs['file'];?>"><span class="glyphicon glyphicon-download-alt"></span> File đính kèm</a>
        <hr/>
    </div>
    <!-- Tin cùng chuyên mục -->
<?php
// lay id lon nhat
    $sqlmax = "select id from phanmem where id> $id order by id DESC limit 5";
    $tbmax = mysqli_query($con, $sqlmax); 
    $rsmax = mysqli_fetch_array($tbmax);
    $max = $rsmax["id"];
    if ($max == ""){$max = $id;}
// lay id nho nhat
    $sqlmin = "select id from phanmem where id < $id order by id ASC limit 5";
    $tbmin = mysqli_query($con, $sqlmin); 
    $rsmin = mysqli_fetch_array($tbmin);
    $min = $rsmin["id"];
    if ($min == ""){$min = $id;}
$sqlcungmuc = "select id, tieude, ngaynhap from phanmem where id <> '$id' and id BETWEEN $min and $max order by id DESC limit 10";
$tbcungmuc = mysqli_query($con, $sqlcungmuc);
?>
    <div class="col-sm-12 no-padding tin-chuyen-muc">
        <p>
            Báo cáo khác
        </p>
        <ul>
            <?php
                while($rscungmuc = mysqli_fetch_array($tbcungmuc)){
            ?>
                    <li><a href="index.php?view=chitietpmmt&id=<?php echo $rscungmuc['id'];?>"><?php echo $rscungmuc["tieude"];?></a><br></li>
            <?php
                }
            ?>
        </ul>
    </div>  
</div>
