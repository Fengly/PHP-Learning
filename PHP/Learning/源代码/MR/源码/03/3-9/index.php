<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>赋值运算符的应用</title>
</head>

<body>
<?php
	$a = 10;								//声明变量$a
	$b = 8;								//声明变量$b
	echo "\$a = ".$a."<br>";				//输出变量$a
	echo "\$b = ".$b."<br>";				//输出变量$b
	echo "\$a += \$b = ".($a += $b)."<br>";			//计算变量$a加 $b的值
	echo "\$a -= \$b = ".($a -= $b)."<br>";			//计算变量$a减$b的值
	echo "\$a *= \$b = ".($a *= $b)."<br>";			//计算$a乘以$b的值
	echo "\$a /= \$b = ".($a /= $b)."<br>";			//计算$a除以$b的值
	echo "\$a %= \$b = ".($a %= $b);					//计算$a和$b的余数
?>
</body>
</html>

