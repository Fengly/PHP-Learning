<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>检测变量数据类型</title>
<?php
$a=true;
$b="你好PHP";
$c=123456;
echo "1. 变量是否为布尔型：".is_bool($a)."<br>";			//检测变量是否为布尔型
echo "2. 变量是否为字符串型：".is_string($b)."<br>";		//检测变量是否为字符串型
echo "3. 变量是否为整型：".is_int($c)."<br>";				//检测变量是否为整型
echo "4. 变量是否为浮点型：".is_float($c)."<br>";			//检测变量是否为浮点型
?>

