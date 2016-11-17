<?php
$array = array ("asp", "php", "javascript", "html");
end($array);        //将数组指针指向末尾
$result1 = prev($array);
echo $result1;
echo "<br />";
$result2 = prev($array);
echo $result2;
?>
