<?php
   class UserUnbound{
   	
   	
   	function UnBoundUser($object){
		    require 'MysqlConnection.php';
        	$content = null;
        	$flag=null;
        	$database = new MYSQL();
        	$db = $database->getMySqlDB("d0317", $database->getMysqlCon("localhost", "root", "950203"));
        	mysql_query("SET NAMES UTF8");
        	mysql_query("set character_set_client=utf8");
        	mysql_query("set character_set_results=utf8");
        	if(!$db){
        		die('Could not connect to database:'.mysql_error());
        	}
        	echo'connect database OK';
        	$openId = $object->FromUserName;
        	$resultTmp = mysql_query("delete from openid where openid = '$openId'");
        	if($resultTmp != false){
        		return true;
        	}else return false;
        	
        	$database->closeMysql($database->con);
   	}       
   	
   }