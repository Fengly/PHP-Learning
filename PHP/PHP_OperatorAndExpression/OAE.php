<html>
<head>
 <title>运算符和表达式</title>
</head>
<h4>
 <font color="#dc143c", size="5">
 常量(全用大写, 单词间用"_"连接)
 </font>
</h4>
<font color="#8a2be2">
<body bgcolor="#00fa9a">
<?php
// 常量(全用大写, 单词间用"_"连接)
   // 自定义常量
    /** 1. 使用define()定义常量
     *     function define ($name, $value, $case_insensitive = false)
     *     参数说明:
     *         constant_name : 必选参数, 常量名称, 即标志符
     *         value : 必选参数, 常量的值
     *         case_sensitive : 可选参数, 指定是否大小写敏感,设定为true,表示不敏感
     */

    /** 2. 使用constant()函数获取常量的值
     *     function constant ($name)
     *     参数说明
     *         name : 要获取的常量名称。如果获取成功,则返回常量的值, 失败则返回错误信息
     */

    /** 3. 使用defined()函数判断常量是否已经被定义
     *     function defined ($name)
     *     参数说明
     *         name : 获取常量名称,成功,返回true; 否则为 false
     */

    // 例子
       // 使用define()函数定义名为 MESSAGE 的常量, 使用constant()函数来获取该常量的值,最后使用defined()函数来判断常量是否已经被定义
       // 主要代码

    echo "<br>";
    define("MESSAGE", "能看到一次", false);  // 设为true表示大小写不敏感
    echo MESSAGE;
    echo "<br>";
    echo Message;

    // 定义常量 COUNT
    define("COUNT", "能看很多次", true);   // 大小写不敏感
    echo "<br>";
    echo  COUNT;
    echo "<br>";
    echo Count;
    echo "<br>";
    echo constant("COUNT");
    echo "<br>";
    echo  defined("MESSAGE");
    echo "<p>";
    echo "<br>";

    echo "预定义常量";



// PHP中预定义常量
      /**  <br>
       *  __FILE__    默认常量, PHP程序的完整路径和文件名
       *  __LINE__    默认常量, PHP程序行数
       *  PHP_VERSION    内建常量, PHP程序的版本, 如 "3.0.8_dev"
       *  PHP_OS      内建常量, 执行PHP解析器的操作系统名称, 如 "WINNT"
       *  TRUE        真值(true)
       *  FALSE       假值(false)
       *  NULL        null值
       *  E_ERROR     这个常量指到最近的错误处
       *  E_WARNING   这个常量指到最近的警告处
       *  E_PARSE     这个常量指到解析语法有潜在问题处
       *  E_NOTICE    这个常量为发生不寻常, 但不一定是错误处
       *  <br>
       *  <br>
       *  带 "E"  为PHP错误调试部分
       */

      // 以下代码输出PHP中的一些信息
    echo "<br>";
    echo "当前文件路径: ".__FILE__;
    echo "<br>";
    echo "当前行数: ".__LINE__;
    echo "<br>";
    echo "当前PHP版本: ".PHP_VERSION;
    echo "<br>";
    echo "当前操作系统: ".PHP_OS;
?>


<h4>
 <font color="#dc143c", size="5">
  变量(全用小写, 单词间用"_"连接)
 </font>
<?php

// ******************************定义和使用变量******************************
      /** PHP中变量名遵循以下约定
       *    1. 在PHP中的变量名区分大小写
       *    2. 变量名必须以美元($)开始
       *    3. 变量名可以以下划线开始
       *    4. 变量名不能以数字字符开头
       *    5. 变量名可以包含一些扩展字符(如重音拉丁字符), 但不能包含非法扩展字符(如汉字字符和汉字字母)
       */



    // 例子: 下面定义一个100的变量,一个bool类型,一个空字符串
    $n_num = 100;
    $is_my_bool = true;
    $str = "";

// ******************************变量的赋值方式******************************  <br>
   // *** 对变量进行赋值使用"="赋值运算符实现, PHP的有三种赋值方式:
      // * 直接赋值
         // 直接赋值使用"="赋值给变量, 例:
           $name = "FLNuo";
           $nmber = 23;
           echo "<p>", "直接赋值: <br>";
           echo "$name <br>";
           echo "$nmber";
      // * 传值赋值
         // 传值赋值是把一个变量的值赋给另一个变量
           $str1 = "PHPxuex";
           $str2 = $str1;
           $str1 = "study PHP";
           echo "<p>", "传值赋值: <br>";
           echo $str2, "<br>", $str1;
      // * 引用赋值
         // 引用赋值是用不同的名字访问同一个变量内容,当改变其中一个变量的值时, 另一个也跟着变化。 使用"&"来表示引用
           echo "<p>", "引用赋值: <br>";
           $string = "Study PHP is interesting";
           $string1 = & $string;
           echo "改变前: ", $string1;
           echo "<br>";

           $string = "IN MY HEART: $string";
           echo "改变后: ", $string1;
           echo "<br>";
           echo "string = $string", "<p>";

// ******************************可变变量******************************  <br>
   // 可变变量是一种特殊的变量, 变量的名称并不是预先定义好的, 而是动态的设置和使用。可变变量一般是指使用一个变量的值作为另一个变量的名称,
   // 所以可变变量又称为变量的变量。可变变量通过在一个变量名称前使用两个"$"符号实现
     // 例:
      /**
           下面应用可改变变量实现动态改变变量的名称。首先定义两个变量: $change_name和$php, 并且输出变量$change_name的值, 然后应用
        可变变量来改变变量$change_name的名称, 最后输出改变名称的变量值, 程序代码如下。
       */
      $change_name = "php";     // 声明变量 $change_name
      $php = "编程的关键因素在于学好语言基础!";   // 声明变量 $php
      echo $change_name, "<br>";
      echo $$change_name, "<p>";

echo <<<std
 php 预定义变量 查看链接: <br>
 http://php.net/manual/zh/reserved.variables.php
std;
?>


 <h4>
  <font color="#dc143c", size="5">
   PHP运算符
  </font>
  <?php
  // ******************************PHP算术运算符******************************  <br>
     // 例:
      // 简单 算术运算示例
      echo "<p>";
      $a = -100;     // 定义三个整形变量
      $b = 50;
      $c = 30;
      echo "数字的运算:", "<br>";
      echo "\$a + \$b = ".($a + $b)."<br>";   // 在php中"$"属于特殊符号, 需要"\"转义
      echo "\$a - \$b = ".($a - $b)."<br>";
      echo "\$a / \$c = ".($a / $c)."<br>";
      echo "\$a % \$c = ".($a % $c)."<br>";
      echo "\$b * \$c = ".($b * $c)."<p>";

   // 字符串运算符
     // 字符串运算符"."(只有这一个): 连接字符串
      // 例:
       // "." 和 "+" 的区别:
        /**
         * "." 连接字符串
         * "+" PHP默认为一次算术运算,
         *   如果"+"号两边是字符类型, 则自动转换为整型;
         *   如果是字母, 则为"0"
         *   如果以数字开头, 则会截取字符串头部的数字本分, 进行运算(数字只有在开头才有效)
         */
        echo "字符串运算:", "<br>";
        $s1 = "FLNuo";
        $s2 = " SN";
        echo $s1.$s2 , "<br>";
        $s1_s2 = $s1 + $s2;
        echo $s1_s2."<br>";

  echo <<<std
sdsdsdsdssdsds"<br>";
sdsdsdsd"<br>";
sdsdsdsd"<br>";
dsdsdsdsddsd"<br>";
sdsdsd"<br>";
sdsd"<br>";
sd"<br>";
sd"<br>";
sd"<br>";
sd
sd"<br>";
sd"<br>";
s"<br>";
ds"<br>";
d"<br>";
sd"<br>";
sds"<br>";



// php中数据类型转化可以"() + 要转化内容"
// 用intval(), floatval(), strval() 提取对应类型
// settype()函数设置变量类型, 前面参数是预处理类型, 后面是要转化到的类型(变量本身发生改变)

std;

  ?>

</body>
</font>
</html>
