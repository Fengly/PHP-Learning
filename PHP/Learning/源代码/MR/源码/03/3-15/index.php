<?php
$a = true;//声明变量
$b = false;//声明变量
$c = "100abc";//声明变量
$d = "abc100";//声明变量
$e = 100;//声明变量
$f = 0;//声明变量
var_dump($a + $e);						//输出表达式的结果
echo("<br>");						//输出换行标记
var_dump($b + $e);						//输出表达式的结果
echo("<br>");						//输出换行标记
var_dump($c + $e);						//输出表达式的结果
echo("<br>");						//输出换行标记
var_dump($d + $e);						//输出表达式的结果
echo("<br>");						//输出换行标记
var_dump($a.$e);						//输出表达式的结果
echo("<br>");						//输出换行标记
var_dump($a && $e);						//输出表达式的结果
?>