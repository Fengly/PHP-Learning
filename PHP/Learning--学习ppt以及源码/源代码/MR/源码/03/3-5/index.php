<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>引用赋值</title>
</head>
<body>
<?php
$str = "学习PHP很轻松";					//声明变量$str
$str2 = & $str;							//使用引用赋值，这是$str2已经赋值成为“学习PHP很轻松”
$str = "我要大声的告诉你：$str";		//重新给$str赋值
echo $str2;								//输出变量$str2
echo "<p>";
echo $str;								//输出变量$str
?>
</body>
</html>
