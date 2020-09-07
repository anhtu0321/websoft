<form class="form-horizontal">
    <div class="form-group form-group-sm margin-bottom-5">
        <div class="col-sm-12 margin-bottom-5 margin-left-5">
            <?php
                echo "<span style = 'font-weight: normal'>Welcome</span> <span class='user'>".$_SESSION["user_huye_full_name"]."</span><br>";
            ?>
        </div>
        <div class="col-sm-12 margin-bottom-5 margin-left-5 no-bold">
            <a href="index.php?view=bcn">Xem báo cáo ngày</a>
        </div>
        
        <div class="col-sm-12 margin-bottom-5 margin-left-5 no-bold">    
            <a href="thoat.php">Thoát</a>
        </div>
        
        <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Đổi mật khẩu</a>
        <div class="modal fade" id="modal-id">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Đổi mật khẩu</h4>
                    </div>
                    <div class="modal-body">    
                        <form action="xldmk.php" method="POST" role="form" enctyp="multipart/form-data">
                            <div class="form-group">
                                <label for=""> Mật khẩu cũ</label>
                                <input type="text" class="form-control" name="oldpass">
                            </div>
                            <div class="form-group">
                                <label for=""> Mật khẩu mới</label>
                                <input type="text" class="form-control" name="newpass">
                            </div>
                            <div class="form-group margin-left-5">
                                <label for=""> Nhập lại mật khẩu mới</label>
                                <input type="text" class="form-control" name="renewpass">
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                        
                        
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
</form>
