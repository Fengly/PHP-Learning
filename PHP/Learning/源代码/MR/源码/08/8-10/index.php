<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>应用strnatcmp()函数按自然排序法进行字符串的比较</title>
</head>

<body>
<?php 
$str1="str2.jpg";								//定义字符串常量
$str2="str10.jpg";								//定义字符串常量
$str3="mrbook1";								//定义字符串常量
$str4="MRBOOK2";								//定义字符串常量
echo strcmp($str1,$str2);     					//按字节进行比较，返回1
echo strcmp($str3,$str4);     					//按字节进行比较，返回1
echo strnatcmp($str1,$str2);  					//按自然排序法进行比较，返回-1
echo strnatcmp($str3,$str4);  					//按自然排序法进行比较，返回1
?>
</body>
</html>
