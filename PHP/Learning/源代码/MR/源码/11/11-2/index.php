<?php
setcookie("mr", '明日科技', time()+60);    	 		//设置COOKIE有效时间为60秒
if(isset($_COOKIE['mr'])){
	echo "读取Cookie：".$_COOKIE['mr'];					//通过$_COOKIE[]读取COOKIE的值
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
