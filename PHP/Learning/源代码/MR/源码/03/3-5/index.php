<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���ø�ֵ</title>
</head>
<body>
<?php
$str = "ѧϰPHP������";					//��������$str
$str2 = & $str;							//ʹ�����ø�ֵ������$str2�Ѿ���ֵ��Ϊ��ѧϰPHP�����ɡ�
$str = "��Ҫ�����ĸ����㣺$str";		//���¸�$str��ֵ
echo $str2;								//�������$str2
echo "<p>";
echo $str;								//�������$str
?>
</body>
</html>
