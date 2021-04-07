<?php
$id = session_id();
$time = time();
$time_check = $time-600; //Ấn định thời gian là 10 phút
$date = date("Y-m-d");
// lay thong tin luot truy cap
$sql_count = "select tong, homnay, homqua, date from count where id = 1";
$tb_count = mysqli_query($con, $sql_count);
$rs_count = mysqli_fetch_array($tb_count);
// kiểm tra thông tin online
$sql = "SELECT 1 FROM online WHERE id ='$id'";
$tb = mysqli_query($con,$sql);
$count = mysqli_num_rows($tb);
if($count=="0"){ //Truy cập lần đầu
    $sql1 = "INSERT INTO online(id,time) VALUES('$id','$time')";
    $tb1=mysqli_query($con,$sql1);
    if($rs_count["date"] != $date){
        mysqli_query($con,"update count set tong = tong +1 , homnay = homnay + 1, homqua = homnay, date = '$date' where id = 1");
    }else{
        mysqli_query($con,"update count set tong = tong +1, homnay = homnay + 1 where id = 1");
    }
}else{ //Truy cập từ lần thứ 2
    $sql2="UPDATE online SET time='$time' WHERE id = '$id'";
    $tb2=mysqli_query($con,$sql2);
}
// lấy thông tin để hiển thị
$sql_count1 = "select tong, homnay, homqua, date from count where id = 1";
$tb_count1 = mysqli_query($con, $sql_count);
$rs_count1 = mysqli_fetch_array($tb_count);
$sql3 = "SELECT * FROM online";
$tb3 = mysqli_query($con,$sql3);
$count_user_online = mysqli_num_rows($tb3);
echo "Số người đang online: $count_user_online";
echo "</br>Truy cập hôm nay: ".$rs_count['homnay'];
echo "</br>Truy cập hôm qua: ".$rs_count['homqua'];
echo "</br>Tổng lượt truy cập: ".$rs_count['tong'];
//Nếu quá 10 phút, xóa bỏ session
$sql4 = "DELETE FROM online WHERE time < $time_check";
$tb4=mysqli_query($con,$sql4);

//Đóng kết nối
mysqli_close($con);
?>