<?php
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	if (!isset($_GET['bus_number_plate']))
		return;
	$bus_number_plate = $_GET['bus_number_plate'];
	$bus = new Bus($bus_number_plate);
	$busInfo = $bus->getBusInfo();

	if (!isset($_GET['time_picker'])) 
		$time_picker = 0;
	else {
		$time_picker = $_GET['time_picker'];
	}
	
	$busInfoAtTime = $bus->getBusInfoAtTime($time_picker);
	$bus_location = explode(";", $busInfoAtTime['bus_location']);
	$bus_speed = $busInfoAtTime['bus_speed'];
	$info = "Biển số: {$busInfo['bus_number_plate']}";
	$info .= "<br>";
	$info .= "Tốc độ: $bus_speed km/h";
	
	echo "$bus_location[0]|$bus_location[1]|$info";
?>