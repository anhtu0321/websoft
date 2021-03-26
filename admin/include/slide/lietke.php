<?php 
$sql = "select * from anhslide";
$tbslide = mysqli_query($con, $sql);
?>
<div class="col-sm-10 col-md-10 col-lg-10">
  <table class="table table-condensed table-hover">
    <thead>
      <tr class="danger">
        <th class="td" width="5%">STT</th>
        <th class="td" width="18%">Tên ảnh</th>
        <th class="td" width="18%">Hình ảnh</th>
        <th class="td" width="8%">Thứ tự</th>
        <th class="td" width="7%">Chọn</th>
      </tr>
    </thead>
    <tbody>
  <?php 
  $i=0;
  if($tbslide){
    while($rsslide = mysqli_fetch_array($tbslide)){$i=$i+1; ?>
    
      <tr class="tr">
        <td class="td_duoi"><?php echo $i; ?></td>
        <td class="td_duoi"><?php echo $rsslide["tenanh"];?></td>
        <td class="td_duoi"><img src="../imgslide/<?php echo $rsslide["url"];?>" width="100px" height="100px" /></td>
        <td class="td_duoi"><?php echo $rsslide["thutu"];?></td>    
        <td class="td_duoi"><a href="index.php?form=<?php echo $form?>&act=edit&id=<?php echo $rsslide["id"];?>"><img src="img/b_edit.png"></a></td>
      </tr>
  <?php 
    }
  }else{
  echo "Xảy ra lỗi khi truy vấn dữ liệu";
  } ?>
    </tbody>
  </table>
  </div>