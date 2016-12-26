<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>查询关键字描红</title>
</head>
<body>
<?php
$content="凡事总是由小至大，正所谓集腋成裘，必须按一定的步骤程序去做。《诗经·大雅》的《思齐》篇中也有“刑于寡妻，至于兄弟，以御于家邦”之语，意思就是先给自己的妻子做榜样，推广到兄弟，再进一步治理好一家一国。";
$str="刑于寡妻，至于兄弟，以御于家邦";												//定义查询的字符串常量
echo str_ireplace($str,"<font color='#FF0000'>".$str."</font>",$content); 		//替换字符串为红色字体
?>
</body>
</html>