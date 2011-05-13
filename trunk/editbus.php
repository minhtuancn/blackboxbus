<html>
<head>
<title>Black Box Bus - Add,Delete,Edit Info a Bus</title>

<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />

<style type="text/css">@import "css/global.css";</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src = "map/map.js"></script>
<script type="text/javascript"><!--
/*
 * Function to delete a Bus in table at row i
 */
	function deleteBus(row)
	{
		var ans = confirm("Bạn có muốn xóa thông tin chiếc xe này ?");
// Delete
	    if (ans == true) {
	   	cells =  document.getElementById('busTable').rows[row].cells;
	    bus_number_plate = cells[1].innerHTML;
	   
		document.getElementById('busTable').deleteRow(row); 
		url = "delbus.php?bus_number_plate="+bus_number_plate;
		$.get(url,function(result){
				if(result==1)alert("Delete Success");
				else alert("Delete Fail");
			})
			
		//document.getElementById('busTable').rows.length--;
// Code here
		
       	 }
		}
	/*
	Function to add Value of New Bus To Database
	*/
	
	function addBus(row){
		
		var cells = document.getElementById('busTable').rows[row].cells;
		
		//Get Value 
		bus_number_plate = document.getElementById(row+'-'+2).value;
		black_box_id = document.getElementById(row+'-'+3).value;
		bus_type = document.getElementById(row+'-'+4).value;
		license_date = document.getElementById(row+'-'+5).value;
		expiration_date = document.getElementById(row+'-'+6).value;
		warranty_date = document.getElementById(row+'-'+7).value;
		sum_of_km = document.getElementById(row+'-'+8).value;
		sim_number = document.getElementById(row+'-'+9).value;
		driver_code = document.getElementById(row+'-'+10).value;
	
//  Add to DB

		url = "addBus.php?bus_number_plate="+bus_number_plate+"&black_box_id="+black_box_id+"&bus_type="+bus_type+"&license_date="+license_date+"&expiration_date="+expiration_date+"&warranty_date="+warranty_date+"&sum_of_km="+sum_of_km+"&sim_number="+sim_number+"&driver_code="+driver_code;

		
		$.get(url, function (result){
			//alert(result);
			if (result == 1){
				alert("Success");} 
			else
				alert("Fail");
		});
		cells[1].innerHTML = bus_number_plate;
		cells[2].innerHTML = black_box_id;
		cells[3].innerHTML = bus_type;
		cells[4].innerHTML = license_date;
		cells[5].innerHTML = expiration_date;
		cells[6].innerHTML = warranty_date;
		cells[7].innerHTML = sum_of_km;
		cells[8].innerHTML = sim_number;
		cells[9].innerHTML = driver_code;
		
		document.getElementById('busTable').rows[row].deleteCell(12); 
	
		}
	
	
	/** 

	* Function to add a Row
	*/
	
	function addRow() {
		
         var table = document.getElementById('busTable');
		
         var rowCount = table.rows.length;
         var row = table.insertRow(rowCount);
		 var cell1 = row.insertCell(0);
         cell1.innerHTML = rowCount ;

         var cell2 = row.insertCell(1);
         var element2 = document.createElement("input");
         element2.type = "text";
         element2.id = rowCount+'-2';
         cell2.appendChild(element2);
			
         var cell3 = row.insertCell(2);
         var element3 = document.createElement("input");
         element3.type = "text";
         element3.id = rowCount+'-3';
         cell3.appendChild(element3);

         var cell4 = row.insertCell(3);
         var element4 = document.createElement("input");
         element4.type = "text";
         element4.id = rowCount+'-4';
         cell4.appendChild(element4);

         var cell5 = row.insertCell(4);
         var element5 = document.createElement("input");
         element5.id = rowCount+'-5';
         element5.type = "text";
         cell5.appendChild(element5);

         var cell6 = row.insertCell(5);
         var element6 = document.createElement("input");
         element6.id = rowCount+'-6';
         element6.type = "text";
         cell6.appendChild(element6);

         var cell7 = row.insertCell(6);
         var element7 = document.createElement("input");
         element7.id = rowCount+'-7';
         element7.type = "text";
         cell7.appendChild(element7);

         var cell8 = row.insertCell(7);
         var element8 = document.createElement("input");
         element8.id = rowCount+'-8';
         element8.type = "text";
         cell8.appendChild(element8);

         var cell9 = row.insertCell(8);
         var element9 = document.createElement("input");
         element9.id = rowCount+'-9';
         element9.type = "text";
         cell9.appendChild(element9);

         var cell10 = row.insertCell(9);
         var element10 = document.createElement("input");
         element10.id = rowCount+'-10';
         element10.type = "text";
         cell10.appendChild(element10);

        
//
         var cell11 = row.insertCell(10);
        // var element12 = document.createElement("input");
        // element12.type = "button";
        // cell12.appendChild(element12);
         cell11.setAttribute('type','button');
       	 cell11.setAttribute('class','button-edit');
       	 cell11.setAttribute('onclick','editBus('+rowCount+')');

         var cell12 = row.insertCell(11);
         //var element13 = document.createElement("input");
        // element13.type = "button";
        // cell13.appendChild(element13);
         cell12.setAttribute('type','button');
         cell12.setAttribute('class','button-delete');
         cell12.setAttribute('onclick','deleteBus('+rowCount+')');
         
         var cell13 = row.insertCell(12);
         var element13 = document.createElement("input");
         element13.type = "button";
         element13.value = "Add";
         cell13.appendChild(element13);
         cell13.setAttribute('onclick','addBus('+rowCount+')');
         cell13.setAttribute('value','Add');
         //var i = rowCount+'-1';
        // alert('ok'+document.getElementById(i).type);
      	
      	 //Co the dung cell.setAttribute('','');
      	 // Sau do su dung nhu 1 element bt.
         
     }
    function addBus1(){
		alert('OK');
        }
	/**
		Function to edit a Bus
		row chinhs la rowIndex,thu tu cua row trong table
		Kich vao la co the sua chua,modify
	*/
		function editBus(row){
			var cells = document.getElementById('busTable').rows[row].cells;
			for(i=0;i<10;i++)
			{
				j=i+1;
			$(cells[i]).each(function() {
		         $(this).html('<input type="text" value="' + $(this).html() + '" id = "'+row+'+'+j+'" />');
		    });

			}
			// Delete old buttons
			document.getElementById('busTable').rows[row].deleteCell(10);
			document.getElementById('busTable').rows[row].deleteCell(10);
			// Add Another Edit button
			 var cell11 = document.getElementById('busTable').rows[row].insertCell(10);
			 var element11 = document.createElement("input");
	         element11.type = "button";
	         element11.value = "OK";
	         cell11.appendChild(element11);
	         cell11.setAttribute('onclick','editBus2('+row+')');
		     // Add Another Delete button
			var cell12 = document.getElementById('busTable').rows[row].insertCell(11);
			cell12.setAttribute('type','button');
	        cell12.setAttribute('class','button-delete');
	        cell12.setAttribute('onclick','deleteBus('+row+')');	
			//$(cells[i]).each(function() {
		      //   $(this).html('<input type="button" value="OK" onclick="editBus2('+row+')" />');
		    //});
		}
		/*
			Function to Update Db
		*/
		function editBus2(row){
			
		
				//Get Value 
				bus_stt = document.getElementById(row+'+'+1).value;
				bus_number_plate = document.getElementById(row+'+'+2).value;
				black_box_id = document.getElementById(row+'+'+3).value;
				bus_type = document.getElementById(row+'+'+4).value;
				license_date = document.getElementById(row+'+'+5).value;
				expiration_date = document.getElementById(row+'+'+6).value;
				warranty_date = document.getElementById(row+'+'+7).value;
				sum_of_km = document.getElementById(row+'+'+8).value;
				
				sim_number = document.getElementById(row+'+'+9).value;
				driver_code = document.getElementById(row+'+'+10).value;
				//
				{
					var table = document.getElementById('busTable');
					var cells = table.rows[row].cells;
					cells[0].innerHTML = bus_stt;
					cells[1].innerHTML = bus_number_plate;
					cells[2].innerHTML = black_box_id;
					cells[3].innerHTML = bus_type;
					cells[4].innerHTML = license_date;
					cells[5].innerHTML = expiration_date;
					cells[6].innerHTML = warranty_date;
					cells[7].innerHTML = sum_of_km;
					cells[8].innerHTML = sim_number;
					cells[9].innerHTML = driver_code;
				
					//Delte Edit and Delete Button
					document.getElementById('busTable').rows[row].deleteCell(10); 
					document.getElementById('busTable').rows[row].deleteCell(10);
					// Add Another Edit button
					var cell11 = table.rows[row].insertCell(10);
					cell11.setAttribute('type','button');
			        cell11.setAttribute('class','button-edit');
			        cell11.setAttribute('onclick','editBus('+row+')');	
				     // Add Another Delete button
					var cell12 = table.rows[row].insertCell(11);
					cell12.setAttribute('type','button');
			        cell12.setAttribute('class','button-delete');
			        cell12.setAttribute('onclick','deleteBus('+row+')');	
					}
				
				// Add to Db
				url = "updateBus.php?bus_number_plate="+bus_number_plate+"&black_box_id="+black_box_id+"&bus_type="+bus_type+"&license_date="+license_date+"&expiration_date="+expiration_date+"&warranty_date="+warranty_date+"&sum_of_km="+sum_of_km+"&sim_number="+sim_number+"&driver_code="+driver_code;
				
				$.get(url, function (result){
					//alert(result);
					if (result == 1){
						alert("Update Success");} 
					else
						alert("Update Fail");
				});
				
			}

		
--></script>
</head>
<body>

	<div id="bus-table" >
	<table cellspacing="0px" cellpadding="0px"style="border-bottom:0px" width='80%' id="busTable">
							<tr bgcolor="#8FBC8F">								
								<td width="10px"style="border-right:1px solid #00CED1;border-left:1px solid #00CED1; weight:10px" >STT</td>
								
								<td style="border-right:1px solid #00CED1;">Biển số </td>
								<td style="border-right:1px solid #00CED1;">ID Hộp đen</td>
								<td style="border-right:1px solid #00CED1;">Loại xe</td>
								
								<td style="border-right:1px solid #00CED1;">Ngày đăng ký</td>
								<td style="border-right:1px solid #00CED1;">Hạn sử dụng</td>
								<td style="border-right:1px solid #00CED1;">Hạn bảo hành</td>
								<td style="border-right:1px solid #00CED1;">Tổng số Km</td>
								<td style="border-right:1px solid #00CED1;">Mã SIM</td>
								<td style="border-right:1px solid #00CED1;">Mã lái xe</td>
								
								<td style="border-right:1px solid #00CED1;">Sửa</td>
								<td style="border-right:1px solid #00CED1;">Xóa</td>
							</tr>	
							
	<!-- Code PHP to get data -->	
	<?php
	include_once dirname ( __FILE__ ) . '/config/include.inc.php';
	
	$arrayBus = BUS::getBusList();
	$count = 1;
	foreach ($arrayBus as $bus){?>
				
							<tr height="20">
								<td style="border-right:1px solid #00CED1;border-left:1px solid #00CED1;"><?php echo $count++;?></td>
								
								<td style="border-right:1px solid #00CED1;"><?php echo $bus["bus_number_plate"]?> </td>
								<td style="border-right:1px solid #00CED1;"><?php echo $bus["black_box_id"]?></td>
								<td style="border-right:1px solid #00CED1;"><?php echo $bus["bus_type"]?></td>
								
								<td style="border-right:1px solid #00CED1;"><?php echo $bus["license_date"]?></td>
								<td style="border-right:1px solid #00CED1;"><?php echo $bus["expiration_date"]?></td>
								<td style="border-right:1px solid #00CED1;"><?php echo $bus["warranty_date"]?></td>
								<td style="border-right:1px solid #00CED1;"><?php echo $bus["sum_of_km"]?></td>
								<td style="border-right:1px solid #00CED1;"><?php echo $bus["sim_number"]?></td>
								<td style="border-right:1px solid #00CED1;"><?php echo $bus["driver_code"]?></td>
								
							
								
								<td>
								<input type="button" align="left" class="button-edit" onclick ="javascript:editBus(this.parentNode.parentNode.rowIndex)"/></td>
								<td style="border-right:1px solid #00CED1;">
								<input type="button" align="left" class="button-delete" onclick ="javascript:deleteBus(this.parentNode.parentNode.rowIndex)"/></td>
										
							</tr>
		<?php 
			}
		?>					
							
					
	
	</table>
	
	<tr><input type="button" onclick="javascript:addRow()" value="Add Row" style="margin-top:20px"/></tr>
	<tr><input type="button" onclick="javascript:addRow()" value="Save" style="margin-top:20px"/></tr>
	</div>
</body>
</html>