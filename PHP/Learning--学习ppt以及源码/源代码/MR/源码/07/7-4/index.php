<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Ĭ�ϲ�����Ӧ��</title>
</head>

<body>
<?php
	function values($price,$tax=0){			//����һ�����������е�һ��������ʼֵΪ��
		$price=$price+($price*$tax);			//����һ������$price����������������������
		echo "�۸�:$price<br>";					//����۸�
	}
	values(100,0.25);        					//Ϊ��ѡ������ֵ0.25
	values(100);            					//û�и���ѡ������ֵ
?>
</body>
</html>
