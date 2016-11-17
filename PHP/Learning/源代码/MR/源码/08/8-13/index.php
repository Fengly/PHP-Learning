<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>应用strstr()函数获取指定字符串在字符串中首次出现的位置后的所有字符</title>
</head>

<body>
<?php
$str="PHP自学教程、JavaWeb自学教程、Java自学教程、VB自学教程";//定义字符串
echo substr_count($str,"自学教程");						//输出检索的结果
?>
</body>
</html>
