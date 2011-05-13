<?php
	// Example URL = http://localhost/blackboxbus/addBus.php?bus_number_plate=30X-7863&black_box_id=BB3411&bus_type=HONDA&license_date=2011-05-25&expiration_date=2011-05-25&warranty_date=2011-05-25&sum_of_km=3021&sim_number=0987678564&driver_code=DC7862
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	$bus_number_plate = $_GET["bus_number_plate"];
	$black_box_id     = $_GET["black_box_id"];
	$bus_type         = $_GET["bus_type"];
	$license_date     = $_GET["license_date"];
	$expiration_date  = $_GET["expiration_date"];
	$warranty_date    = $_GET["warranty_date"];
	$sum_of_km        = $_GET["sum_of_km"];
	$sim_number       = $_GET["sim_number"];
	$driver_code      = $_GET["driver_code"];
	
	echo BUS::addBus($bus_number_plate, $black_box_id, $bus_type, $license_date, $expiration_date, $warranty_date, $sum_of_km, $sim_number, $driver_code);
?>