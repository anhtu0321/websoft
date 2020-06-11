<?php 
$muctin = $_POST["muctin"];
$nguoinhap = $_POST["nguoinhap"];
$tungay = $_POST["tungay"];
$denngay = $_POST["denngay"];
?>
<div class="col-sm-12 col-md-12 col-lg-12">
    <button class="btn btn-primary btn-sm" onclick = "window.location.href='index.php?form=<?php echo $form;?>&act=add'">Thêm mới tin tức</button>
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
    Danh sách tin
    <form action="index.php?form=<?php echo $form?>" method="POST" class="form-inline" role="form">
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
                    while($rs = mysql_fetch_array($tbmuctin)){
                    ?>
                        <option value="<?php echo $rs['id']?>"><?php echo $rs['tenmuctin']?></option>
                    <?
                    }
                    ?>
                </select>
        </div>
        <div class="form-group">
            Từ ngày: 
                <input type="date" name = "tungay" style="width:140px;">
        </div>
        <div class="form-group">
            Đến ngày: 
                <input type="date" name = "denngay" style="width:140px;">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Xem</button>
    </form>
    
</div>
