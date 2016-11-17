<html>
<head>
    <title>数组遍历</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/2
 * Time: 15:18
 */
// 遍历数组
  // 应用foreach语句, 遍历函数
    // eg: 通过foreach语句遍历二维数组中的数据, 具体步骤如下。
$strs = array(
    "PHP" => array("PHP从入门到精通", "PHP典型模块", "PHP标准教程"),
    "JAVA" => array("a" => "JAVA范例手册", "b" => "JAVA WEB范例宝典"),
    "ASP" => array("ASP从入门到精通", 2 => "ASP范例宝典", "ASP典型模块")
);
// 遍历数组strs
foreach ($strs as $key => $value) {
    echo "<br />";
    foreach ($value as $keys => $values) {
        echo "\n";
        echo $strs[$key][$keys];
        echo "\n"."\n"."\n";
    }
}

echo "<p>";
   // list()只能遍历数字索引的数组
   // each()
     // eg: 使用上述两个函数遍历数组
$array = array(0 => 'php自学', 1 => 'java自学', 2 => '.Net自学', 3 => 'c#自学');
while (list($name, $value) = each($array)) {
    echo "$name = $value"."\n";
}

echo "<p>";
// 数组的输出   print_r() 与 var_dump()
var_dump($array);
echo "<p>";
var_dump($strs);

?>
</body>
</html>


