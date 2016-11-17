<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>使用settype()函数进行转换</title>
</head>

<body>
<?PHP
	$str = "123.456abc";//声明变量
	$int = 100;//声明变量
	$boo = true;//声明变量
	settype($str,"integer");//对变量类型进行转换
	var_dump($str);//输出转换结果
	echo "<br>";//输出换行标记
	settype($int,"boolean");//对变量类型进行转换
	var_dump($int);//输出转换结果
	echo "<br>";//输出换行标记
	settype($boo,"string");//对变量类型进行转换
	var_dump($boo);//输出转换结果
?>
</body>
</html>

