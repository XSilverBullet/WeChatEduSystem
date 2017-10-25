<?php 

class QueryQueue{
	
      function getQueue($object){
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
		
		$sql = "select `必修课总学分`,`必修课学分成绩和`,`本专业选修总学分`,`本专业选修学分成绩和`,`必修课有未通过课程`,`必修课有未通过课程`,
		`总分`,`排名` from `学生成绩总排名` where xh=(select xh from openid where openid='$object->FromUserName')";
		$result = mysql_query($sql);
		if(!$result) $content="error";
		else{
			while($row = mysql_fetch_array($result)){
	        		$content= "必修课总学分 ".$row[0]."\n".
				        		"必修课学分成绩和 ".$row[1]."\n".
				        		"本专业选修总学分 ".$row[2]."\n".
				        		"本专业选修学分成绩和 ".$row[3]."\n".
				        		"必修课有未通过课程".$row[4]."\n".
				        		"总分".$row[5]."\n".
				        		"排名".$row[6]."\n";
			}
		}
       	return $content;
		$database->closeMysql($database->con);
      }
}
?> 