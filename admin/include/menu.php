
<div class="col-sm-2 menu no-padding">
    <ul class="list-group"> 
    <?php 
        foreach ($mangchucnang as $key => $value){
            if($value["trangthai"]==1){
        ?>
            <a class="list-group-item list-group-item-info" href="index.php?form=<?php echo $value["id"]?>"><?php echo $value["tenmenu"]?></a>
        <?
            }
        }
    ?>
    </ul>
</div>
