<div class="col-sm-4 col-md-4 col-lg-4">
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>TT</th>
                <th>Username</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i=0;
                while($rs = mysql_fetch_array($tbusers)){
                    $i+=1;
                ?>
                <?php
                    if ($id == $rs["id"]){ echo "<tr class='success'>";
                    }else{echo "<tr>";}
                ?>
                    <td><?php echo $i; ?></td>
                    <td><a href="index.php?form=<?php echo $form;?>&id=<?php echo $rs["id"];?>"><?php echo $rs["username"]; ?></a></td>
                    <td>
                        <a href="index.php?form=<?php echo $form?>&act=edit&id=<?php echo $value["id"]?>">
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
<div class="col-sm-8 col-md-8 col-lg-8">
    <?php 
    $id = $_GET["id"];
    if ($id !=""){
    ?>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Tên chức năng</th>
                <th><div class="text-center">Xem</div></th>
                <th><div class="text-center">Thêm</div></th>
                <th><div class="text-center">Sửa</div></th>
                <th><div class="text-center">Xóa</div></th>
                <th><div class="text-center">Full</div></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($mangchucnang as $key => $value){
                $sql = "select * from phanquyen where user = '$id' and form = '$value[id]'";
                $tb = mysql_query($sql); $rs = mysql_fetch_array($tb);
            ?>
            <tr>
                <td>
                    <?php echo $value["tenmenu"];?>
                </td>
                <td align="center">
                <?php if($rs["xem"] == 1){ ?>
                    <input type="checkbox" class="check<?php echo $key?>" name="xem" checked="checked">
                <?php }else{ ?>
                    <input type="checkbox" class="check<?php echo $key?>" name="xem" >
                <?php } ?>
                </td>
                <td align="center">
                <?php if($rs["them"] == 1){ ?>
                    <input type="checkbox" class="check<?php echo $key?>" name="them" checked="checked">
                <?php }else{ ?>
                    <input type="checkbox" class="check<?php echo $key?>" name="them" >
                <?php } ?>
                </td>
                <td align="center">
                <?php if($rs["sua"] == 1){ ?>
                    <input type="checkbox" class="check<?php echo $key?>" name="sua" checked="checked">
                <?php }else{ ?>
                    <input type="checkbox" class="check<?php echo $key?>" name="sua" >
                <?php } ?>
                </td>
                <td align="center">
                <?php if($rs["xoa"] == 1){ ?>
                    <input type="checkbox" class="check<?php echo $key?>" name="xoa" checked="checked">
                <?php }else{ ?>
                    <input type="checkbox" class="check<?php echo $key?>" name="xoa" >
                <?php } ?>
                </td>
                <td align="center"><input type="checkbox" class="check<?php echo $key?>" onclick = "check(this);" name="xoa" ></td>      
            </tr>
            <?

            }
            ?>
            
        </tbody>
    </table>
    <?php } ?>
</div>
<script>
function check(obj){
    var classs = obj.className;
    
    var elements = document.getElementsByClassName(classs);
    if(obj.checked == true){
        for( var i = 0; i< elements.length -1; i++){
            elements[i].checked = true;
        }
    }else{
        for( var i = 0; i< elements.length -1; i++){
            elements[i].checked = false;
        }
    }
    
}
</script>