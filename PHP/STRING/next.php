<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NEXT</title>
</head>
<body bgcolor="#00ffff">
<div align="middle">
    <img src="MAMP-PRO-Logo.png">
    <h1>检索字符串</h1>
    <?php
    echo strstr("明日图书馆", "图")."<br>";
    echo strstr("http://www.mingribook.com","w")."<br>";
    echo strstr("0431-8497****","8")."<p>";
    ?>
    <?php
    $str = "PHP自学教程、JAVA自学教程、C#自学教程、C自学教程";
    echo substr_count($str, "自学教程");
    ?>
    <h1>替换字符串</h1>
    <?php
    $str1 = "MRSOFT公司是一家以计算机";
    echo str_ireplace("mrsoft", "FenglyNuo", $str1);  // 不区分大小写
    echo "<p>";
    ?>
    <?php
    $str_s1 = "俄罗斯外交部发言人玛丽亚·扎哈罗娃5日在外交部官方网站上发表声明，要求美国政府对日前媒体曝光的五角大楼黑客入侵俄罗斯电网、通信网以及指挥系统一事做出解释。";
    $str_s2 = "黑客入侵俄罗斯电网、通信网以及指挥系统";
    echo str_ireplace($str_s2, "<font color='red'>".$str_s2."</font>", $str_s1)."<p>";
    ?>
    <?php
    $str_str1 = "In today's hard work, in tomorrow's double return! ";
    $replace = "One hundred times";
    echo substr_replace($str_str1, $replace, 36, 6)."<p>";   /// 中文容易出错编码出错
    ?>
</div>

<div align="left">
    <!--    去掉字符串首位空格以及特殊字符-->
    <?php
    $str_string1 = "(:@_@ 相逢也只是在梦中! @_@:)";
    $str_string2 = "(:*_* 相逢也只是在梦中! *_*:)";
    echo $str_string1."<br>";
    echo ltrim($str_string1)."<br>";
    echo $str_string2."<br>";
    echo ltrim($str_string2, "(:*_* ")."<br>";   // 去掉开头特殊字符
    echo rtrim($str_string2, "*_*:)")."<br>";     // 去掉结尾特殊字符
    echo trim($str_string1, " ():_@")."<p>";           // 去除首位字符, 手动指定
    ?>


<!--    字符串格式化-->
    <?php
    $number = 3665.256;
    echo number_format($number)."<br>";
    echo number_format($number, 2)."<br>";
    $number2 = 12345.7890;
    echo number_format($number2, 2, '.', ',')."<p>";
    ?>


<!--    分割、合成字符串-->
<!--    分割-->
    <?php
    $string1 = "PHP@C#@JAVA@C++";
    print_r(explode("@", $string1));
    echo "<p>";
    ?>
<!--    合成-->
    <?php
    $strs = explode("@", $string1) ;
    echo implode("_", $strs);
    ?>


<!--  strrev() 将英文字符串前后颠倒  -->
<!--  str_repeat() 用于将字符串重复指定的次数  -->
<!--    -->
</div>
</body>
</html>