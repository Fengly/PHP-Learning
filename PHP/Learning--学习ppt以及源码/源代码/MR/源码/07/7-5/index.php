<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������ֵ��Ӧ��</title>
</head>
<body>
<?php 
	function values($price,$tax=0.65){			//����һ�������������е�һ��������Ĭ��ֵ
		$price=$price+($price*$tax); 			//������Ʒ���
		return $price;							//���ؽ��
	}
	echo values(100);							//���ú���
?>
</body>
</html>
