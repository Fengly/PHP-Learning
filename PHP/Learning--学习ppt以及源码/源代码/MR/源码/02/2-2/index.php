<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>单引号和双引号的区别</title>
</head>

<body>
<?php
    $a = "你好，欢迎来到PHP的世界！";
    echo "<h3>$a</h3>";					//用双引号输出
    echo '<h4>$a</h4>';					//用单引号输出
?>
</body>
</html>