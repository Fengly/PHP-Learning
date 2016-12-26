
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>自动对字符串进行转义和还原</title>
<style type="text/css">
<!--
body {
	background-color: #FFCCFF;
}
-->
</style></head>

<body>
<?php
 $str = "select * from tb_book where bookname = 'PHP自学视频教程'";
 $a = addslashes($str);							//对字符串中的特殊字符进行转义
 echo $a."<br>";								//输出转义后的字符
 $b = stripslashes($a);							//对转义后的字符进行还原
 echo $b."<br>";								//将字符原义输出
?>
</body>
</html>
