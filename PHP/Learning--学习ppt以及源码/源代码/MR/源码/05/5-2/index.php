<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>应用array()函数创建数组</title>
</head>

<body>
<?php
$arr_string=array('one'=>'php','two'=>'java');		    //以字符串作为数组索引，指定关键字
print_r($arr_string);							          //通过print_r()函数输出数组
echo "<br />";
echo $arr_string['one']."<br />";					    //输出数组中的索引为one的元素
$arr_int=array('php','java');						    //以数字作为数组索引，从0开始，没有指定关键字
print_r($arr_int);								    //输出整个数组
echo "<br />";
echo $arr_int['0']."<br />";						    //输出数组中的第1个元素						
$arr_key=array(0 =>'PHP入门与实战', 1 =>'Java入门与实战', 1 =>'VB入门与实战');	
//指定相同的索引
print_r($arr_key);								   //输出整个数组，发现只有两个元素
?>
</body>
</html>
