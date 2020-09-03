<form class="form-horizontal">
    <div class="form-group form-group-sm margin-bottom-5">
        <div class="col-sm-12 margin-bottom-5 margin-left-5">
            <?php
                echo "Welcome ".$_SESSION["user_huye_full_name"]."<br>";
            ?>
        </div>
        <div class="col-sm-12 margin-bottom-5 margin-left-5">
            <a href="index.php?view=bcn">Xem báo cáo ngày</a>
        </div>
        <div class="col-sm-12 margin-bottom-5 margin-left-5">
            <a href="#">Đổi mật khẩu</a>
        </div>
        <div class="col-sm-12 margin-bottom-5 margin-left-5">    
            <a href="thoat.php">Thoát</a>
        </div>
    </div>
</form>
