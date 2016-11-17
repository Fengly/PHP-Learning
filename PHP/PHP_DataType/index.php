<html>
<head>
    <title>PHP 测试</title>
</head>
<body bgcolor="#00fa9a">
<font face = '幼圆' color = '#20b2aa'>
<?php
//    $b = true;
//    if($b == true) {
//       echo "<font color = 'blue'>学好PHP</font>";
//    } else {
//       echo "出错";
//

//$i = "PHP";
//echo <<<std
//hello, welcome to here!<p>
//do you like $i?
//std;



/**
    八进制、十进制、十六进制
 */
//    $i = 123;  // 十进制
//    $i2 = 0123; // 八进制
//    $i3 = 0x123; // 十六进制
//    echo "数字$i 不同进制的输出结果;<p>";
//    echo "十进制: $i; <br>";
//    echo "八进制: $i2; <br>";
//    echo "十六进制: $i3; <br>";


// 浮点数
//    echo "圆周率的三种书法方法: <p>";
//    echo "第一种: pi() = ".pi()."; <br>";
//    echo "第二种: 3.14159265359 = ". 3.14159265359 ."; <br>";
//    echo "第三种: 314159265359E-11 = ". 314159265359E-11 ."; <br>";




// 数组
//    $array = ("value1");
//    $array1[key] = "value";
//    $array2(key1 => value1, key2 => value2);

    $arr = array(0 => 1, 1 => 2, 'hi' => "hello");
    // 输出数组中的第一个元素
    echo $arr[0];
    echo "<br>";
    echo $arr['hi'];


// 特殊数据类型
  /**
   * 资源     :     又叫"句柄", 由编程人员分配, 处理外部实物的函数。 需及时释放内存, 如果忘记释放, 系统会自动启用垃圾回收机制
   * 空值     :     特殊的值, 表示变量没有值, 唯一的值就是 null。 不区分大小写(null和NULL一样)
                    - 没有赋值任何值
                    - 被赋值为Null
                    - 被 unset() 函数处理过的变量
   */
    $a;    /// 没有赋值的变量
    $b = null;  /// 被赋空值的变量
    $c = 10;
//    unset($c);    /// 使用 unset() 函数释放变量$c的值, $c的值为空
    echo "<br>";
    echo $a, $b, $c;


// 检测数据类型
    // 检测数据类型的函数
        /**
         *  is_bool    检测变量是否是 bool 类型
         *  is_string  检测变量是否为字符串类型
         *  is_float/is_double   检测变量是否为浮点型
         *  is_integer/is_int    检测变量是否为整数
         *  is_null    检测变量是否为空
         *  is_array   检测变量是否为数组
         *  is_object  检测变量是否是一个对象类型
         *  is_numeric 检测变量是否为数字或由数字组成的字符串
         */
    // 下面通过检测数据类型的函数来检测相应的字符串类型:
    $d = true;
    $e = "你好PHP";
    $f = 123456;
    echo "<p>";
    echo "1. 变量是否为bool类型: ".is_bool($d)."<br>";
    echo "2. 变量是否为string类型: ".is_string($e)."<br>";
    echo "3. 变量是否为int/interger类型: ".is_int($f)."<br>";
    echo "4. 变量是否为float/double类型: ".is_float($d)."<p>";



//  PHP 数据的输出
    printf("输出当前的日期和时间: ");
    echo date("Y-m-d H:m:s");


    echo "<p>";
// 上机指导
    $h = true;
    $i = "我是";
    $j = 1233;
    echo "第一个变量是int类型: ".is_int($h)."<br>";
    echo "第二个变量是int类型: ".is_int($i)."<br>";
    echo "第三个变量是int类型: ".is_int($j)."<p>";
?>
    </font>
</body>
</html>




















