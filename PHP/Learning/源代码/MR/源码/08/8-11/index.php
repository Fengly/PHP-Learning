<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>应用strncmp()函数比较字符串的前2个字符是否与源字符串相等</title>
</head>

<body>
<?php
$str1="I like PHP !"; 							//定义字符串常量
$str2="i like my student !";					//定义字符串常量
echo strncmp($str1,$str2,6);  					//比较前两个字符
?>
</body>
</html>
