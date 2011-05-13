<?php
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	$bus_number_plate = $_GET["bus_number_plate"];
	echo BUS::delBus($bus_number_plate);
?>