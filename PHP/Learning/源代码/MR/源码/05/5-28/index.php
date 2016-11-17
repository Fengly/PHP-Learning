<?php
$array = array("Php", "asP", "jAva", "html");
if(in_array("php", $array)){       //函数是区分大小写的，所以失败
    echo "php in array";
}
if(in_array("jAva", $array)){
    echo " jAva in array";
}
echo "<br />";
$arr = array("100", 200, 300);
if (in_array("200", $arr, TRUE)) {      //区分字符类型
    echo "200 in arr";
}
if (in_array(300, $arr, TRUE)) {
    echo "300 in arr";
}
?>
