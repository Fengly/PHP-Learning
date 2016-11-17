<?php
$array1 = array ("index1","Index11","index2");
natsort($array1);
print_r($array1);
echo "<br />";
$array2 = array ("index1","index11","index2");
natcasesort($array2);
print_r($array2);
?>
