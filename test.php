<?php
	
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	$businfo = new BusWay(16);
	print_r($businfo->getWayLocation());
?>