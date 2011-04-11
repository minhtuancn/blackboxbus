<?php
	include_once dirname ( __FILE__ ) . "../../config/include.inc.php";
	class BusInfo{
		private $bus_number_plate;
		
		public function __construct($bus_number_plate) {
			$this->bus_number_plate = $bus_number_plate;
		}
		
		public function getInfo() {
			$db     = new DB();
			$query  = "SELECT * from bus_info where bus_number_plate = '{$this->bus_number_plate}'";
			$result = $db->runQuery($query);
			$db->close();
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
			return $row;
		}
	}
?>
	