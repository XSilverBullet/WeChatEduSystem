<?php
   class QueryCJFirst{
   	
   	function getGrade($object){
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
        	
        	$query = mysql_query("select xh from openid where openid= '$object->FromUserName'");
        	if(!$query){
        		$content = "你尚未绑定用户,请输入学号";
        	}else {
        		$content = "请输入查询的学期  格式为: 2004-1 or 2004-2";
        	}    	
        	$database->closeMysql($database->con);
        	return $content;
   	}       
   	
   }