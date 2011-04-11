<?php

if (file_exists(dirname(__FILE__).'/../config/settings.inc.php'))
	include_once(dirname(__FILE__).'/../config/settings.inc.php');
	
class DB {
	
	protected  $_server,$_user,$_password,$_type,$_database,$_conn;
	
	public function __construct()	{
		$this->_server = _DB_SERVER_;
		$this->_user = _DB_USER_;
		$this->_password = _DB_PASSWD_;
		$this->_type = _DB_TYPE_;
		$this->_database = _DB_NAME_;
		$this->connect();
	}
	
	public function connect(){
		$this->_conn = mysql_connect($this->_server,$this->_user,$this->_password);
		if (!$this->_conn){
			echo "Unable to connect DB".mysql_error();
			exit;
		}
		
		if (!mysql_select_db($this->_database)){
    		echo "Unable to select mydbname: " . mysql_error();
    		exit;
		}
		
	}
	
	public function close(){
		mysql_close($this->_conn);
	}
	
	public function runQuery($query){
		$result = mysql_query($query);
		if (!$result){
			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    		exit;
		}
		return $result;
	}
}