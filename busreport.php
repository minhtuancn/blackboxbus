<?php
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	$bus_number_plate = $_GET['bus_number_plate'];
	$time_picker_start = $_GET['time_picker_start'];
	$time_picker_end = $_GET['time_picker_end'];
	
	echo "Báo cáo cho xe mang biển số $bus_number_plate <br>";
	$blackbox = new BlackBox($bus_number_plate);
	$data = $blackbox->getData($time_picker_start, $time_picker_end);
	
	//print_r($data);
	// Tong km
	$n = count($data);
	$sumOfKm = $data[$n-1]["km"] - $data[0]["km"];
	echo "Tổng km vận hành:$sumOfKm km<br>";
	
	// List van toc
	echo "Các vận tốc:";
	$gas = 0;
	$sumOfGas = 0;
	$sumOfSpeed = 0;
	foreach ($data as $dataItem){
		printf("%.2f ",$dataItem['speed']);
		$sumOfSpeed += $dataItem['speed'];
		if ($sumOfGas <= $dataItem['gas'])
			$sumOfGas = $dataItem['gas'];
		else 
			$gas = $sumOfGas - $dataItem['gas'];
	}
	
	// Tong nhien lieu
	echo "<br>Tổng nhiên liệu:$gas<br>";
	
	// Toc do trung binh
	$speedavg = $sumOfSpeed / $n;
	printf("Tốc độ trung bình: %.2f km/h<br>",$speedavg);
	
	// Nhiên liệu tiêu thụ trung bình
	$gasavg = $gas / $sumOfKm;
	printf("Nhiên liệu tiêu thụ trung bình: %.2f l/km <br>",$gasavg);
	
	// Toa do da qua
	echo "Các tọa độ đã qua:<br>";
	foreach ($data as $dataItem){
		echo $dataItem['location']."<br>";
	}
	echo "<br><br>";
?>