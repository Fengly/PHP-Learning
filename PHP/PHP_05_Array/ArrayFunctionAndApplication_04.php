<html>
<head>
    <title>数组和变量之间的转换</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/2
 * Time: 17:13
 */
 // 1. extract()函数(用数组定义一组变量, 变量名为key, 值为value)
    /**
     * 语法: function extract (array $var_array, $extract_type = null, $prefix = null) {}
     *    + array: 预处理数组
     *    + extract_type: 可选参数
     *    + prefix: 可选参数
     */
    $arr = array("name" => "Jack", "sex" => "man", "age" => 23);
    extract($arr);
    echo $name."<br />";
    echo $sex."<br />";
    echo $age."<p>";


 // 2. compact()函数(使用变量建立一个数组, 变量名为key, 值为value)
     /**
      * 语法: function compact ($varname, $_ = null) {}
      */
        // eg:
$a = 'asp';
$b = 'php';
$c = 'jsp';
$result = compact('a', 'b', 'c');
print_r($result);

?>
</body>
</html>
