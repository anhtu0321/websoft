<?php 
$muctin = $_GET["muctin"];
$nguoinhap = $_GET["nguoinhap"];
$tungay = $_GET["tungay"];
$denngay = $_GET["denngay"];

?>
<div class="col-sm-12 col-md-12 col-lg-12">
    <button class="btn btn-primary btn-sm" onclick = "window.location.href='index.php?form=<?php echo $form;?>&act=add'">Thêm mới tin tức</button>
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
    Danh sách tin
    <form action="index.php?form=<?php echo $form?>&muctin=<?php echo $muctin?>&nguoinhap=<?php echo $nguoinhap?>&tungay=<?php echo $tungay?>&denngay=<?php echo $denngay?>" method="POST" class="form-inline" role="form">
        <div class="form-group">
            Mục tin: 
                <select name="muctin" style="width:200px;">
                    <option value="">--- Tất cả ---</option>
                    <?php 
                    while($rs = mysql_fetch_array($tbmuctin)){
                        if($rs["id"] == $muctin){
                    ?>
                            <option value="<?php echo $rs['id']?>" selected="selected"><?php echo $rs['tenmuctin']?></option>
                    <?php
                        }else{
                    ?>
                        <option value="<?php echo $rs['id']?>"><?php echo $rs['tenmuctin']?></option>
                    <?
                        }
                    }
                    ?>
                </select>
        </div>
        <div class="form-group">
            Người đăng: 
                <select name="nguoinhap" style="width:120px;">
                    <option value="">--- Tất cả ---</option>
                    <?php 
                    $sql = "select username from users order by id DESC";
                    $tbusers = mysql_query($sql);
                    while($rs = mysql_fetch_array($tbusers)){
                        if($rs["username"] == $nguoinhap){
                            ?>
                                <option value="<?php echo $rs['username']?>" selected="selected"><?php echo $rs['username']?></option>
                            <?php
                                }else{
                            ?>
                                <option value="<?php echo $rs['username']?>"><?php echo $rs['username']?></option>
                            <?
                                }
                    }
                    ?>
                </select>
        </div>
        <div class="form-group">
            Từ ngày: 
                <input type="date" name = "tungay" value = "<?php echo $tungay;?>" style="width:140px;">
        </div>
        <div class="form-group">
            Đến ngày: 
                <input type="date" name = "denngay" value = "<?php echo $denngay;?>" style="width:140px;">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Xem</button>
    </form>
    
</div>
<?php 
    // Tính tổng số bản ghi
    $sql = "select count(id) as tong from tintuc where trangthai = 1 and ngaynhap between '$tungay' and '$denngay'";
    if ($muctin != ""){$sql = $sql." and muctin ='$muctin'"; }
    if ($nguoinhap != ""){$sql = $sql." and nguoinhap ='$nguoinhap'"; }
    $tbtong = mysql_query($sql);
    $rstong = mysql_fetch_array($tbtong);
    $tong = $rstong["tong"];
    // Các thông số để phân trang
    $trang = $_GET["trang"]; if($trang = ""){$trang = 1;}
    $num = 10;
    $sotrang = ceil($tong/$num);
    $batdau = ($trang-1)*$num;
    //Lấy dữ liệu trong cơ sở dữ liệu

    $sqltintuc = "select id, muctin, tieude, noidung, anh, noibat, trangthai, nguoinhap, ngaynhap from tintuc where trangthai = 1 and ngaynhap between '$tungay' and '$denngay'";
    if ($muctin != ""){$sqltintuc = $sqltintuc." and muctin ='$muctin'"; }
    if ($nguoinhap != ""){$sqltintuc = $sqltintuc." and nguoinhap ='$nguoinhap'"; }
    $sqlltintuc = $sqltintuc."order by id DESC limit $batdau,$num";
    $tbtintuc = mysql_query($sqltintuc);
    
?>
<?php 
    if($tong > 0){
?>
    <div class="col-sm-12 col-md-12 col-lg-12 margin-top-10">
        <table class="table table-condensed table-hover">
            <thead>
                <tr class="danger">
                    <th>TT</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Ảnh minh họa</th>
                    <th><div class="text-center">Nổi bật</div></th>
                    <th><div class="text-center">Trạng thái</div></th>
                    <th><div class="text-center">Người nhập</div></th>
                    <th><div class="text-center">Ngày nhập</div></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($rs = mysql_fetch_array($tbtintuc)){$i++;
                    ?>
                    <?php
                        if ($id == $rs["id"]){ echo "<tr class='success'>";
                        }else{echo "<tr>";}
                    ?>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rs["tieude"]; ?></td>
                        <td><?php echo $rs["noidung"]; ?></td>
                        <td><img src="../imguploads/<?php echo $rs['anh']; ?>" width="100px"></td>
                        <td align="center"><?php echo $rs["noibat"]; ?></td>
                        <td align="center">
                            <?php 
                                if($rs["trangthai"]==1){echo "Hiển thị";};
                                if($rs["trangthai"]==0){echo "Không hiển thị";};
                            ?>
                        </td>
                        <td align="center"><?php echo $rs["nguoinhap"]; ?></td>
                        <td align="center"><?php echo $rs["ngaynhap"]; ?></td>
                        <td>
                            <a href="index.php?form=<?php echo $form?>&act=edit&id=<?php echo $rs["id"]?>">
                                <img src="img/b_edit.png">
                            </a>
                        </td>
                    </tr>
                    <?    
                    }
                ?>
            </tbody>
        </table>
    </div>
<?php
    }else{
?>
    <div class="col-sm-12 col-md-12 col-lg-12 margin-top-10">
        Không có kết quả phù hợp !
    </div>
<?php
    }
?>

    <div class="trang">
        <ul>
            <li><button type="submit" href="index.php?form=<?php echo $form;?>&trang=1"> First <input type="text" value ="1" hidden="true"> </button></li>
            <?
            if($sotrang <= 10){$batdau=1;$ketthuc=$sotrang;}
            else {
                if($trang<5){$batdau=1;$ketthuc=10;}
                else if($trang+5 > $sotrang){$batdau=$sotrang-9;$ketthuc=$sotrang;}
                else{$batdau=$trang-4;$ketthuc=$trang+5;}
            }
            for($i=$batdau; $i<=$ketthuc; $i++){?>
                <? if($trang == $i){echo "<li class='liactive'>";}else{echo "<li>";}?><a href="index.php?form=<?php echo $form;?>&trang=<? echo $i;?>"><? echo $i;?></a></li>
            <? }?>
            <li><a href="index.php?form=<?php echo $form;?>&trang=<?php echo $sotrang?>"> End </a></li>
        </ul>
    </div>


