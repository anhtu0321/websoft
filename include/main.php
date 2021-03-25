<?php
	if(isset($_GET["view"])){$view = $_GET["view"];}else{$view="";}
	if($view!=""){
		include('include/main/main-component.php');
	}else{
		include('include/main/main-home.php');
	}
?>