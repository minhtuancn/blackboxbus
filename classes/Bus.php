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
			$query  = "SELECT bus_kind 
				from bus_info 
				where  bus_number_plate = '{$this->bus_number_plate}'
			";
			$result = $db->runQuery($query);
			$db->close();
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
				
			return $row['bus_kind'];
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
	}
?>