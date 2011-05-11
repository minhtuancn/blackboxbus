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
<script type="text/javascript">
/*
 * Function to delete a car in table at row i
 */
	function deleteCar(i)
	{
		var ans = confirm("Bạn có muốn xóa thông tin chiếc xe này ?");
// Delete
	    if (ans == true) {
		document.getElementById('carTable').deleteRow(i); 
		//document.getElementById('carTable').rows.length--;
// Code here
		/*           Tu'          */
       	 }
		}
	/** 

	* Function to add a Car 
	*/
	
	function addCar() {
		 
         var table = document.getElementById('carTable');

         var rowCount = table.rows.length;
         var row = table.insertRow(rowCount);

         var cell1 = row.insertCell(0);
         cell1.innerHTML = rowCount ;

         var cell2 = row.insertCell(1);
         var element2 = document.createElement("input");
         element2.type = "text";
         cell2.appendChild(element2);

         var cell3 = row.insertCell(2);
         var element3 = document.createElement("input");
         element3.type = "text";
         element3.id ="id3";
         cell3.appendChild(element3);

         var cell4 = row.insertCell(3);
         var element4 = document.createElement("input");
         element4.type = "text";
         cell4.appendChild(element4);

         var cell5 = row.insertCell(4);
         var element5 = document.createElement("input");
         element5.type = "text";
         cell5.appendChild(element5);

         var cell6 = row.insertCell(5);
         var element6 = document.createElement("input");
         element6.type = "text";
         cell6.appendChild(element6);
         
         var cell7 = row.insertCell(6);
         var element7 = document.createElement("input");
         element7.type = "button";
         
         cell7.appendChild(element7);
         
      	
      	 //Co the dung cell.setAttribute('','');
      	 // Sau do su dung nhu 1 element bt.
         
     }
	/*
		Function to edit a car
		row chinhs la rowIndex,thu tu cua row trong table
		Kich vao la co the Edit
	*/
		function editCar(row){
			var cells = document.getElementById('carTable').rows[row].cells;
			for(i=0;i<6;i++)
			{
			$(cells[i]).each(function() {
		         $(this).html('<input type="text" value="' + $(this).html() + '" />');
		    });

			}
			//document.getElementById('carTable').rows[row].cells[0].setAttribute('type','text');
					
			}
</script>
</head>
<body>

	<div id="car" >
	<table cellspacing="0px" cellpadding="0px"style="border-bottom:0px" width='80%' id="carTable">
							<tr bgcolor="#8FBC8F">								
								<td style="border-right:1px solid #00CED1;border-left:1px solid #00CED1;">STT</td>
								<td style="border-right:1px solid #00CED1;">ID hộp đen</td>
								<td style="border-right:1px solid #00CED1;">Sim điện thoại</td>
								<td style="border-right:1px solid #00CED1;">Tên lái xe</td>
								<td style="border-right:1px solid #00CED1;">Ngày xe đăng ký</td>
								<td style="border-right:1px solid #00CED1;">Loại xe</td>
					
								<td style="border-right:1px solid #00CED1;">Tùy chọn</td>
							</tr>	
							
	<!-- Code PHP to get data -->	
				
							<tr height="20">
								<td style="border-right:1px solid #00CED1;border-left:1px solid #00CED1;">1</td>
								<td style="border-right:1px solid #00CED1;">IDàdfdfd</td>
								<td style="border-right:1px solid #00CED1;">45464656</td>
								<td style="border-right:1px solid #00CED1;">Trần Ngọc Cương</td>
								<td style="border-right:1px solid #00CED1;">45454646456</td>
								<td style="border-right:1px solid #00CED1;">Loại xe</td>
								
								<td style="border-right:1px solid #00CED1;">
								
								<input type="button" align="left" class="button-edit" onclick ="javascript:editCar(this.parentNode.parentNode.rowIndex)"/>
								<input type="button" align="left" class="button-delete" onclick ="javascript:deleteCar(this.parentNode.parentNode.rowIndex)"/>
										
							</tr>
							
							
					
	
	</table>
	
	<tr><input type="button" onclick="javascript:addCar()" value="Add Car" style="margin-top:20px"/></tr>
	<tr><input type="button" onclick="javascript:addCar()" value="Submit" style="margin-top:20px"/></tr>
	</div>
</body>
</html>