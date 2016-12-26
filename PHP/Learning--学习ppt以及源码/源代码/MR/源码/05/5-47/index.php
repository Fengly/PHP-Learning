<?php
$array1 = array("asp" => "实例应用", "php" => "函数手册", "java" => "基础应用");
$array2 = array("asp" => "实例应用", "函数大全", "基础应用");
$result = array_intersect($array1, $array2);
print_r($result);
?>
