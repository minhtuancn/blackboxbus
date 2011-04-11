<?php
	
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	$businfo = new BusInfo('12a24');
	print_r($businfo->getInfo());
?>