<div class="col-sm-12 col-md-12 col-lg-12">
   <form action="include/phanmem/xuly.php?form=<?php echo $form?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Tên PM</label>
            <div class="col-sm-10">
                <input type="text" name="tieude" class="form-control" placeholder="Tên PM">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Nội dung</label>
            <div class="col-sm-10">
                <Textarea name="noidung" class="form-control" id="noidung"></Textarea>
                <script>
                    CKEDITOR.replace("noidung");
                </script>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">File</label>
            <div class="col-sm-10">
                <input type="file" name="file">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary" name="them">Thêm phần mềm</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href = 'index.php?form=<?php echo $form;?>'">Quay lại</button>
            </div>
        </div>
   </form>
</div>
