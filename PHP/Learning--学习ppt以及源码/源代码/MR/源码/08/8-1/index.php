<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>定界符</title>
</head>

<body>
<?php
$str="明日科技编程词典";
echo <<<strmark
	<font color="#FF0099"> $str 上市了,详情请关注编程词典网：www.mrbccd.com </font>
strmark;
?>
</body>
</html>
