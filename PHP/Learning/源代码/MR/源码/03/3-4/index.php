<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>变量间的赋值</title>
</head>

<body>
<?php
$str1 = "PHP编程词典";					//声明变量$str1
$str2 = $str1;							//使用$str1来初始化$str2
$str1 = "我喜欢学PHP";					//改变变量$str1的值
echo $str2;					 			//输出变量$str2的值
?>
</body>
</html>
