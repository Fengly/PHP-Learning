<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>对字符串中的部分字符串进行替换</title>
</head>

<body>
<?php
$str="用今日的辛勤工作，换明日的双倍回报！";				//定义字符串变量
$replace="百倍";										//定义要替换的字符串
echo substr_replace($str,$replace,26,4);   			//替换字符串
?>
</body>
</html>
