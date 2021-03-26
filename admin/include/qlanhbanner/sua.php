<?php
$id = $_GET["id"];
$sql = "select * from anhbanner where idAnh = $id";
$tb = mysqli_query($connect,$sql);
$rs = mysqli_fetch_array($tb);

 ?>
<form action="include/qlanhbanner/xuly.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
<table class="table" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" class="tieude">THÊM ẢNH</td>
  </tr>
  <tr>
    <td class="tieudenho" width="25%">Tên ảnh</td>
    <td width="75%"><input type="text" name="tenAnh" size="30" value="<?php echo $rs["tenAnh"]?>"></td>
  </tr>
  <tr>
    <td class="tieudenho">Hình ảnh</td>
    <td><input type="file" name="url" value="<?php echo $rs["url"]?>"></td>
  </tr>
  <td class="tieudenho">Thứ tự</td>
    <td><input type="text" name="thuTu" size="5" value="<?php echo $rs["thuTu"]?>"></td>
    <tr>
  	<td align="center">&nbsp;</td>
    <td ><input type="submit" class="submit" name="sua" value="Sửa"> <input type="submit" class="submit" name="xoa" value="Xóa"></td> 
  </tr>
</table>
</form>
