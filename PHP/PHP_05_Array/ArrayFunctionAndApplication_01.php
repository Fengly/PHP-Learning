<html>
<head>
    <title>创建数组函数</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/2
 * Time: 15:40
 */
//--------------------------------------- 创建数组的函数
   // 1. range()函数(创建某一范围数组)
     /**
      * 语法: function range ($low, $high, $step = null) {}
      *    + low: 必要参数, 数组单元最小值
      *    + high: 必要参数, 数组单元最大值
      *    + step: 可选参数。给出参数, 将被作为单元之间的步进值。默认为1
      */
        // eg: 应用range()函数建立一个范围为2到8的数组和一个范围为b到g的数组
$array_2_8 = range(2, 7);
print_r($array_2_8);
echo "<br/>";
$array_b_g = range('b', 'g');
print_r($array_b_g);
echo "<p>";


   // 2. array_combine函数(合并数组)
     /**
      * 语法: function array_combine(array $keys, array $values) { }
      *    + keys: 必要参数, 新数组键值
      *    + values: 必要参数, 新数组值
      */
        // eg: 应用array_combine()函数合并两个数组
$a = array('PHP', '.NET', 'JAVA');
$b = array('a', 'b', 'c');
$c = array_combine($a, $b);
print_r($c);
echo "<p>";


   // 3. array_fill()函数(创建value一样的填充数组)
      /**
       * 语法: function array_fill ($start_index, $num, $value) {}
       *    + start_index: 必要参数, 起始数组的键名
       *    + num: 必要参数, 填充的数量, 其值必须大于0
       *    + value: 必要参数, 用来填充的值
       */
         // eg: 应用array_fill()函数建立一个数组
$array = array_fill(3, 5, 'php函数');
print_r($array);




   // 4. array_pad()函数(填补数组到指定长度)
      /**
       * 语法: function array_pad(array $input, $pad_size, $pad_value) { }
       *    + input: 必要参数, 输入的数组
       *    + pad_size: 必要参数, 指定的长度, 如为整数, 则填补到右侧,否则,填补到左部
       *    + pad_value: 可选参数, 用来填补的值
       */
         // eg: 应用array_pad()函数填补数组,
$input = array("php", "java", ".net");
$result1 = array_pad($input, 5, 8);
$result2 = array_pad($input, -5, 8);
$result3 = array_pad($input, 1, 'asp');
echo "<p>";
print_r($input);
echo "<br />";
print_r($result1);
echo "<br />";
print_r($result2);
echo "<br />";
print_r($result3);
echo "<p>";

   // 5. explode函数(分割字符串)
       /**
        * 语法: function explode ($delimiter, $string, $limit = null) {}
        *    + delimiter: 必要参数, 分割标识字符, 如果预分割字符串为"",则返回false;
        *    + string: 必要参数, 预分割字符串
        *    + slimit: 可选参数, 如果设置该参数, 返回的数组包含最多limit个元素, 而最后的元素将包含String的剩余部分;
                       如果为负数, 则返回除了最后的-limit个元素外的所有元素
        */
          // eg: 应用exploda()函数对指定字符串以@为分割符进行分割
$str = "php自学@.net自学@java自学";
$str_arr = explode('@', $str, -1);
printf($str);
echo "<br />";
print_r($str_arr);
echo "<p>";



?>
</body>
</html>

































