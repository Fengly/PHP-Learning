<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>自定义函数的调用</title>
</head>

<body>
<?php
	/*	声明自定义函数	*/
	function example($num){
		return "$num * $num = ".$num * $num;		//返回计算后的结果
	}
	echo example(10);							//调用函数
?>
</body>
</html>
