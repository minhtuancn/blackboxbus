<?php
	include_once dirname ( __FILE__ ) . "../../config/include.inc.php";
	class BusWay {
		private $bus_number;
		
		public function __construct($bus_number) {
			$this->bus_number = $bus_number;
		}
		
		public function getWayLocation() {
			$db     = new DB();
			$query  = "SELECT bus_way_location from bus_way where  bus_number = '{$this->bus_number}'";
			$result = $db->runQuery($query);
			$db->close();
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
				
			return $row['bus_way_location'];
		}
	}
?>