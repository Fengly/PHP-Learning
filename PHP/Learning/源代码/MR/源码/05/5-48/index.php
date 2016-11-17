<?php
$array1 = array("asp" => "实例应用", "php" => "函数手册", "java" => "基础应用");//声明数组
$array2 = array("asp" => "实例应用", "函数大全", "基础应用");		//声明数组
$result = array_intersect_assoc($array1, $array2);		//计算两个数组的交集
print_r($result);									//输出计算后的交集
?>
