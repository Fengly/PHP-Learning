<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>switch语句</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
}
-->
</style></head>
<body>
<div align="center">
<?php
setlocale(LC_TIME,"chs");								//设置本地环境
$weekday = strftime("%A");								//声明变量$weekday的值
switch ($weekday){										//switch语句，判断$weekday的值
	case "星期一":										//如果变量的值为“星期一”
		echo "今天是$weekday ，新的一周开始了！";
		break;
	case "星期二":										//如果变量的值为“星期二”
		echo "今天是$weekday ，时刻保持良好的工作状态!";
		break;
	case "星期三":										//如果变量的值为“星期三”
		echo "今天是$weekday ，劳动者是最美的人，努力工作哟！";
		break;
	case "星期四":										//如果变量的值为“星期四”
		echo "今天是$weekday ，勤奋才能创造绩效，加油！";
		break;
	case "星期五":										//如果变量的值为“星期五”
		echo "今天是$weekday ，一定要出色的完成本周工作哟！";
		break;
	case "星期六":										//如果变量的值为“星期六”
		echo "今天是$weekday ，可以睡到自然醒！";
		break;
	default:											//默认值
		echo "今天是$weekday , 呵呵，轻松的玩上一天！";
		break;
}
?>
</div>
</body>
</html>
