<?php
$arr = array ("asp", "php", "60");
if(array_search (60, $arr)){
    echo "60�������� <br />";
}else{
    echo "60���������� <br />";
}
if(array_search (60, $arr, true)){
    echo "60�������� <br />";
}else{
    echo "60���������� <br />";
}
?>
