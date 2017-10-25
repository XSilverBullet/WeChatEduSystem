<?php
   class UserBound{
   	
   	/* function getOpenId(){
   		$code = $_GET['code'];//获取code
   		$weixin =  file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx9d77b1cf84a76b04&secret=72a980297e2eeec2199a1613ce00362c&code=".$code."&grant_type=authorization_code");//通过code换取网页授权access_token
   		$jsondecode = json_decode($weixin); //对JSON格式的字符串进行编码
   		$array = get_object_vars($jsondecode);//转换成数组
   		$openid = $array['openid'];//输出openid
   		echo  $openid;
   	} */
   	
   	function getUser($object,$keyword){
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

        	$sql = "select xh from xsxh where xh = '$keyword'";
        	$tmp = mysql_query($sql);
         	if( $tmp != false) {
        		$openid = $object->FromUserName;
        		//注意引号的使用，坑
        		$sql = "insert into openid(xh,openid,ismarked) values('$keyword','$openid',1)";	
        		$tmp = mysql_query($sql);
        		if($tmp!=false)
        		    $flag=true ;
        		else{
        			$flag = false;
        		}
        	}else{ 
        		$flag = false;}
        	
        	$database->closeMysql($database->con);
        	return $flag;
        	}

   }