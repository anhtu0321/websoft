<?php
if(isset($_GET["id"])){$id = $_GET["id"];}else{$id="";}
$sql = "select tenmuctin, thutu, trangthai from muctin where id = '$id'";
$tb = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($tb);
?>
<div class="col-sm-12 col-md-12 col-lg-12">
    
    <form action="include/muctin/xuly.php?form=<?php echo $form?>&id=<?php echo $id;?>" method="POST" class="form-inline" role="form">
    
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="tenmuctin" value="<?php echo $rs["tenmuctin"]?>" placeholder="Tên Menu">
        </div>
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="thutu" value="<?php echo $rs["thutu"]?>" placeholder="Thứ tự">
        </div>
        <div class="form-group form-group-sm">
            <select name="trangthai" class="form-control">
                    <option value="0" <?php if($rs['trangthai']==0){echo 'selected="selected"';}?>>Không sử dụng</option>
                    <option value="1" <?php if($rs['trangthai']==1){echo 'selected="selected"';}?>>Sử dụng</option>
                    <option value="2" <?php if($rs['trangthai']==2){echo 'selected="selected"';}?>>Sự kiện</option>
            </select>
        </div>
        <button type="submit" name="sua" class="btn btn-primary">Sửa Mục tin</button>
        <button type="submit" name="xoa" class="btn btn-primary" onclick="return confirm('Muốn xóa thật à?');">Xóa Mục tin</button>
    </form>
    
</div>