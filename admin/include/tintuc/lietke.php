
<?php 
   $id = $_GET["id"]; 
?>
<div class="col-sm-10 col-md-10 col-lg-10">
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="danger">
                <th>TT</th>
                <th>Tên Mục tin</th>
                <th>Thứ tự</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "select id, tenmuctin, thutu, trangthai from muctin order by thutu asc";
                $tb_muctin = mysql_query($sql);
                while($rs = mysql_fetch_array($tb_muctin)){
                ?>
                <?php
                    if ($id == $rs["id"]){ echo "<tr class='success'>";
                    }else{echo "<tr>";}
                ?>
                    <td><?php echo ($key+1); ?></td>
                    <td><?php echo $rs["tenmuctin"]; ?></td>
                    <td><?php echo $rs["thutu"]; ?></td>
                    <td>
                        <?php 
                            if($rs["trangthai"]==1){echo "Sử dụng";};
                            if($rs["trangthai"]==0){echo "Không Sử dụng";};
                        ?>
                     </td>
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
