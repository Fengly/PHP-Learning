<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Ӧ��strcmp()��strcasecmp()�����ֱ�������ַ������ֽڽ��бȽ�</title>
</head>

<body>
<?php 
$str1="PHP��̴ʵ�!";					//�����ַ�������
$str2="PHP��̴ʵ�!"; 					//�����ַ�������
$str3="mrsoft";							//�����ַ�������
$str4="MRSOFT";						//�����ַ�������	
echo strcmp($str1,$str2);    				//�������ַ������
echo strcmp($str3,$str4);   				//ע��ú������ִ�Сд
echo strcasecmp($str3,$str4);				//�ú�����������ĸ��Сд
?>
</body>
</html>
