<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���Զ��庯����Ӧ��ȫ�ֱ�����ֲ�����</title>
</head>

<body>
<?php
$zy = "���";
$zyy = "PHP����";
function lxt (){
	$zy="��ϲ��";
    echo $zy;
    global $zyy;    	//���ùؼ���global�ں����ڲ�����ȫ�ֱ���
    echo $zyy;	//�˴�����$zyy
 }    
lxt () ;   
?>
</body>
</html>
