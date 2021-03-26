<?php
  if(isset($_GET["id"])){$id = $_GET["id"];}else{$id="";}
  $sql = "select * from anhslide where id = $id";
  $tb = mysqli_query($con,$sql);
  $rs = mysqli_fetch_array($tb);
?>

<div class="col-sm-10 col-md-10 col-lg-10">
    <form action="include/slide/xuly.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Tên ảnh</label>
            <div class="col-sm-10">
                <input type="text" name="tenanh" class="form-control" value="<?php echo $rs["tenanh"]?>">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Hình ảnh</label>
            <div class="col-sm-10">
				<label for="file1" style="cursor:pointer; width:20%"><img src="../imgslide/<?php echo $rs["url"];?>" width="100%" id="img"></label>
                <input type="file" id="file1" name="url" style="display:none" onchange="return fileValidation()">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Thứ tự</label>
            <div class="col-sm-10">
                <input type="text" name="thutu" class="form-control" value="<?php echo $rs["thutu"]?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary" name="sua">Sửa hình ảnh</button>
            </div>
        </div>
    </form>
</div>
<script>
    function fileValidation(){
        var fileInput = document.getElementById('file1');
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
