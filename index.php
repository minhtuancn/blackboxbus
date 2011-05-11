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
	$(function (){		
		var map = drawSimpleMap();
	});

	count = 0;
	
	function busSelected() {
		/* Get Bus number and time period
			1. Display bus way location
			2. Display bus number info
		*/
		
		//Get input
		busNumber  = $("#bus-number").val();
		timePicker = $("#time-picker").val();
		
		//1.Display bus location
		url = 'buslocation.php?bus_number_plate='+busNumber+'&time_picker='+timePicker;
		
		$.get(url, function (buslocation){
			/*TODO HERE
			*/
			$("#map").html("");
			var map = drawSimpleMap();
			buslocation = buslocation.split("|");
			drawMap(map,buslocation[0],buslocation[1],buslocation[2]);
		});
		
		url = 'businfo.php?bus_number_plate='+busNumber+'&time_picker='+timePicker;
		$.get(url, function (businfo){
			$("#bus-info").html(businfo);
		});
		
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
				<p><label>Chọn thời gian </label></p>
				<input type="text" name="time-picker" id="time-picker" value="<?php if (isset($_POST['time-picker'])) echo $_POST['time-picker'];?>" />
				<script type="text/javascript">
					$("#time-picker").datetimepicker({showSecond: true,
						timeFormat: 'hh:mm:ss'});
				</script>
				<input type="submit" value="Chọn" name='submit'/>
			</form>	
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
	<?php 
		if (isset($_POST['submit']))
			echo "
				<script>
					busSelected();
				</script>
			";
	?>
</body>
</html>