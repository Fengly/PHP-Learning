<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>使用预定义常量获取PHP信息</title>
</head>

<body>
<?php
echo "当前文件路径为：".__FILE__;              //使用__FILE__常量获取当前文件路径
echo "<br>";
echo "当前行数为：".__LINE__;                 //使用__LINE__常量获取当前所在行数
echo "<br>";
echo "当前PHP版本信息为：".PHP_VERSION;      //使用PHP_VERSION常量获取当前PHP版本
echo "<br>";
echo "当前操作系统为：".PHP_OS;               //使用PHP_OS常量获取当前操作系统
?>

</body>
</html>
