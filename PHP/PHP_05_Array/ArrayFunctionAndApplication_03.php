<html>
<head>
    <title>数组指针函数</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/2
 * Time: 16:49
 */
 // 1. key()函数(返回数组当前指针的键值) <--> current()函数(返回数组当前指针的值)
    /**
     *  语法: function key (array &$array) {} <--> function current (array &$array) {}
     *      + array: 预处理数组
     */
      // eg:
$arr = array(1, 2, 3, 3, 4);
echo key($arr)."<br />";
echo current($arr)."<p>";

 // 2. next()函数(数组指针往前移动一位) <--> prev()函数(数组指针往后移动一位)   这两个函数一旦指针单元不存在, 就返回false
    /**
     * 语法: function next (array &$array) {} <--> function prev (array &$array) {}
     *    + array: 预处理数组
     */
      // eg:
echo next($arr)."<br />";
echo next($arr)."<br />";
echo next($arr)."<br />";
echo next($arr)."<br />";
echo next($arr)."<br />";
echo next($arr)."<br />";
echo end($arr)."<br />";
echo prev($arr)."<br />";
echo prev($arr)."<br />";
echo prev($arr)."<br />";
echo prev($arr)."<br />";
echo prev($arr)."<br />";
echo prev($arr)."<br />";
echo prev($arr)."<br />";
echo prev($arr)."<br />";
echo prev($arr)."<br />";
echo next($arr)."<p>";

 // 3. end()函数(将数组指针移动到最后一个单元, 返回该单元信息) <--> reset()函数(将指针指向第一个单元, 返回单元信息)
    /**
     * 语法: function end (array &$array) {} <--> function reset (array &$array) {}
     *    + array: 预处理数组
     */
$array = array('a', 'b', 'c', 'd');
echo end($array)."<br />";
echo reset($array)."<p>";
 // 4.
    /**
     * 语法:
     */


?>
</body>
</html>
