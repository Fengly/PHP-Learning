<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>通过[]创建二维数组</title>
</head>

<body>
<?php
	$arr[1] = array ("PHP从入门到精通","PHP典型模块","PHP标准教程");		//定义二维数组元素
	$arr["Java类图书"] = array ("a"=>"Java范例手册","b"=>"Java Web范例宝典");//定义二维数组元素
	print_r($arr) ;			//输出数组
?>
</body>
</html>
