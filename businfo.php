<?php
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	if (!isset($_GET['bus_number_plate']))
		return;
	$bus_number_plate = $_GET['bus_number_plate'];
	$bus = new Bus($bus_number_plate);
	$busInfo = $bus->getBusInfo();
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<div class="side-bar-item-header">
		THÔNG TIN XE
	</div>
	<h4>Tuyến xe <?php echo $busInfo['bus_number']?></h4>
		<p><?php echo "{$busInfo['bus_start_name']} - {$busInfo['bus_end_name']}"?></p>
		<p><?php echo "{$busInfo['bus_frequency']} phút 1 chuyến"?></p>
		<p><?php echo "{$busInfo['bus_start_time']} - {$busInfo['bus_end_time']}"?></p>
	<h4>Hãng xe <?php echo $busInfo['bus_kind_name']?></h4>
		<p><?php echo "{$busInfo['noSit']} chỗ"?></p>
		
	<!-- Display current location -->
	<?php 
		if (isset($_GET['time_picker'])) {
			$time_picker = $_GET['time_picker'];
			$bus_location = $bus->getBusLocation($time_picker);
		}
	?>
</body>
</html>