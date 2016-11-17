<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/2
 * Time: 14:32
 */
    /*****************************数组*******************************
     * 数字索引数组
          $arr_int = array("PHP", ".Net", "Java");
     * 关联数组
          $arr_string = array("PHP" => "PHP", ".Net" => ".Net", "Java" => "Java");
    */
    // 例
$array[0] = "PHP";
$array[1] = ".Net";
$array[2] = "Java";
print_r($array);
echo "<p>";


    // eg: 应用array()函数声明数组, 并输出数组的元素, 代码如下:
    $arr_my_string = array('one' => 'PHP', 'two' => 'Java');
    print_r($arr_my_string);
    echo "<br />";
    echo $arr_my_string['one']."<br />";
    $arr_my_int = array("PHP", "Java");
    print_r($arr_my_int);
    echo "<br/>";
    echo $arr_my_int['0']."<br />";
    $arr_key = array(0 => 'PHP', 1 => 'Java', 2 => '.Net');  // key 重名 前面的被后面替换
    print_r($arr_key);


// 二维数组
    echo "<p>";
    $arr[0] = $arr_key;
    $arr['language'] = $arr_my_string;
    print_r($arr);

// 使用array()函数声明二位数组
    $strs = array(
        "PHP" => array("PHP从入门到精通", "PHP典型模块", "PHP标准教程"),
        "JAVA" => array("a" => "JAVA范例手册", "b" => "JAVA WEB范例宝典"),
        "ASP" => array("ASP从入门到精通", 2 => "ASP范例宝典", "ASP典型模块")
    );
    echo "<p>";
    print_r($strs);
    echo "<p>";
?>