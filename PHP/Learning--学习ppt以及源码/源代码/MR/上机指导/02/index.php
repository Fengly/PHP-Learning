<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>检测数据类型</title>
</head>

<body>
<?php
$a=true;										//定义变量$a的值
$b="欢迎来到PHP的世界";						//定义变量$b的值
$c=123456;									//定义$c的值
echo "第一个变量是否为整型：".is_int($a)."<br>";	//检测变量$a是否为整型并输出字符串
echo "第二个变量是否为整型：".is_int($b)."<br>";	//检测变量$b是否为整型并输出字符串
echo "第三个变量是否为整型：".is_int($c)."<br>";	//检测变量$c是否为整型并输出字符串
?>

</body>
</html>
