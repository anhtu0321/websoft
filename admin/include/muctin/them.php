
<div class="col-sm-10 col-md-10 col-lg-10">
    
    <form action="include/muctin/xuly.php?form=<?php echo $form?>" method="POST" class="form-inline" role="form">
    
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="tenmuctin" id="" placeholder="Tên Mục tin">
        </div>
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="thutu" placeholder="Thứ tự">
        </div>
        <div class="form-group form-group-sm">
            <select name="trangthai" class="form-control">
                <option value="0">Không sử dụng</option>
                <option value="1" selected="selected">Sử dụng</option>
                <option value="2">Sự kiện</option>
            </select>
        </div>
        <button type="submit" name="them" class="btn btn-primary">Thêm Mục tin</button>
    </form>
    
</div>
