<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>去除右边空白字符或特殊字符</title>
</head>

<body>
<?php
$str="  (:@_@  相逢也只是在梦中！  @_@:)   ";
$strs="  (:*_*  相逢也只是在梦中！  *_*:)   ";
echo $str."<br>";		//输出原始字符串
echo rtrim($str)."<br>"; //去除字符串右边的空白字符
echo $strs."<br>";			//输出原始字符串
echo rtrim($strs,"  *_*:)");	//去除字符串右边的特殊字符(:*_*
?>
</body>
</html>
