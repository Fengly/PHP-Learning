<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>应用number_format()函数对指定的数字字符串进行格式化</title>
</head>
<body>
<?php 
$number = 3665.256; 								//定义数字字符串常量
echo number_format($number);						//输出1个参数格式化后的数字字符串
echo "<br>";										//执行换行
echo number_format($number, 2);						//输出2个参数格式化后的数字字符串
echo "<br>";										//执行换行
$number2 = 123456.7890;								//定义数字字符串常量
echo number_format($number2, 2, '.', '.');			//输出4个参数格式化后的数字字符串
?>
</body>
</html>
