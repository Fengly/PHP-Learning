<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>计算2~100之间所有偶数之和</title>
</head>
<body>
<?php
	$b="";
	for($a=0;$a<=100;$a+=2){		//执行for循环
		$b=$a+$b;				//计算所有偶数之和
	}
	echo "2~100之间所有偶数之和为：<b>".$b."</b>";
?>
</body>
</html>
