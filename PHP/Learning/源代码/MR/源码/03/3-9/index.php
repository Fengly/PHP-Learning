<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ֵ�������Ӧ��</title>
</head>

<body>
<?php
	$a = 10;								//��������$a
	$b = 8;								//��������$b
	echo "\$a = ".$a."<br>";				//�������$a
	echo "\$b = ".$b."<br>";				//�������$b
	echo "\$a += \$b = ".($a += $b)."<br>";			//�������$a�� $b��ֵ
	echo "\$a -= \$b = ".($a -= $b)."<br>";			//�������$a��$b��ֵ
	echo "\$a *= \$b = ".($a *= $b)."<br>";			//����$a����$b��ֵ
	echo "\$a /= \$b = ".($a /= $b)."<br>";			//����$a����$b��ֵ
	echo "\$a %= \$b = ".($a %= $b);					//����$a��$b������
?>
</body>
</html>

