<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ȽϾ�̬��������ͨ����������</title>
</head>

<body>
<?php
function zdy (){
   static $message = 0 ;               	//��ʼ����̬����
   $message+=1;							//��̬������1
   echo $message." " ;					//�����̬����
}
function zdy1(){
   $message = 0 ;						//���������ڲ��������ֲ�������
   $message += 1 ;						//�ֲ�������1
   echo $message." " ;  				//����ֲ�����
}
for ( $i=0 ; $i<10 ; $i++ )     zdy() ;  //���1��10
echo "<br>";
for ($i=0 ; $i<10 ; $i++ )     zdy1() ;  //���10��1
?>
</body>
</html>
