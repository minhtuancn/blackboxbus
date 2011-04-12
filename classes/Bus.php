<?php
	include_once dirname ( __FILE__ ) . "../../config/include.inc.php";
	class Bus {
		
		private $bus_number_plate;
		
		public function __construct($bus_number_plate) {
			$this->bus_number_plate = $bus_number_plate;
		}
		
		public function getBusNumber() {
			$db     = new DB();
			$query  = "SELECT bus_number from bus_info where  bus_number_plate = '{$this->bus_number_plate}'";
			$result = $db->runQuery($query);
			$db->close();
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
				
			return $row['bus_number'];
		}
		
		public function getBusKind() {
			$db     = new DB();
			$query  = "SELECT bus_kind from bus_info where  bus_number_plate = '{$this->bus_number_plate}'";
			$result = $db->runQuery($query);
			$db->close();
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
				
			return $row['bus_kind'];
		}
		
		public function getBusInfo() {
			$db     = new DB();
			$query  = "
				SELECT 
					bi.bus_number as bus_number, bus_number_plate, kind_name as bus_kind_name, kind_name, noSit, bus_start_name, bus_end_name, bus_frequency, bus_start_time, bus_end_time
				FROM 
					`bus_info` as bi 
				INNER JOIN
					bus_kind as bk on bk.kind_id = bi.bus_kind
				INNER JOIN
					bus_way as bw on bw.bus_number = bi.bus_number
				where bus_number_plate = '53N - 3333'
			";
			$result = $db->runQuery($query);
			$db->close();
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
				
			return $row;
		}
		
		public static function getBusList() {
			$db = new DB();
			$query  = "SELECT bus_number_plate from bus_info";
			$result = $db->runQuery($query);
			$db->close();
			
			while ( $row = mysql_fetch_assoc($result)){
				$arr[] = $row['bus_number_plate'];
			}
			
			return $arr;
		}
		
		public function getBusInfoAtTime($time) {
			$arrTime = explode(" ", $time);
			$date = explode("/", $arrTime[0]);
			$start_minute = $date[2]."-".$date[0]."-".$date[1]." ".$arrTime[1].":00";
			$end_minute = $date[2]."-".$date[0]."-".$date[1]." ".$arrTime[1].":59";
			
			$db = new DB();
			$query = "
				SELECT 
					bus_location, bus_speed
				FROM
					bus_info as bi
				INNER JOIN
					bus_data as bd on bi.bus_id = bd.bus_id
				WHERE
					bus_number_plate = '{$this->bus_number_plate}'
					and ((bus_time_updated >= '$start_minute') and (bus_time_updated <= '$end_minute'))
			";
			
			$result = $db->runQuery($query);
			$db->close();
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
			return $row;
		}
	}
?>