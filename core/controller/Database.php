<?php

class Database
{
	public static $db;
	public static $con;

	function Database(){
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="hotel-calidad";
	} 

	

	function connect(){

		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb,3306);


		$con->query("set sql_mode=''");
		return $con;
	}
	function connect1(){
		$db = new PDO("mysql:host=$this->host;",$this->user,$this->pass);
		$db->exec("use `$this->ddbb`");
		return $db;	
	} 


	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}

	
}

?>
