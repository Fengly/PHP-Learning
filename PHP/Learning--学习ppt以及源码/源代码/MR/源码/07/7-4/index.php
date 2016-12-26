<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>默认参数的应用</title>
</head>

<body>
<?php
	function values($price,$tax=0){			//定义一个函数，其中的一个参数初始值为空
		$price=$price+($price*$tax);			//声明一个变量$price，等于两个参数的运算结果
		echo "价格:$price<br>";					//输出价格
	}
	values(100,0.25);        					//为可选参数赋值0.25
	values(100);            					//没有给可选参数赋值
?>
</body>
</html>
