<?php
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	$arrayBus = BUS::getBusList();
	foreach ($arrayBus as $bus){
		foreach($bus as $busItem){
			echo $busItem."|";
		}
		echo "<br>";
	}
?>