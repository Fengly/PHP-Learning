<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>function</title>
</head>
<body bgcolor="#00ffff">
<?php
require "top.php";
// 自定义函数
/** 函数的声明 */
function example($num) {
    return "$num * $num = ".$num * $num;
}

// 函数的调用
$a = example(100);
echo "<p>".$a."<p>";


// 按值传递方式
echo "按值传递方式"."<br/>";
$b = 10;
function example2($num) {
    echo "num = ".($num + $num)."<br/>";
}
example2($b);
echo $b."<p>";


// 按引用传递方式
echo "按引用传递方式 & 指针操作" ."<br/>";
function example3(&$num) {
    $num = $num * 5 + 10;
    echo "b = ".$num."<br/>";
}
example3($b);
echo $b."<p>";


// 默认参数
echo "默认参数"."<br>";
function values($price, $tax = 0) {
    $price = $price + $tax * $price;
    echo "价格: ".$price."<br>";
    if ($tax == 0) {
        echo "<p>";
    }
}
values(100, .25);
values(100);


// 自定义函数的返回值
echo "自定义函数的返回值<br>";
function values2($price, $tax = .65) {
    $price = $price + $tax * $price;
    return $price;
}
echo values2(100)."<p>";


// 函数内部调用全局变量 需用 global 关键字声明
echo "函数内部调用全局变量 需用 global 关键字声明<p>";



for ($i = 0; $i < 10; $i++) {
    include "include.php";
    echo "<br>".$book_name."<br>";
}
?>
</body>
</html>