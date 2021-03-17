<?php 
if(isset($_POST["tieude"])){$tieude = $_POST["tieude"];}else{ $tieude="";}
if(isset($_POST["nguoinhap"])){$nguoinhap = $_POST["nguoinhap"];}else{ $nguoinhap="";}
if(isset($_POST["tungay"])){$tungay = $_POST["tungay"];}else{ $tungay=date("Y-m-d");}
if(isset($_POST["denngay"])){$denngay = $_POST["denngay"];}else{ $denngay=date("Y-m-d");}
if(isset($_POST["trang"])){$trang = $_POST["trang"];}else{ $trang=1;}

?>
<div class="col-sm-12 col-md-12 col-lg-12">
    <button class="btn btn-primary btn-sm" onclick = "window.location.href='index.php?form=<?php echo $form;?>&act=add'">Thêm mới Báo cáo ngày</button>
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
    Danh sách file báo cáo ngày
    <form action="index.php?form=<?php echo $form?>" method="POST" class="form-inline" role="form">
        <div class="form-group">
            Người nhập: 
                <select name="nguoinhap" style="width:120px;">
                    <option value="">--- Tất cả ---</option>
                    <?php 
                    $sql = "select username from users order by id DESC";
                    $tbusers = mysqli_query($con,$sql);
                    while($rs = mysqli_fetch_array($tbusers)){
                        if($rs["username"] == $nguoinhap){
                            ?>
                                <option value="<?php echo $rs['username']?>" selected="selected"><?php echo $rs['username']?></option>
                            <?php
                                }else{
                            ?>
                                <option value="<?php echo $rs['username']?>"><?php echo $rs['username']?></option>
                            <?php
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
<!-- Tính toán thông số để phân trang -->
<?php 
    // Tính tổng số bản ghi
    $sql = "select count(id) as tong from baocaongay where ngaynhap between '$tungay' and '$denngay'";
    if ($nguoinhap != ""){$sql = $sql." and nguoinhap ='$nguoinhap'"; }
    $tbtong = mysqli_query($con,$sql);
    $rstong = mysqli_fetch_array($tbtong);
    $tong = $rstong["tong"];
    // Các thông số để phân trang
    $num = 10;
    $sotrang = ceil($tong/$num);
    $vitribatdau = ($trang-1)*$num;
    //Lấy dữ liệu trong cơ sở dữ liệu

    $sqlbaocaongay = "select id, tieude, noidung, file, nguoinhap, ngaynhap from baocaongay where ngaynhap between '$tungay' and '$denngay'";
    if ($nguoinhap != ""){$sqlbaocaongay = $sqlbaocaongay." and nguoinhap ='$nguoinhap'"; }
    $sqlbaocaongay = $sqlbaocaongay." order by id DESC limit $vitribatdau,$num";
    $tbbaocaongay = mysqli_query($con,$sqlbaocaongay);
    
?>
<!-- Hết -->
<?php 
    if($tong > 0){
?>
<!-- Hiển thị danh sách tin tức -->
    <div class="col-sm-12 col-md-12 col-lg-12 margin-top-10">
        <table class="table table-condensed table-hover">
            <thead>
                <tr class="danger">
                    <th>TT</th>
                    <th>Tiêu đề</th>
                    <th><div class="text-center">Người nhập</div></th>
                    <th><div class="text-center">Ngày nhập</div></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sothutu = 0;
                    while($rs = mysqli_fetch_array($tbbaocaongay)){$sothutu++;
                    ?>
                    <tr>
                        <td><?php echo $sothutu; ?></td>
                        <td><?php echo $rs["tieude"]; ?></td> 
                        <td align="center"><?php echo $rs["nguoinhap"]; ?></td>
                        <td align="center"><?php echo $rs["ngaynhap"]; ?></td>
                        <td>
                            <a href="index.php?form=<?php echo $form?>&act=edit&id=<?php echo $rs["id"]?>">
                                <img src="img/b_edit.png">
                            </a>
                        </td>
                    </tr>
                    <?php    
                    }
                ?>
            </tbody>
        </table>
    </div>
<!-- Hết -->
<?php
    }else{
?>
    <div class="col-sm-12 col-md-12 col-lg-12 margin-top-10">
        Không có kết quả phù hợp !
    </div>
<?php
    }
?>
<!-- Hiển thị trang -->
<div class="col-sm-12 text-right">
    <ul class="pagination">
        <li>
            <form action = "index.php?form=<?php echo $form?>" method="POST"> 
                <button type="submit"> First 
                    <input type="text" name = "trang" value ="1" hidden="true"> 
                    <input type="text" name = "tieude" value ="<?php echo $tieude;?>" hidden="true"> 
                    <input type="text" name = "nguoinhap" value ="<?php echo $nguoinhap;?>" hidden="true"> 
                    <input type="text" name = "tungay" value ="<?php echo $tungay;?>" hidden="true"> 
                    <input type="text" name = "denngay" value ="<?php echo $denngay;?>" hidden="true"> 
                </button>
            </form>
        </li>
        <?php
        if($sotrang <= 10){$batdau=1;$ketthuc=$sotrang;}
        else {
            if($trang<5){$batdau=1;$ketthuc=10;}
            else if($trang+5 > $sotrang){$batdau=$sotrang-9;$ketthuc=$sotrang;}
            else{$batdau=$trang-4;$ketthuc=$trang+5;}
        }
        for($i=$batdau; $i<=$ketthuc; $i++){?>
            <?php if($trang == $i){echo "<li class='disabled'>";}else{echo "<li>";}?>
                <form action = "index.php?form=<?php echo $form?>" method="POST"> 
                    <button type="submit"> <?php echo $i;?> 
                        <input type="text" name = "trang" value ="<?php echo $i;?>" hidden="true"> 
                        <input type="text" name = "tieude" value ="<?php echo $tieude;?>" hidden="true"> 
                        <input type="text" name = "nguoinhap" value ="<?php echo $nguoinhap;?>" hidden="true"> 
                        <input type="text" name = "tungay" value ="<?php echo $tungay;?>" hidden="true"> 
                        <input type="text" name = "denngay" value ="<?php echo $denngay;?>" hidden="true"> 
                    </button>
                </form>
            </li>
        <?php }?>
        <li>
            <form action = "index.php?form=<?php echo $form ?>" method="POST"> 
                <button type="submit"> End 
                    <input type="text" name = "trang" value ="<?php echo $sotrang;?>" hidden="true"> 
                    <input type="text" name = "tieude" value ="<?php echo $tieude;?>" hidden="true"> 
                    <input type="text" name = "nguoinhap" value ="<?php echo $nguoinhap;?>" hidden="true"> 
                    <input type="text" name = "tungay" value ="<?php echo $tungay;?>" hidden="true"> 
                    <input type="text" name = "denngay" value ="<?php echo $denngay;?>" hidden="true"> 
                </button>
            </form>
        </li>
    </ul>
</div>

