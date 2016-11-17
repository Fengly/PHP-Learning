<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>截取中文字符串</title>
</head>

<body>
<?php 
$str="PHP自学视频教程";				//定义字符串变量
echo mb_substr($str,0,5,"UTF-8");	//截取5个字节，返回编码格式为UTF8
?>
</body>
</html>
