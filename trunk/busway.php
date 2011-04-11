<?php
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	if (!isset($_GET['bus_number']))
		return;
	$bus_number = $_GET['bus_number'];
	$busway     = new BusWay($bus_number);
	$buswayLocation = $busway->getWayLocation();
	echo $buswayLocation;
?>