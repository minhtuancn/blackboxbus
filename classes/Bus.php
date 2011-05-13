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
				where bus_number_plate = '{$this->bus_number_plate}'
			";
			$result = $db->runQuery($query);
			$db->close();
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
				
			return $row;
		}
		
		
		
		public function getBusInfoAtTime($time) {
			
			if ($time !=0) {
				$arrTime = explode(" ", $time);
				$date = explode("/", $arrTime[0]);
				$start_minute = $date[2]."-".$date[0]."-".$date[1]." ".$arrTime[1].":00";
				$end_minute = $date[2]."-".$date[0]."-".$date[1]." ".$arrTime[1].":59";
				$time = $date[2]."-".$date[0]."-".$date[1]." ".$arrTime[1];
				
				$query = "
					SELECT 
						bus_location, bus_speed
					FROM
						bus_info as bi
					INNER JOIN
						bus_data as bd on bi.bus_id = bd.bus_id
					WHERE
						bus_number_plate = '{$this->bus_number_plate}'
						and (bus_time_updated = '$time')
					ORDER BY 
						bus_time_updated desc
					LIMIT 1
				";
			}
			else
				
				$query = "
					SELECT 
						bus_location, bus_speed
					FROM
						bus_info as bi
					INNER JOIN
						bus_data as bd on bi.bus_id = bd.bus_id
					WHERE
						bus_number_plate = '{$this->bus_number_plate}'
					ORDER BY 
						bus_time_updated desc
					LIMIT 1						
				";
				
			$db = new DB();
			$result = $db->runQuery($query);
			$db->close();
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
			return $row;
		}
		
		public static function insertData($bus_number_plate, $location, $speed=35, $time) {
			$db = new DB();
			$query = "SELECT bus_id from bus_info where bus_number_plate='{$bus_number_plate}'";
			$result = $db->runQuery($query);
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
			$bus_id =  $row['bus_id'];
			
			$query  = "INSERT into bus_data values (null,'$bus_id','$location','$speed', '$time')";
			$result = $db->runQuery($query); 
		}
		
		public static function insertDatas($bus_number_plate, $data) {
			$db = new DB();
			$query = "SELECT bus_id from bus_info where bus_number_plate='{$bus_number_plate}'";
			$result = $db->runQuery($query);
			$row    = mysql_fetch_assoc($result);
			if ($row == false)
				return 0;
			$bus_id =  $row['bus_id'];
			
			foreach ($data as $dataItem) {
				$query  = "INSERT into bus_data values (null,'$bus_id','$dataItem[0]','$dataItem[1]', '$dataItem[2]')";
				echo $query;
				$result = $db->runQuery($query); 
			}
			
		}
		
		public static function addBus($bus_number_plate, $black_box_id, $bus_type, $license_date, $expiration_date, $warranty_date,$sum_of_km,$sim_number,$driver_code){
			$db = new DB();
			$query = "INSERT INTO `blackboxbus`.`Bus` (`bus_id`, `bus_number_plate`, `black_box_id`, `bus_type`, `license_date`, `expiration_date`, `warranty_date`, `sum_of_km`, `sim_number`, `driver_code`, `bus_status`) VALUES 
			                                          ('', '$bus_number_plate', '$black_box_id', '$bus_type', '$license_date', '$expiration_date', $warranty_date', '$sum_of_km', '$sim_number', '$driver_code', '1')";
			$result = $db->runQuery($query);
			if (!$result)
				return 0;
			return 1;
		}
		
		public static function getBusNumberPlateList() {
			$db = new DB();
			$query  = "SELECT bus_number_plate from Bus";
			$result = $db->runQuery($query);
			$db->close();
			
			while ( $row = mysql_fetch_assoc($result)){
				$arr[] = $row['bus_number_plate'];
			}
			
			return $arr;
		}
		
		public static function getBusList() {
			$db = new DB();
			$query  = "SELECT * from Bus";
			$result = $db->runQuery($query);
			$db->close();
			
			$count = 0;
			while ( $row = mysql_fetch_assoc($result)){
				$arr[$count]['bus_number_plate'] = $row['bus_number_plate'];
				$arr[$count]['black_box_id'] = $row['black_box_id'];
				$arr[$count]['bus_type'] = $row['bus_type'];
				$arr[$count]['license_date'] = $row['license_date'];
				$arr[$count]['expiration_date'] = $row['expiration_date'];
				$arr[$count]['warranty_date'] = $row['warranty_date'];
				$arr[$count]['sum_of_km'] = $row['sum_of_km'];
				$arr[$count]['sim_number'] = $row['sim_number'];
				$arr[$count]['driver_code'] = $row['driver_code'];
				$arr[$count]['bus_status'] = $row['bus_status'];
				$count++;  
			}
			
			return $arr;
		}
	}
?>