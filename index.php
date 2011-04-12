<html>
<head>
<title>Black Box Bus - demo version</title>

<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />

<style type="text/css">@import "css/global.css";</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src = "map/map.js"></script>
<script>
	$(function (){
		var map = drawSimpleMap();
		xA = 21.024054093266383;
		xB = 105.92943574266053;
		name = "22XY3B";
		drawMap(xA, xB, name);
	});

	function busSelected() {
		/* Get Bus number and time period
			1. Display bus way location
			2. Display bus number info
		*/
		
		//Get input
		busNumber  = $("#bus-number").val();
		timePicker = $("#time-picker").val();
		
		//1.Display bus way location
		url = 'businfo.php?bus_number_plate='+busNumber+'&time_picker='+timePicker;
		$.get(url, function (businfo){
			$("#bus-info").html(businfo);
		});
		
		//Cuong
		xA = 21.024054093266383;
		xB = 105.92943574266053;
		name = "22XY3B";
		// hien toa do diem tren
		
	}
</script>
</head>
<body>
	
	<div id="content">
	<div id="side-bar">
		<div id="bus-picker" class="side-bar-item">
			<div class="side-bar-item-header">
				BUS
			</div>
			<p><label>Chọn xe bus</label></p>
			<select id="bus-number">
				<?php
					include_once dirname ( __FILE__ ) . '/config/include.inc.php';
					/* Get list bus
					*/
					$bus = new Bus();
					$busList = $bus->getBusList();
					foreach ($busList as $busitem) {
						echo "<option value='{$busitem}'>{$busitem}</option>";
					}
				?>
			</select>
			<p><label>Chọn thời gian </label></p>
			<input type="text" id="time-picker" />
			<script type="text/javascript">
				$("#time-picker").datetimepicker();
			</script>
			<input type="button" value="Chọn" onclick="javascript:busSelected()"/>	
		</div>
		
		<div id="bus-info" class="side-bar-item">
			<div class="side-bar-item-header">
				THÔNG TIN XE
			</div>
		</div>
	</div> <!-- End side-bar -->
	
	<div id="map">
	</div>
	</div>
</body>
</html>