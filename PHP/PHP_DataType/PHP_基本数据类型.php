/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/10/31
 * Time: 15:29
 */
/// bool 类型
<?php
    $b = false;
    if($b == true) {
        echo "<font color = 'blue'>学号PHP</font>";
    } else {
        echo "出错";
    }
?>

/// 字符串
<?php
    // 单引号('')
    // 双引号("")
    // 定界符(<<<)
    $a = 'String';
    $b = "string";
?>
// 例子
<?php
    $c = "您好!PHP";
    echo "<h3>$c</h3>>";     // 输出结果: 您好!PHP
    echo '<h4>$c</h4>';      // 输出结果: $c
?>
/// 定界符格式
<!--<<<str -->
<!--    格式化文本 -->
<!--    str-->
<?php
//    $i = "PHP";
//    echo <<<std
//      hello, welcome to here!<p>
//      do you like $i?
//    std;
//?>
