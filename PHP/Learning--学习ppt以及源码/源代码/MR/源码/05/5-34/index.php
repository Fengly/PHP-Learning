<?php
$array1 = array ("a"=>"asp", "p"=>"php", "j"=>"jsp");
rsort($array1);
print_r($array1);
echo "<br />";
$array2 = array ("a"=>"asp", "p"=>"php", "j"=>"jsp");
arsort($array2);
print_r($array2);
?>
