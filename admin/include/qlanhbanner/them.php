<form action="include/qlanhbanner/xuly.php" method="post" enctype="multipart/form-data">
<table class="table" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" class="tieude">THÊM ẢNH</td>
  </tr>
  <tr>
    <td class="tieudenho" width="25%">Tên ảnh</td>
    <td width="75%"><input type="text" name="tenAnh" size="25"></td>
  </tr>
  <tr>
    <td class="tieudenho" width="25%">Đường dẫn</td>
    <td width="75%"><input type="file" name="url"></td>
  </tr>
  <tr>
    <td class="tieudenho">Thứ tự</td>
    <td><input type="text" name="thuTu" size="5"></td>
  </tr>
  <tr>
     <td align="center">&nbsp;</td>
    <td>
 <?php
 if($_SESSION["user_qlsg_level"]<=2){
 ?>   
    <input type="submit" class="submit" name="them" value="Thêm" />
<?php }else{?>  
	<input type="submit" class="submit" name="them" value="Thêm" disabled="disabled" />
<?php }?>  
    </td>
  </tr>
</table>
</form>