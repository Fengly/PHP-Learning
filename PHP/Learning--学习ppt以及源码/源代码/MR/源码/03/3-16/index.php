<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>字符串型转换为其它类型</title>
</head>

<body>
<?PHP
	$str = "Hello,I like PHP!";
	echo "这是原始的string形式：".$str;
	echo "<p>";
	echo "这是boolean形式：".(boolean)$str;
	echo "<p>";
	echo "这是integer形式：".(integer)$str;
	echo "<p>";
	echo "这是float形式：".(float)$str;
	echo "<p>";
	echo "这是array形式：".(array)$str;
?>
</body>
</html>

