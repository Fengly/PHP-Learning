<?php
setcookie("mr",'明日科技');
setcookie("mr", '明日科技', time()+60);    	 		 //设置COOKIE有效时间为60秒
//设置有效时间为60秒，有效目录为“/12.1/”，有效域名为“mrbccd.cn”及其所有子域名
setcookie("mr", "明日科技", time()+60, "/12.1/",". mrbccd.cn", 1);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
