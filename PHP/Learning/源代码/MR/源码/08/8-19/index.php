<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>去除两边空白字符或特殊字符</title>
</head>

<body>
<?php
$str="    \r\r(:@_@去除字符串左右两边的空白和特殊字符 @_@:)      ";
echo $str."<br>";						//输出原始字符串
echo trim($str)."<br>"; 				//去除字符串左右两边的空白字符
echo trim($str,"\r\r(:@_@ @_@:)"); 		//去除字符串左右两边的空白字符和特殊字符\r\r(:@_@ @_@:)
?>
</body>
</html>

