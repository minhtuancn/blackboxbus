<?php
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	if (!isset($_GET['bus_number']))
		return;
	$bus_number = $_GET['bus_number'];
	$bus = new Bus($bus_number);
?>

<html>
	<div class="side-bar-item-header">
		THÔNG TIN XE
	</div>
	<h4>Tuyến xe </h4>
</html>