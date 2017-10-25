<?php 

 class MYSQL{
 	
 	public $con;
 	
 	/**
 	 * func: set mysql connection
 	 * @param server user password
 	 * 
 	 * */
	public function setMysqlCon($server,$user,$password){
		$this->con = mysql_connect($server,$user,$password);
		if (!$this->con) {
			die('Could not connect to MySQL: ' . mysql_error());
			$this->con = NUll;
		}
		echo 'Connection OK <br />';
	}
	
	public function getMysqlCon($serverr,$user,$password){
		$this->setMysqlCon($serverr,$user,$password);	
		return $this->con;
	}
	
	/**
	 * func: return database connection
	 * @param database,connection
	 * @return database connection 
	 * */
	public function getMySqlDB($database,$connection){
		$db = mysql_select_db($database,$connection);		
		if(!$db){
			die('Could not connect to database:'.mysql_error());
		}
		echo'connect database OK<br />';
		return $db;
	}
	
	/**
	 * func: close database connection
	 * @param database $con
	 * */
	
	public function closeMysql($con){
		mysql_close($con);
	}
}


/* $a  = new Mysql();
$con = $a->getMysqlCon("localhost", "root", "950203");
$a->getMySqlDB("d0317", $a->con);
$a->closeMysql($a->con); */
?>