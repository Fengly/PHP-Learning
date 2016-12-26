<?php
$array = array (0 => 100, "php" => "Í¼Êé");
$arr1 = array_keys($array);
print_r($arr1);
$array = array ("php", "asp", "java", "php");
$arr2 = array_keys($array, "php");
print_r($arr2);
?>
