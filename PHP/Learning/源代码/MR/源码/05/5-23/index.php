<?php
$array = array ("�����ʵ������", "��е��ҵ������", "�й�����������", "���������");
$result1 = next($array);
$result2 = next($array);
reset($array);
$result3 = next($array);
echo "$result1 , $result2 , $result3";
?>
