<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>向数组中添加元素</title>
</head>

<body>
<?php
    $arr=array(0=>'PHP入门与实战',1=>'JAVA入门与实战');	//定义数组
    echo "添加前的数组元素：";
    foreach($arr as $key=>$value){						//遍历添加元素前的数组
      echo $value."\n";
    }
    echo "<p>";
    array_push($arr,'ASP入门与实战');					//向数组中添加一个元素
    echo "添加后的数组元素：";
    foreach($arr as $key=>$value){						//遍历添加元素后的数组
      echo $value."\n";
    }
?>




</body>
</html>
