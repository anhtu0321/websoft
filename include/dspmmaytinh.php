<?php
        $id = $_GET["id"];
        $trang = $_POST["trang"]; if($trang == ""){$trang = 1;}

        // Tính tổng số bản ghi
        $sql = "select count(id) as tong from phanmem" ;
        $tbtong = mysql_query($sql);
        $rstong = mysql_fetch_array($tbtong);
        $tong = $rstong["tong"];
        // Các thông số để phân trang
        $num = 20;
        $sotrang = ceil($tong/$num);
        $vitribatdau = ($trang-1)*$num;
        // lấy cơ sở dữ liệu
        $sql = "select id,tieude,file from phanmem order by id DESC limit $vitribatdau,$num";
        $tb = mysql_query($sql);
    ?>
        <div class="col-sm-12 muctin no-padding chi-tiet-tin">
            <div class="col-sm-12 no-padding">
                <p class="tdmuctin"><a href="index.php?view=pmmt"><span class="glyphicon glyphicon-th">   </span> PHẦN MỀM MÁY TÍNH</a></p>
            <?php 
                $i=0;
                while($rs = mysql_fetch_array($tb)){ $i+=1;
            ?>
                    <div class = "col-sm-12 margin-bottom-5">
                        <div class ="col-sm-12 no-padding">
                            <p class="tieude">
                                <a href="pmuploads/<?php echo $rs['file'];?>">
                                     - <?php echo $rs['tieude'];?>
                                </a>
                            </p>
                        </div>
                    </div>
            <?php
                }
            ?>
            </div>
        </div>
        <?php 
            $trang = $_POST["trang"]; if($trang == ""){$trang = 1;}
        ?>

        <!-- Hiển thị trang -->
        <div class="col-sm-12 text-right">
            <ul class="pagination">
                <li>
                    <form action = "index.php?view=bcn" method="POST"> 
                        <button type="submit"> First 
                            <input type="text" name = "trang" value ="1" hidden="true">  
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
                        <form action = "index.php?view=bcn" method="POST"> 
                            <button type="submit"> <? echo $i;?> 
                                <input type="text" name = "trang" value ="<? echo $i;?>" hidden="true">  
                            </button>
                        </form>
                    </li>
                <? }?>
                <li>
                    <form action = "index.php?view=bcn" method="POST"> 
                        <button type="submit"> End 
                            <input type="text" name = "trang" value ="<? echo $sotrang;?>" hidden="true"> 
                        </button>
                    </form>
                </li>
            </ul>
        </div>
