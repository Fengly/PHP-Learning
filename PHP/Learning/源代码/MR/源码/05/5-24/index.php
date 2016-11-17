<?php
$arr = array("name"=>"张三","sex"=>"男","age"=>20);//声明数组
extract($arr);//将数组元素定义在变量中
echo $name;//输出变量值
echo "<br />";//输出换行标记
echo $sex;//输出变量值
echo "<br />";//输出换行标记
echo $age;//输出变量值
?>
