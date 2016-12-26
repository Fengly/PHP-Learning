<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>按值传递方式</title>
</head>

<body>
<?php
function example( $m ){				 //定义一个函数
	$m = $m * 5 + 10;
echo "在函数内：\$m = ".$m;			 //输出形参的值
}
$m = 1;
example( $m ) ;						 //传值：将$m的值传递给形参$m
echo "<p>在函数外 \$m = $m <p>" ;		 //实参的值没有发生变化，输出$m=1
?>
</body>
</html>
