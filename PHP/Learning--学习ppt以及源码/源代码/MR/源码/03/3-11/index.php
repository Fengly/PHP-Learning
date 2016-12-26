<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>递增和递减运算</title>
</head>

<body>
<font color='blue'face='楷体_gb2312'>
<?php
$a = 6;
$b = 9;
echo "\$a = $a , \$b = $b<p>";
echo "\$a++ =  " . $a++ ."<br>" ; 	//先返回$a的当前值，然后$a的当前值加1
echo "运算后\$a的值: ".$a."<p>" ;
echo "++\$b = " . ++$b ."<br>" ;   	//$b的当前值先增加1，然后返回新值
echo "运算后\$b的值: ".$b ;
echo "<hr><p>";
echo "\$a-- = " . $a-- ."<br>" ;     	//先返回$n的当前值,然后$n的当前值减1
echo "运算后\$a的值: ".$a."<p>" ;
echo "\$b = " . --$b ."<br>" ;    	//$n的当前值先减少1，然后返回新值
echo "运算后\$b的值: ".$b;
?>
</font>
</body>
</html>