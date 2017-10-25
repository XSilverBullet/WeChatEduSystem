<?php 

	
     
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
		echo'1connect database OK<br />';
		
		$xh = '0017305001';
		$result = mysql_query("select xh,xm from xsxh where xh = $xh",$database->con);
		echo "查询成功";
		/* if($result != null) {
			$result = mysql_query("insert into openid(xh,openID,Ismarked) values(0017305001,2,1)");
			echo "success";
			if($result !=null) {
				$content = "用户绑定成功";
			}
		}else {
			$content = "不存在此用户";
		}  */
while($row = mysql_fetch_array($result)){
        		$content= $content.$row[0].$row[1];
        		
        		
        	}	
		
		//$content = "sucess";
        	echo $content;
		$database->closeMysql($database->con);
		
?> 