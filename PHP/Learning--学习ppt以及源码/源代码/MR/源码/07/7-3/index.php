<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�����ô��ݷ�ʽ</title>
</head>

<body>
<?php
function example( &$m ){				 //����һ��������ͬʱ���ݲ���$m�ı���
	$m = $m * 5 + 10;
echo "�ں����ڣ�\$m = ".$m;		 //����βε�ֵ
}
$m = 1;
example( $m ) ;						 //��ֵ����$m��ֵ���ݸ��β�$m
echo "<p>�ں����⣺\$m = $m <p>" ;	 //ʵ�ε�ֵ�����仯,���m=15
?>
</body>
</html>
