<?php
	if(isset($_GET["view"])){$view = $_GET["view"];}else{$view="";}
	
?>
<div class="row">
    <div class="module-left main-left">
		<?php 
			switch ($view) {
				case "chitiet":
					include("include/chitiettin.php");
					break;
				case "muctin":
					include("include/muctin.php");
					break;
				case "bcn":
					include("include/dsbaocaongay.php");
					break;
				case "chitietbcn":
					include("include/chitietbcn.php");
					break;
				case "pmmt":
					include("include/dspmmaytinh.php");
					break;
				case "chitietpmmt":
					include("include/chitietpmmt.php");
					break;
				default:
					include("include/main/center-left.php");
					include("include/main/center-right.php");
					include("include/main/khauhieu.php");
					include("include/main/box-tin.php");
				
			}
		
		?>
    </div>
    <div class="no-padding main-right">
		<?php
			include("include/main/right.php");
		?>
    </div>
</div>
