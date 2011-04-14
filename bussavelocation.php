<?php
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	$bus_number_plate = $_POST['bus_number_plate'];
	$data = $_POST['data'];
	$data = explode("|", $data);
	$n = count($data);
	print_r($data);
	for ($i=0 ; $i<$n; $i++){
		$item = explode("^", $data[$i]);
		$dataProccessed[$i][2] = $item[0];
		$dataProccessed[$i][1] = 30.5;
		$ni = strlen($item[1]);
		$item[1] = substr($item[1], 0,--$ni);
		$item[1] = substr($item[1], 1,--$ni);
		$item[1] = str_replace(",", ";", $item[1]);
		//echo $item[1];
		$dataProccessed[$i][0] = $item[1];
	}
	
	Bus::insertDatas($bus_number_plate, $dataProccessed);
?>