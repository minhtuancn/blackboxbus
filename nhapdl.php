<html>
<head>
<title>Black Box Bus - Demo Version</title>

<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />

<style type="text/css">@import "css/global.css";</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src = "map/map.js"></script>
<script>
 var test;
	$(function (){		
		 test = drawMapWithClick();
		
	});

	count = 0;
	
	function busSelected() {
		/* Get Bus number and time period
			1. Display bus way location
			2. Display bus number info
		*/
		
		//Get input
		busNumber  = $("#bus-number").val();
		data = $("#bus-location-picker").val();
		$.post("bussavelocation.php", {bus_number_plate: busNumber, data: data}, function (data2){
			alert("Done");
			location.href = "nhapdl.php";
		});
		
	}

	function clearMen() {
		location.href = "nhapdl.php";
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
			<form method="post">
				<select id="bus-number" name='bus-number'>
					<?php
						include_once dirname ( __FILE__ ) . '/config/include.inc.php';
						/* Get list bus
						*/
						$bus = new Bus();
						$busList = $bus->getBusList();
						foreach ($busList as $busitem) {
							if ($busitem == $_POST['bus-number'])
								echo "<option selected='selected' value='{$busitem}'>{$busitem}</option>";
							else
								echo "<option value='{$busitem}'>{$busitem}</option>";
						}
					?>
				</select>
				<input type="button" value="Lưu" onclick="javascript:busSelected()" />
			</form>	
		</div>
		
		<div id="bus-info" class="side-bar-item">
			<div class="side-bar-item-header">
				MAP
			</div>
			<p><label>Toạ độ hiện tại xe</label></p>
			<form>
				<textarea id="bus-location-picker" ></textarea>
				<input type="button" value ="clear" onclick="javascript:clearMen()" />
			</form>
		</div>
	</div> <!-- End side-bar -->
	
	<div id="map">
	</div>
	</div>
</body>
</html>