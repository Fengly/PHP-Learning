
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�Զ����ַ�������ת��ͻ�ԭ</title>
<style type="text/css">
<!--
body {
	background-color: #FFCCFF;
}
-->
</style></head>

<body>
<?php
 $str = "select * from tb_book where bookname = 'PHP��ѧ��Ƶ�̳�'";
 $a = addslashes($str);							//���ַ����е������ַ�����ת��
 echo $a."<br>";								//���ת�����ַ�
 $b = stripslashes($a);							//��ת�����ַ����л�ԭ
 echo $b."<br>";								//���ַ�ԭ�����
?>
</body>
</html>
