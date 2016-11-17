<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>可变变量的应用</title>
</head>

<body>
<?php
$change_name = "php";							//声明变量$change_name
$php = "编程的关键因素在于学好语言基础!";		//声明变量$php
echo $change_name ;     						//输出变量$change_name
echo $$change_name ;    						//通过可变变量输出$php的值
?>
</body>
</html>