<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��ָ����Χ���ַ�������ת�塢��ԭ</title>
<style type="text/css">
<!--
body {
	background-color: #FFCCCC;
}
-->
</style></head>
<body>
<?php
$a="���������";         				   		//��ָ����Χ�ڵ��ַ�����ת��
$b=addcslashes($a,"���������");			    //ת��ָ�����ַ���
echo "ת���ַ�����".$b;							//���ת�����ַ���
echo "<br>";							 		//ִ�л���
$c=stripcslashes($b);        		   			//��ת����ַ������л�ԭ
echo "��ԭ�ַ�����".$c;							//�����ԭ���ת���ַ���
?>
</body>
</html>
