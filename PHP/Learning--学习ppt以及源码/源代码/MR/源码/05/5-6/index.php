<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>通过数组函数list()和each()遍历数组</title>
</head>
<body>
<?php
$array=array(0 =>'PHP自学视频教程', 1 =>'JAVA自学视频教程', 2 =>'VB自学视频教程',3=>"VC自学视频教程");	
while(list($name,$value)=each($array)){		//遍历数组中的数据
	echo "$name=$value"."\n";				//输出遍历结果
}
?>

</body>
</html>
