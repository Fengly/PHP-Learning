<?php
$input = array("php","jsp","html");
$result1 = array_pad($input, 5, 8);
$result2 = array_pad($input, -5, "asp");
$result3 = array_pad($input, 1, "asp");
print_r($result1);
echo "<br />";
print_r($result2);
echo "<br />";
print_r($result3);
?>
