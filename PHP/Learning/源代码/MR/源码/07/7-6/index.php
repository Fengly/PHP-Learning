<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>在自定义函数中应用全局变量与局部变量</title>
</head>

<body>
<?php
$zy = "你好";
$zyy = "PHP语言";
function lxt (){
	$zy="我喜欢";
    echo $zy;
    global $zyy;    	//利用关键字global在函数内部定义全局变量
    echo $zyy;	//此处调用$zyy
 }    
lxt () ;   
?>
</body>
</html>
