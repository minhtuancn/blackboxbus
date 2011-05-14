<html>
<head>
<title>Black Box Bus - Version 1.0</title>

<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script src="js/js.js"></script>

<script src="js/JSCal/src/js/jscal2.js"></script>
<script src="js/JSCal/src/js/lang/en.js"></script>
<link rel="stylesheet" type="text/css" href="js/JSCal/src/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="js/JSCal/src/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="js/JSCal/src/css/steel/steel.css" />

<script src="js/toChecklist/jquery.toChecklist.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/toChecklist/jquery.toChecklist.min.css" />

<style type="text/css">@import "css/global.css";</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src = "map/map.js"></script>

<script>

	var map = 2 ;

	function createMap(){
		map = drawSimpleMap();
	}

	$(document).ready(function () {
		RANGE_CAL_1 = new Calendar({
		    inputField: "time-picker-start",
		    dateFormat: "%Y-%m-%d %H:%M:%S",
		    trigger: "f_rangeStart_trigger",
		    bottomBar: false,
		    showTime   : 24,
		    onSelect: function() {
		            var date = Calendar.intToDate(this.selection.get());
		            this.hide();
		    }
		});

		RANGE_CAL_2 = new Calendar({
		    inputField: "time-picker-end",
		    dateFormat: "%Y-%m-%d %H:%M:%S",
		    trigger: "f_rangeEnd_trigger",
		    bottomBar: false,
		    showTime   : 24,
		    onSelect: function() {
		            var date = Calendar.intToDate(this.selection.get());
		            this.hide();
		    }
		});

		
		createMap();
		
		$('#bus-number').toChecklist({
			addSearchBox            : true,
			required                : true
		});
	
	});

	count = 0;
	
	function busSelected() {
		/* Get Bus number and time period
			1. Display bus way location
			2. Display bus number info
		*/

		//Get input
		map.clearOverlays();
		busNumber  = $("#bus-number").checklistValue();
		timePickerStart = $("#time-picker-start").val();
		timePickerEnd   = $("#time-picker-end").val();
		busCount = 0;
		for (iBus=0; iBus<busNumber.length; iBus++){
			//1.Display bus location
			url = 'buslocation.php?bus_number_plate='+busNumber[iBus]+'&time_picker_start='+timePickerStart+'&time_picker_end='+timePickerEnd;
			
			$.get(url, function (buslocation){
				buslocation = buslocation.split("<br>") ;
				numOfPoint = buslocation.length - 1;
				listPoint = new Array();
				for (i=0; i<numOfPoint; i++){
					temp = buslocation[i].split(";");
					listPoint[i] = new GLatLng(temp[0],temp[1]);
				}
				drawLineWithMarker(map, listPoint, iBus);
			});
		}
		
		
		
//		url = 'businfo.php?bus_number_plate='+busNumber+'&time_picker='+timePickerStart;
//		$.get(url, function (businfo){
//			$("#bus-info").html(businfo);
//		});
		
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
				<p><label>Chọn thời gian </label></p>
				<input type="text" name="time-picker-start" id="time-picker-start" class="time-picker"/>
				<button type="button" id="f_rangeStart_trigger" >...</button>
				<br>
				<input type="text" name="time-picker-end" id="time-picker-end" class="time-picker"/>				
				<button type="button" id="f_rangeEnd_trigger" >...</button>
				
				<p><label>Chọn Xe</label></p>
				<form method="post">
				<select id="bus-number" name='bus-number' multiple="multiple">
					<?php
						include_once dirname ( __FILE__ ) . '/config/include.inc.php';
						/* Get list bus
						*/
						$bus = new Bus();
						$busList = $bus->getBusNumberPlateList();
						foreach ($busList as $busitem) {
							if ($busitem == $_POST['bus-number'])
								echo "<option selected='selected' value='{$busitem}'>{$busitem}</option>";
							else
								echo "<option value='{$busitem}'>{$busitem}</option>";
						}
					?>
				</select>
				<br>
				<input type="button" value="Chọn" name='submit' id='submit' onclick="javascript:busSelected()"/>
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
	</div> <!-- End content -->
</body>
</html>