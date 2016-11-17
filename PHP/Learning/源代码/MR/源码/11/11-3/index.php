<?php
date_default_timezone_set("Asia/Hong_Kong");//设置时区
if(!isset($_COOKIE["visit_time"])){					//检测Cookie文件是否存在，如果不存在
 	setcookie("visit_time",date("Y-m-d H:i:s"),time()+60); 		//设置带失效时间的Cookie变量
	echo "欢迎您第一次访问网站！";						//输出字符串
echo "<br>";										//输出回车符
}else{												//如果Cookie存在
	setcookie("visit_time",date("Y-m-d H:i:s"),time()+60);//设置带失效时间的Cookie变量
     echo "您上次访问网站的时间为：".$_COOKIE["visit_time"];	//输出上次访问网站的时间
	echo "<br>";											//输出回车符
}
	echo "您本次访问网站的时间为： ".date("Y-m-d H:i:s");		//输出当前的访问时间
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />