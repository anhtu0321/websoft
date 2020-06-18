<?php
$id = $_GET["id"];
$sql = "select muctin, tieude, noidung, anh, noibat, trangthai from tintuc where id = '$id'";
$tb = mysql_query($sql);
$rs = mysql_fetch_array($tb);
?>
<div class="col-sm-12 col-md-12 col-lg-12">
    <form action="include/tintuc/xuly.php?form=<?php echo $form?>&id=<?php echo $id?>&filename=<?php echo $rs["anh"]?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Tiêu đề</label>
            <div class="col-sm-10">
                <input type="text" name="tieude" value="<?php echo $rs["tieude"];?>" class="form-control" placeholder="Tiêu đề">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Nội dung</label>
            <div class="col-sm-10">
                <Textarea name="noidung" class="form-control" id="noidung"><?php echo $rs["noidung"];?></Textarea>
                <script>
                    CKEDITOR.replace("noidung");
                </script>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Ảnh minh họa</label>
            <div class="col-sm-10">
                <label for="file" style="cursor:pointer; width:20%"><img src="../imguploads/<?php echo $rs["anh"];?>" width="100%" id="img"></label>
                <input type="file" id="file" name="anh" style="display:none" onchange="return fileValidation()">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-push-2">
                <div class="checkbox">
                    <label>
                        <?php
                        if($rs["noibat"]==1){
                        ?>
                            <input type="checkbox" name="noibat" checked = "checked" value="1">Tin nổi bật
                        <?php
                        }else{
                        ?>
                            <input type="checkbox" name="noibat" value="1">Tin nổi bật
                        <?php    
                        }
                        ?>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Trạng thái</label>
            <div class="col-sm-10">
                <select name="trangthai" class="form-control">
                    <?php
                        if($rs["trangthai"] == 1){
                        ?>
                            <option value="0">Không hiển thị</option>
                            <option value="1" selected = "selected">Hiển thị</option>
                        <?php
                        }else{
                        ?>
                            <option value="0" selected = "selected">Không hiển thị</option>
                            <option value="1">Hiển thị</option>
                        <?php    
                        }
                        ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Mục tin</label>
            <div class="col-sm-10">
                <select name="muctin" class="form-control">
                    <option value="">--- Chọn Mục tin ---</option>
                    <?php 
                    while($rsmuctin = mysql_fetch_array($tbmuctin)){
                        if($rs["muctin"] == $rsmuctin["id"]){
                    ?>
                            <option value="<?php echo $rsmuctin['id']?>" selected="selected"><?php echo $rsmuctin['tenmuctin']?></option>
                    <?php
                        }else{
                    ?>
                            <option value="<?php echo $rsmuctin['id']?>"><?php echo $rsmuctin['tenmuctin']?></option>
                    <?
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary" name="sua">Sửa tin tức</button>
                <button type="submit" class="btn btn-primary" name="xoa" onclick="return confirm('Muốn xóa thật à ?');">Xóa tin tức</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href = 'index.php?form=<?php echo $form;?>'">Quay lại</button>
            </div>
        </div>
    </form>
</div>
<script>
    function fileValidation(){
        var fileInput = document.getElementById('file');
        var filePath = fileInput.value;//lấy giá trị input theo id
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
        //Kiểm tra định dạng
        if(!allowedExtensions.exec(filePath)){
            alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
            fileInput.value = '';
            return false;
        }else{
        //Image preview
            if (fileInput.files && fileInput.files[0]) {
                var url = URL.createObjectURL(fileInput.files[0]);
                var i = document.getElementById('img').src = url;
            }
        }
    }
</script>