<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Ӧ��strnatcmp()��������Ȼ���򷨽����ַ����ıȽ�</title>
</head>

<body>
<?php 
$str1="str2.jpg";								//�����ַ�������
$str2="str10.jpg";								//�����ַ�������
$str3="mrbook1";								//�����ַ�������
$str4="MRBOOK2";								//�����ַ�������
echo strcmp($str1,$str2);     					//���ֽڽ��бȽϣ�����1
echo strcmp($str3,$str4);     					//���ֽڽ��бȽϣ�����1
echo strnatcmp($str1,$str2);  					//����Ȼ���򷨽��бȽϣ�����-1
echo strnatcmp($str3,$str4);  					//����Ȼ���򷨽��бȽϣ�����1
?>
</body>
</html>
