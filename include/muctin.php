<?php
    $id = $_GET["id"];
    $trang = $_POST["trang"]; if($trang == ""){$trang = 1;}

    // Tính tổng số bản ghi
    $sql = "select count(id) as tong from tintuc where muctin = '$id'" ;
    if ($muctin != ""){$sql = $sql." and muctin ='$id'"; }
    $tbtong = mysql_query($sql);
    $rstong = mysql_fetch_array($tbtong);
    $tong = $rstong["tong"];
    // Các thông số để phân trang
    $num = 10;
    $sotrang = ceil($tong/$num);
    $vitribatdau = ($trang-1)*$num;
    // lấy cơ sở dữ liệu
    $sql = "select id,tieude,noidung,anh,ngaynhap from tintuc where muctin = '$id' order by id DESC limit $vitribatdau,$num";
    $tb = mysql_query($sql);
    $sqlmt = "select id,tenmuctin from muctin where id = '$id' ";
    $tbmt = mysql_query($sqlmt);
    $rsmt = mysql_fetch_array($tbmt);
?>
<div class="col-sm-12 muctin no-padding chi-tiet-tin">
    <div class="col-sm-12 no-padding">
        <p class="tdmuctin"><a href="index.php?view=muctin&id=<?php echo $rsmt["id"];?>"><span class="glyphicon glyphicon-th"></span> <?php echo $rsmt["tenmuctin"];?></a></p>
    <?php 
        $i=0;
        while($rs = mysql_fetch_array($tb)){ $i+=1;
    ?>
            <div class = "col-sm-12 margin-bottom-5">

                <div class="col-sm-3 hinhanh no-padding">
                    <img src = "imguploads/<?php echo $rs['anh'] ?>" width="100%"/>
                </div>
                <div class ="col-sm-9">
                    <p class="tieude"><a href="index.php?view=chitiet&id=<?php echo $rs['id'];?>"><?php echo $rs['tieude']?></a></p>
                    <p class="tomtat">
                        <?php 
                            $tomtat = substr($rs["noidung"], 0, 300);
                            $arr_noidung = explode(' ', $tomtat);
                            array_pop($arr_noidung);
                            $intomtat = "";
                            foreach($arr_noidung as $value){
                                $intomtat = $intomtat." ".$value;
                            }
                            $intomtat = $intomtat."...";
                            echo $intomtat;
                        ?>
                    </p> 
                    <p class="ngaydang"><span class = "glyphicon glyphicon-time"></span> <?php echo $rs['ngaynhap']?></p>
                </div>
            </div>
    <?php
        }
    ?>
    </div>
</div>
<?php 
    $muctin = $_POST["muctin"];
    $trang = $_POST["trang"]; if($trang == ""){$trang = 1;}
?>

<!-- Hiển thị trang -->
<div class="col-sm-12 text-right">
    <ul class="pagination">
        <li>
            <form action = "index.php?view=muctin&id=<?php echo $id ?>" method="POST"> 
                <button type="submit"> First 
                    <input type="text" name = "trang" value ="1" hidden="true"> 
                    <input type="text" name = "muctin" value ="<?php echo $muctin; ?>" hidden="true">  
                </button>
            </form>
        </li>
        <?
        if($sotrang <= 10){$batdau=1;$ketthuc=$sotrang;}
        else {
            if($trang<5){$batdau=1;$ketthuc=10;}
            else if($trang+5 > $sotrang){$batdau=$sotrang-9;$ketthuc=$sotrang;}
            else{$batdau=$trang-4;$ketthuc=$trang+5;}
        }
        for($i=$batdau; $i<=$ketthuc; $i++){?>
            <? if($trang == $i){echo "<li class='disabled'>";}else{echo "<li>";}?>
                <form action = "index.php?view=muctin&id=<?php echo $id ?>" method="POST"> 
                    <button type="submit"> <? echo $i;?> 
                        <input type="text" name = "trang" value ="<? echo $i;?>" hidden="true"> 
                        <input type="text" name = "muctin" value ="<?php echo $muctin;?>" hidden="true"> 
                    </button>
                </form>
            </li>
        <? }?>
        <li>
            <form action = "index.php?view=muctin&id=<?php echo $id ?>" method="POST"> 
                <button type="submit"> End 
                    <input type="text" name = "trang" value ="<? echo $sotrang;?>" hidden="true"> 
                    <input type="text" name = "muctin" value ="<?php echo $muctin;?>" hidden="true"> 
                </button>
            </form>
        </li>
    </ul>
</div>