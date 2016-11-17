<html>
<head>
    <title>数组统计函数</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/2
 * Time: 16:25
 */
 // 1. count() 函数(数组元素个数)
   /**
    * 语法: function count ($var, $mode = COUNT_NORMAL) {}
    *    + var: 必要参数, 数组对象
    *    + mode: 可选参数, 如果mode的值设置为COUNT_RECURSIVE(或1), count()函数将递归地对数组计数,多维数组单元统计。该参数默认0
    */
      // eg: 应用count()函数统计数组中元素个数
$array = array(0 => "php study", 1 => "java study", 2 => ".net study");
echo "array数组个数为: ".count($array);


 // 2. max()函数(统计并计算数组最大元素)
    /**
     * 语法: function max (array $value1, $value2 = null, ...$values) {}
     *    + value1:
     *    + value2:
     *    ...values
     */
       // eg: 应用max()求数组元素最大值
$a = array(3, 5, 2, 9);
$b = array('a', 'c', 'm', 'w');
echo "<p>";
echo max($a);
echo "<br />";
echo max($b);
echo "<p>";
 // 3. mix()函数(统计并计算数组最小元素)
    /**
     * 语法: function min (array $value1, $value2 = null, ...$values) {}
     */
      // eg: 用法与max() 一样
 // 4. array_sum()函数(求和函数)
    /**
     * 语法: function array_sum(array $array) { }
     *    + array: 要求和的数组
     */
    echo array_sum($a)."<br />";
    echo array_sum($b)."<p>";

 // 5. array_count_values()函数(返回一个新数组, 与预处理数组值为key, 值出现次数为value)
    /**
     * 语法: function array_count_values(array $input) { }
     *    + input: 预处理数组
     */
    $c = array("a", "b", "c", "a", "a", "v", "b", "v");
    print_r(array_count_values($c));
    echo "<p>";
?>
</body>
</html>

























