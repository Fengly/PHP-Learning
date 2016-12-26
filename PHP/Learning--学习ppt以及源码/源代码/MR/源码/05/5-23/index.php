<?php
$array = array ("人民邮电出版社", "机械工业出版社", "中国铁道出版社", "人民出版社");
$result1 = next($array);
$result2 = next($array);
reset($array);
$result3 = next($array);
echo "$result1 , $result2 , $result3";
?>
