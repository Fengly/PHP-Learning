<font color='red'face='楷体_gb2312'>
<?php
    $a = true;
    $b = true;
    $c = false;
    if($a or $b and $c)			//使用or运算符做逻辑判断
        echo "true";
    else
        echo "false";
    echo "<br>";
    if($a || $b and $c)			//使用||运算符做逻辑判断
        echo "true";
    else
        echo "false";
?>
</font>
