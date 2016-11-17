<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>使用定界符定义字符串</title>
</head>

<body>
<?php
   	$i = "PHP";
    echo <<<std
        Hello ,welcome to here!<p>
        Do you like $i?
std;
?>
</body>
</html>