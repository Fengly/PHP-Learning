<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>使用以val结尾的函数进行转换</title>
</head>

<body>
<?PHP
	$str = "123.456abc";//声明变量
	$int = intval($str);//声明变量
	$flo = floatval($str);//声明变量
	$str = strval($str);//声明变量
	var_dump($int);						//输出整数值
	echo("<br>");						//输出换行标记
	var_dump($flo);						//输出浮点数值
	echo("<br>");						//输出换行标记
	var_dump($str);						//输出字符串值
?>
</body>
</html>

