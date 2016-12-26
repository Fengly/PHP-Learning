<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>foreach语句遍历二维数组中的数据</title>
</head>

<body>
<?php
$str = array (
     "网络编程图书"=>array ("PHP自学视频教程","C#自学视频教程","ASP自学视频教程"),
     "历史图书"=>array ("1"=>"春秋","2"=>"战国","3"=>"三国志"),
     "文学图书"=>array ("四世同堂",3=>"围城","笑傲江湖") 
	);						//声明二维数组
/*    应用foreach语句遍历二维数组中的数据      */
foreach($str as $key=>$value){				//循环读取二维数组，返回值仍是数组
	foreach($value as $keys=>$values){		//循环读取一维数组中数据
		echo "\n";							//输出空格
		echo $str[$key][$keys];				//输出数据
		echo "\n";							//输出空格
	}
}

?>

</body>
</html>
