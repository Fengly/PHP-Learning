<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>explode()分割字符串</title>
</head>
<body>
<?php 
$str="PHP自学视频教程@ASP.NET自学视频教程@ASP自学视频教程@JSP自学视频教程";	//定义字符串变量
$str_arr=explode("@",$str);							//应用标识@分割字符串
print_r($str_arr);									//输出字符串分割后的结果
?>
</body>
</html>
