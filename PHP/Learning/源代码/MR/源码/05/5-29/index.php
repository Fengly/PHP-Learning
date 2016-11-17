<?php
$arr = array ("asp", "php", "60");
if(array_search (60, $arr)){
    echo "60在数组中 <br />";
}else{
    echo "60不在数组中 <br />";
}
if(array_search (60, $arr, true)){
    echo "60在数组中 <br />";
}else{
    echo "60不在数组中 <br />";
}
?>
