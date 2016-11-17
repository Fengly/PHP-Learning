<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>使用array()函数创建二维数组</title>
</head>

<body>
<?php
	$str = array (
		"PHP类图书"=>array ("PHP从入门到精通","PHP典型模块","PHP标准教程"),
	 	"JAVA类图书"=>array ("a"=>"JAVA范例手册","b"=>"JAVA WEB范例宝典"),
	 	"ASP类图书"=>array ("ASP从入门到精通",2=>"ASP范例宝典","ASP典型模块") 
	);							//声明数组
	print_r ( $str) ;			//输出数组元素
?>
</body>
</html>