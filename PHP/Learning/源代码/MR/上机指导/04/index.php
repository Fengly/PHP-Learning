<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>判断指定的年份是否为闰年</title>
</head>

<body>
<?php
	$year = 2012;                              //定义一个变量$year,并为其赋值为2012
	if(($year%4==0 && $year%100!=0) || $year%400==0){    //判断指定年份是否为闰年
		echo "$year".'年'."是闰年";		   //输出是闰年
	}else{							  
		echo "$year".'年'."是平年"; //否则输出是平年
	}
?>



</body>
</html>
