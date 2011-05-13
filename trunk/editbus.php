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
<script type="text/javascript"><!--<!--<!--
/*
 * Function to delete a Bus in table at row i
 */
	function deleteBus(i)
	{
		var ans = confirm("Bạn có muốn xóa thông tin chiếc xe này ?");
// Delete
	    if (ans == true) {
		document.getElementById('busTable').deleteRow(i); 
		//document.getElementById('busTable').rows.length--;
// Code here
		/*           Tu'          */
       	 }
		}
	/*
	Function to add Value of New Bus To Database
	*/
	
	function addBus(){
		//var row = .parentNode.parentNode.rowIndex ;
		var row = 2;
		var cells = document.getElementById('busTable').rows[row].cells;
		//alert('ok'+cells[4]);
		cells[1].innerHTML = 'FUCK';
		alert('Add to db');
		}
	
	function editCar2(){

			alert('edit Data');
		}

	
	/** 

	* Function to add a Row
	*/
	
	function addRow() {
		
         var table = document.getElementById('busTable');
		
         var rowCount = table.rows.length;
         var row = table.insertRow(rowCount);
			var row2=5;
         var cell1 = row.insertCell(0);
         cell1.innerHTML = rowCount ;

         var cell2 = row.insertCell(1);
         var element2 = document.createElement("input");
         element2.type = "text";
         cell2.appendChild(element2);

         var cell3 = row.insertCell(2);
         var element3 = document.createElement("input");
         element3.type = "text";
         element3.id = 3;
         cell3.appendChild(element3);

         var cell4 = row.insertCell(3);
         var element4 = document.createElement("input");
         element4.type = "text";
         element4.id = 4;
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
         element7.value = "Add";
         cell7.appendChild(element7);
         cell7.setAttribute('onclick','addBus()');
         cell7.setAttribute('value','Add');
      	
      	 //Co the dung cell.setAttribute('','');
      	 // Sau do su dung nhu 1 element bt.
         
     }
	/**
		Function to edit a Bus
		row chinhs la rowIndex,thu tu cua row trong table
		Kich vao la co the sua chua,modify
	*/
		function editBus(row){
			var cells = document.getElementById('busTable').rows[row].cells;
			for(i=0;i<6;i++)
			{
			$(cells[i]).each(function() {
		         $(this).html('<input type="text" value="' + $(this).html() + '" />');
		    });

			}
			$(cells[i]).each(function() {
		         $(this).html('<input type="button" value="Edit" onclick="editCar2()" />');
		    });
		}
</script>
</head>
<body>

	<div id="bus-table" >
	<table cellspacing="0px" cellpadding="0px"style="border-bottom:0px" width='80%' id="busTable">
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
								
								<input type="button" align="left" class="button-edit" onclick ="javascript:editBus(this.parentNode.parentNode.rowIndex)"/>
								<input type="button" align="left" class="button-delete" onclick ="javascript:deleteBus(this.parentNode.parentNode.rowIndex)"/>
										
							</tr>
							
							
					
	
	</table>
	
	<tr><input type="button" onclick="javascript:addRow()" value="Add Row" style="margin-top:20px"/></tr>
	<tr><input type="button" onclick="javascript:addRow()" value="Save" style="margin-top:20px"/></tr>
	</div>
</body>
</html>