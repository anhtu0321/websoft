
<?php 
   $id = $_GET["id"]; 
?>
<div class="col-sm-12 col-md-12 col-lg-12">
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="danger">
                <th>TT</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ảnh minh họa</th>
                <th><div class="text-center">Nổi bật</div></th>
                <th><div class="text-center">Trạng thái</div></th>
                <th><div class="text-center">Người nhập</div></th>
                <th><div class="text-center">Ngày nhập</div></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($rs = mysql_fetch_array($tbtintuc)){$i++;
                ?>
                <?php
                    if ($id == $rs["id"]){ echo "<tr class='success'>";
                    }else{echo "<tr>";}
                ?>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rs["tieude"]; ?></td>
                    <td><?php echo $rs["noidung"]; ?></td>
                    <td><img src="../imguploads/<?php echo $rs['anh']; ?>" width="100px"></td>
                    <td align="center"><?php echo $rs["noibat"]; ?></td>
                    <td align="center">
                        <?php 
                            if($rs["trangthai"]==1){echo "Hiển thị";};
                            if($rs["trangthai"]==0){echo "Không hiển thị";};
                        ?>
                     </td>
                     <td align="center"><?php echo $rs["nguoinhap"]; ?></td>
                     <td align="center"><?php echo $rs["ngaynhap"]; ?></td>
                    <td>
                        <a href="index.php?form=<?php echo $form?>&act=edit&id=<?php echo $rs["id"]?>">
                            <img src="img/b_edit.png">
                        </a>
                    </td>
                </tr>
                <?    
                }
            ?>
        </tbody>
    </table>
</div>