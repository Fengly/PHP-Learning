<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>implode()合成字符串</title>
</head>
<body>
<?php 
$str="PHP自学视频教程@ASP.NET自学视频教程@ASP自学视频教程@JSP自学视频教程";	//定义字符串变量
$str_arr=explode("@",$str);							//应用标识@分割字符串
$array=implode("*",$str_arr);						//将数组合成字符串
echo $array;											//输出字符串
?>
</body>
</html>
