<?php
	include_once dirname ( __FILE__ ) . "../../config/include.inc.php";
	class BlackBox {
		
		private $bus_number_plate;
		
		public function __construct($bus_number_plate) {
			$this->bus_number_plate = $bus_number_plate;
		}
		
		public static function addData($bus_number_plate, $speed, $location, $cooler, $engine, $cooler_temp, $km, $gas, $door){
			$time_updated = date("Y-m-d H:i");
		
			$db = new DB();
			$query = "INSERT INTO `blackboxbus`.`Data` (`data_id`, `bus_number_plate`, `speed`, `location`, `cooler`, `engine`, `cooler_temp`, `km`, `gas`, `door`, `time_updated`) VALUES 
			                                           (NULL, '$bus_number_plate', '$speed', '$location', '$cooler', '$engine', '$cooler_temp', '$km', '$gas', '$door', '$time_updated');";
			$result = $db->runQuery($query);
			//echo $query;
			if (!$result)
				return 0;
				
			return 1;
		}
		
		public function getLocation($startTime, $endTime){
			$db = new DB();
			$query = "SELECT location FROM Data where (time_updated >='$startTime') and (time_updated<='$endTime') and (bus_number_plate = '$this->bus_number_plate')";
			//echo $query;
			$result = $db->runQuery($query);
			while ( $row = mysql_fetch_assoc($result)){
				$arr[] = $row['location'];
			}
			return $arr;
		}
		
		public function getData($startTime, $endTime){
			$db = new DB();
			$query = "SELECT * FROM Data where (time_updated >='$startTime') and (time_updated<='$endTime') and (bus_number_plate = '$this->bus_number_plate')";
			//echo $query;
			$result = $db->runQuery($query);
			$count = 0;
			while ( $row = mysql_fetch_assoc($result)){
				$arr[$count]['speed']       = $row['speed'];
				$arr[$count]['location']    = $row['location'];
				$arr[$count]['cooler']      = $row['cooler'];
				$arr[$count]['engine']      = $row['engine'];
				$arr[$count]['cooler_temp'] = $row['cooler_temp'];
				$arr[$count]['km']          = $row['km'];
				$arr[$count]['gas']         = $row['gas'];
				$arr[$count]['door']        = $row['door'];
				$arr[$count]['time_updated'] = $row['time_updated'];
				$count++;
			}
			return $arr;
		}
	}
	
?>