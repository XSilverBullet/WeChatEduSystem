<?php 

class QueryGrade{
	
      function getGrade($object,$keyword){
		require 'MysqlConnection.php';
		$content = null;
		$database = new MYSQL();
		$db = $database->getMySqlDB("d0317", $database->getMysqlCon("localhost", "root", "950203"));
		mysql_query("SET NAMES UTF8");
		mysql_query("set character_set_client=utf8");
		mysql_query("set character_set_results=utf8");
		if(!$db){
			die('Could not connect to database:'.mysql_error());
		}
		//echo'1connect database OK<br />';
		
		$sql = "select kcmc,cj from xscjb where xh=(select xh from openid where openid='$object->FromUserName') and xqbs='$keyword'";
		$result = mysql_query($sql);
		if(!$result) $content="error";
		else{
			while($row = mysql_fetch_array($result)){
	        		$content= $content.$row[0]." ".$row[1]."\n";	
	        }
		}
       	return $content;
		$database->closeMysql($database->con);
      }
}
?> 