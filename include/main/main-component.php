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
			}
		?>
    </div>
    <div class="no-padding main-right">
		<?php
			include("include/main/right-top.php");
			include("include/main/right.php");
		?>
    </div>
</div>