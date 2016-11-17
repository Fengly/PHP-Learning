<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>替换字符串</title>
</head>
<body>
<?php
$str="MRSOFT公司是一家以计算机软件技术为核心的高科技企业，多年来始终致力于行业管理软件开发、数字化出版物制作等领域。";							//定义字符串常量
echo str_ireplace("mrsoft","吉林省明日科技",$str);					//输出替换后的字符串
?>

</body>
</html>
