<?php
	// Example url = "blackbox.php?bus_number_plate=30X-6832&speed=40&location=21.031254428565443;105.84921623544312&cooler=0&engine=1&km=231&gas=23&door=1
	
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	
	$bus_number_plate = $_GET["bus_number_plate"];
	$speed = $_GET["speed"];
	$location = $_GET["location"];
	$cooler = $_GET["cooler"];
	$engine = $_GET["engine"];
	$cooler_temp = $_GET["cooler_temp"];
	$km   = $_GET["km"];
	$gas  = $_GET["gas"];
	$door = $_GET["door"];
	
	echo BlackBox::addData($bus_number_plate, $speed, $location, $cooler, $engine, $cooler_temp, $km, $gas, $door);
?>