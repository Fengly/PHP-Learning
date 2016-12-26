<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>变量函数</title>
</head>

<body>
<?php
	//声明第一个函数a，计算两个数的和，需要两个整型参数，返回计算后的值
	function a($a,$b){
		return $a+$b;
	}
	//声明第一个函数b，计算两个数的平方和，需要两个整型参数，返回计算后的值
	function b($a,$b){
		return $a*$a+$b*$b;
	}
	//声明第一个函数c，计算两个数的立方和，需要两个整型参数，返回计算后的值
	function c($a,$b){
		return $a*$a*$a+$b*$b*$b;
	}
	$result="a";		//将函数名‘a’赋值给变量$result，执行$result()时则调用函数a()
	//$result="b";	将函数名‘b’赋值给变量$result，执行$result()时则调用函数b()
	//$result="c";	将函数名‘c’赋值给变量$result，执行$result()时则调用函数c()
	echo"运算结果是：".$result(2,3);
?>

</body>
</html>
