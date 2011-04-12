/**
 * Functions for Draw Map
 */
  document.write("<script type='text/javascript' src='http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAlXwQNVL6R0pjorvSTlfROxQIQxe5chJeZhZqejn_r7buVBDGjRSz6zaBPOulfaC4XueARN6r_AmC6A&sensor=true_or_false'></scr"+"ipt>");
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
    function getLine(a,b,c,d){
    	var aline = new GPolyline([
    	   new GLatLng(a, b),
           new GLatLng(c, d)
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
     	var Icon = new GIcon();
     	Icon.image = "http://chart.apis.google.com/chart?chst=d_map_pin_icon&chld=cafe|996600";
     	Icon.iconSize = new GSize(40, 53);
     	Icon.shadowSize = new GSize(37, 53);
     	Icon.iconAnchor = new GPoint(9, 53);
     	Icon.infoWindowAnchor = new GPoint(9, 2);
     	// Set up our GMarkerOptions object literal
      	markerOptions = { icon:Icon };
      	var marker = new GMarker(point, markerOptions);
      	var infoPoint = ""+info;
    	marker.openInfoWindowHtml(infoPoint);
       
        return marker;
     	}
    /**
     * Function for draw Map with marker and line
     * lat,long : toa do tai thoi gian chon
     * info : Thong tin bus tai thoi gian chon
     */
    function drawMap(lat,long,info) {
    	//draw simple Map
    	if (GBrowserIsCompatible()) {
            var map = new GMap2(document.getElementById("map"));
            map.setCenter(new GLatLng(21.0063,105.8429), 13);
            map.setUIToDefault();
          }
    	//Data for Test
    	 var arrayPoint = new Array(new Array(21.0073,105.8400),new Array(21.0083,105.8300),new Array(21.0093,105.8320));
    	//Draw Line
    	var i = 0;
    	while(i<arrayPoint.length-1){
    		
			aline = getLine(arrayPoint[i][0],arrayPoint[i][1],arrayPoint[i+1][0],arrayPoint[i+1][1]);
			i=i+1;
			map.addOverlay(aline);
           }
    	//Make marker
    	var marker = createMarker(lat,long,info);
    	map.addOverlay(marker);
    	
    
    }
    
    
