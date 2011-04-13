/**
 * Functions for Draw Map
 */
  document.write("<script type='text/javascript' src='http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA4M3L_03UW0D2V9Tea15TthSQckJgczrWPGQt5orZABR_V_fHMRRlJMhVMTTNrUUyNstxlIjmfQ3pPg&sensor=false'></scr"+"ipt>");
   /**
    * Function for draw a simple Map
    */
    function drawSimpleMap() {
        if (GBrowserIsCompatible()) {
          var map = new GMap2(document.getElementById("map"));
          map.setCenter(new GLatLng(21.0063,105.8429), 15);
          map.setUIToDefault();
          return map;
        }
      }
    /** 
	Function return a Line
    */
    function getLine1(a,b,c,d){
    	var aline = new GPolyline([
    	   new GLatLng(a, b),
           new GLatLng(c, d)
    ], "#FF0000", 3);
   	return aline;
    }
    /** 
	Function return a Line
    */
    function getLine(a,b){
    	var aline = new GPolyline([
    	a,b
    ], "#FF0000", 3);
   	return aline;
    }
    /**
     * Function for create a marker
     * 
     */
    function createMarker(lat,long,info) {
      	 var point = new GLatLng(lat,long);
      // Create our  marker icon
     	/*var Icon = new GIcon();
     	Icon.image = "http://chart.apis.google.com/chart?chst=d_map_pin_icon&chld=cafe|996600";
     	Icon.iconSize = new GSize(40, 53);
     	Icon.shadowSize = new GSize(37, 53);
     	Icon.iconAnchor = new GPoint(9, 53);
     	Icon.infoWindowAnchor = new GPoint(9, 2);
     	// Set up our GMarkerOptions object literal
      	markerOptions = { icon:Icon };
      	var marker = new GMarker(point, markerOptions);*/
     	var marker = new GMarker(point);
      	//var infoPoint = ""+info;
    	//marker.openInfoWindowHtml(infoPoint);
       
        return marker;
     	}
    /**
     * Function for draw Map with marker and line
     * lat,long : toa do tai thoi gian chon
     * info : Thong tin bus tai thoi gian chon
     */
    function drawMap(map,lat,long,info) {
    	
    	if (lat == 0)
    		return;
    	var marker = createMarker(lat,long,info);
    	var point = new GLatLng(lat,long);
    	map.openInfoWindowHtml(point,info);
    	map.addOverlay(marker);
    	
    
    }
    /**
     * Show Map with Click event to show array Points
     */
    function drawMapWithClick(){
    
    
    	 if (GBrowserIsCompatible()) {
             var map = new GMap2(document.getElementById("map"));
             map.setCenter(new GLatLng(21.0063,105.8429), 15);
             map.setUIToDefault();
            var i=0;
            var count = 0;
           
           }
    	 GEvent.addListener(map,"click", function(overlay, latlng) {     
    		  if (latlng) { 
    			
    		    var myHtml = "The Point value is: " + latlng;
    		    map.openInfoWindow(latlng, myHtml);
    		    // Set Time
    		    var time = getTime();
    		    i++;
    		    count++;
    		    // Set text to Text-area
    		   var text = $("#bus-location-picker").text();
    		   if(text=="")$("#bus-location-picker").text(time+"^"+latlng);
    		   		else $("#bus-location-picker").text(text+'|'+time+"^"+latlng);
    		   // Set marker
    		   map.addOverlay(new GMarker(latlng));
    		   // Get lat,lng
    		   lat = latlng.lat();
    		   lng = latlng.lng();
    		   // Draw Line
    		   if(count>1)
    			   {
    			   aline = getLine1(tmplat,tmplng,lat,lng);
    			   map.addOverlay(aline);
    			   }
    		   tmplat = lat;
    		   tmplng = lng;
    		   
    		  }
    	});
  }
    /**
     * Draw Line of bus
     * arrPoint : array of points
    
     */
    function drawLine(map,arrPoint) {
    	var i = 0;
    	while(i<arrayPoint.length-1){
    		
			aline = getLine(arrayPoint[i],arrayPoint[i+1]);
			i=i+1;
			map.addOverlay(aline);
           }
    	
    	
    
    }
    /**
     * Return current Time with Format ex:  2011-04-12 07:08:08
     * @returns
     */
    function getTime(){
    	var date = new Date();
    	var year = date.getFullYear();
    	var month = date.getMonth()+1;
    	var day = date.getDate();
    	var hour = date.getHours();
    	var min = date.getMinutes();
    	var second = date.getSeconds();
    	var time = year+"-"+month+"-"+day+" "+hour+":"+min+":"+second;
    	return time;
    }
    
    
    
