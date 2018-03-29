<?php
require_once __DIR__ . '/db_config.php';

class DbConnect{
	
	
	private $connect;
	
	
	public function __construct(){
		
		$this->connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
		 
		if (mysqli_connect_errno($this->connect))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();  
		}
	}
	
	public function getDb(){
		
		return $this->connect;
	}
	
}
