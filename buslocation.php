<?php
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	$bus_number_plate = $_GET['bus_number_plate'];
	$time_picker_start = $_GET['time_picker_start'];
	$time_picker_end = $_GET['time_picker_end'];
	
	$blackbox = new BlackBox($bus_number_plate);
	$arrayPoints = $blackbox->getLocation($time_picker_start, $time_picker_end);
	foreach ($arrayPoints as $arrayPoint){
		echo $arrayPoint;
		echo "<br>";
	}
?>