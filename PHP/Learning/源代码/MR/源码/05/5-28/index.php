<?php
$array = array("Php", "asP", "jAva", "html");
if(in_array("php", $array)){       //���������ִ�Сд�ģ�����ʧ��
    echo "php in array";
}
if(in_array("jAva", $array)){
    echo " jAva in array";
}
echo "<br />";
$arr = array("100", 200, 300);
if (in_array("200", $arr, TRUE)) {      //�����ַ�����
    echo "200 in arr";
}
if (in_array(300, $arr, TRUE)) {
    echo "300 in arr";
}
?>
