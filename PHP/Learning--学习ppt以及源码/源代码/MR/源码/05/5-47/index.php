<?php
$array1 = array("asp" => "ʵ��Ӧ��", "php" => "�����ֲ�", "java" => "����Ӧ��");
$array2 = array("asp" => "ʵ��Ӧ��", "������ȫ", "����Ӧ��");
$result = array_intersect($array1, $array2);
print_r($result);
?>
